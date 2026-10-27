<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db.php';
require_admin();

$section = $_GET['section'] ?? '';

// Tabelat që admini mund t'i menaxhojë
$tables = [
    'profesor' => 'profesors',
    'student'  => 'students',
    'mesazh'   => 'contact_messages',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $type  = $_POST['type'] ?? '';
    $table = $tables[$type] ?? null;
    $id    = (int) ($_POST['id'] ?? 0);

    if ($table === null) {
        http_response_code(400);
        exit('Lloj i pavlefshëm.');
    }

    if (isset($_POST['add']) && $type !== 'mesazh') {
        $username = trim($_POST['username'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $stmt = $conn->prepare("INSERT INTO $table (username, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
    } elseif (isset($_POST['update']) && $type !== 'mesazh') {
        $username = trim($_POST['username'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $stmt = $conn->prepare("UPDATE $table SET username = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $email, $id);
        $stmt->execute();
    } elseif (isset($_POST['delete'])) {
        $stmt = $conn->prepare("DELETE FROM $table WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    header("Location: dashboard.php");
    exit();
}

// Numrat për kartat lart
$profesore = $conn->query("SELECT COUNT(*) FROM profesors")->fetch_row()[0];
$studente  = $conn->query("SELECT COUNT(*) FROM students")->fetch_row()[0];
$mesazhe   = $conn->query("SELECT COUNT(*) FROM contact_messages")->fetch_row()[0];

$total = $profesore + $studente + $mesazhe;
$aktiviteti = min(100, $total * 2);

$edit_id   = (int) ($_GET['edit_id'] ?? 0);
$edit_type = $_GET['type'] ?? '';

// Rreshtat e tabelës së profesorëve/studentëve (normal ose në edit mode)
function render_people_rows(mysqli $conn, string $table, string $type, int $edit_id, string $edit_type): void
{
    $res = $conn->query("SELECT id, username, email FROM $table ORDER BY id DESC");
    while ($row = $res->fetch_assoc()) {
        $id = (int) $row['id'];
        if ($edit_type === $type && $edit_id === $id) { ?>
        <tr class="editing">
            <td><input type="text" name="username" form="edit-<?php echo $type; ?>" value="<?php echo e($row['username']); ?>" required></td>
            <td><input type="email" name="email" form="edit-<?php echo $type; ?>" value="<?php echo e($row['email']); ?>" required></td>
            <td>
                <form id="edit-<?php echo $type; ?>" method="POST" class="action-buttons">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button class="update-btn" name="update">Update</button>
                    <a class="cancel-btn" href="dashboard.php">Cancel</a>
                </form>
            </td>
        </tr>
        <?php } else { ?>
        <tr>
            <td><?php echo e($row['username']); ?></td>
            <td><?php echo e($row['email']); ?></td>
            <td>
                <form method="POST" class="actions" onsubmit="return confirm('A je i sigurt?')">
                    <a class="edit" href="dashboard.php?edit_id=<?php echo $id; ?>&type=<?php echo $type; ?>">Edit</a>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button class="delete" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php }
    }
}

// Rreshti për shtimin e një profesori/studenti të ri
function render_add_row(string $type): void
{ ?>
        <tr>
            <td><input type="text" name="username" form="add-<?php echo $type; ?>" placeholder="username" required></td>
            <td><input type="email" name="email" form="add-<?php echo $type; ?>" placeholder="email" required></td>
            <td>
                <form id="add-<?php echo $type; ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <button class="add-btn" name="add">Add</button>
                </form>
            </td>
        </tr>
<?php }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | NextBridge</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<style>
body{
    margin:0;
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background:#f4f6fb;
}

/* LAYOUT */
main{
    display:grid;
    grid-template-columns: 220px 1fr;
    height:100vh;
}

/* SIDEBAR */
aside{
    background:#1e293b;
    color:white;
    padding:20px 15px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

.menu a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px;
    border-radius:10px;
    color:#cbd5e1;
    text-decoration:none;
}

.menu a:hover{
    background:#334155;
    color:white;
}

.bottom a{
    display:flex;
    justify-content:center;
    gap:10px;
    padding:10px;
    border-radius:10px;
    background:#ef4444;
    color:white;
    text-decoration:none;
}

/* CONTENT */
section{
    padding:20px;
    overflow-y:auto;
}

/* BOXES */
.box{
    display:grid;
    grid-template-columns: repeat(4,1fr);
    gap:20px;
    margin-bottom:25px;
}

.box-main{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    position:relative;
}
.box-main:nth-child(1){
    background-color: #1876f222;
}
.box-main:nth-child(2){
background-color: rgba(69, 255, 69, 0.258); }
.box-main:nth-child(2) i{ background:#dcfce7; color:#166534; }
.box-main:nth-child(3) {
    background-color: rgba(251, 99, 99, 0.204);
}
.box-main:nth-child(3) i{ background:#fee2e2; color:#991b1b; }
.box-main:nth-child(4) i{ background:#fef9c3; color:#854d0e; }
.box-main:nth-child(4){
    background-color: #fef9c360;
}
.box-main i{
    position:absolute;
    top:15px;
    right:15px;
    padding:10px;
    border-radius:10px;
    background:#e0e7ff;
}

/* TABLES */
.tablat{
    display:grid;
    grid-template-columns: repeat(3,1fr);
    gap:20px;
}

.table{
    background:white;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    overflow:hidden;
}

/* HEADER */
.table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px;
    border-bottom:1px solid #eee;
}

.add-btn{
    background:#22c55e;
    color:white;
    padding:6px 12px;
    border-radius:8px;
    text-decoration:none;
    font-size:13px;
}

.add-btn:hover{
    background:#16a34a;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    padding:10px;
    font-size:13px;
}

thead{
    background:#f1f5f9;
}

tr:nth-child(even){
    background:#f9fafb;
}

/* ACTIONS */
.actions{
    display:flex;
    gap:5px;
}

.actions a,
.actions button{
    border:none;
    cursor:pointer;
    padding:4px 8px;
    border-radius:6px;
    font-size:12px;
    text-decoration:none;
    color:white;
}

.edit{background:#3b82f6;}
.edit:hover{background:#2563eb;}

.delete{background:#ef4444;}
.delete:hover{background:#dc2626;}
input{
    width:90%;
    padding:6px;
    border-radius:6px;
    border:1px solid #ccc;
    font-size:12px;
}

input:focus{
    outline:none;
    border:1px solid #3b82f6;
}

/* ADD BUTTON brenda tabelës */
button.add-btn{
    background:#22c55e;
    color:white;
    border:none;
    padding:5px 10px;
    border-radius:6px;
    cursor:pointer;
}

button.add-btn:hover{
    background:#16a34a;
}
tr.editing {
    background: #eef5ff;
    border-left: 4px solid #2196F3;
}

/* INPUTS në edit */
tr.editing input {
    width: 95%;
    padding: 8px;
    border: 1px solid #2196F3;
    border-radius: 6px;
    outline: none;
    background: #fff;
}

/* FOCUS efekt */
/* CONTAINER për action buttons */
.action-buttons {
    display: flex;
    gap: 6px;
    align-items: center;
}

/* UPDATE */
.update-btn {
    background: #3b82f6;
    color: white;
    padding: 4px 10px;
    font-size: 12px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.update-btn:hover {
    background: #2563eb;
}

/* CANCEL */
.cancel-btn {
    background: #e5e7eb;
    color: #333;
    padding: 4px 10px;
    font-size: 12px;
    border-radius: 6px;
    text-decoration: none;
}

.cancel-btn:hover {
    background: #d1d5db;
}
/* ===== ACTIVE BOX ===== */
.box-main {
    transition: all 0.3s ease;
}

.box-main.active {
    border: 2px solid #3b82f6;
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(59, 130, 246, 0.3);
}

/* icon highlight */
.box-main.active i {
    background: #3b82f6;
    color: white;
}

/* ===== SIDEBAR ACTIVE ===== */
.menu a.active-link {
    background: #334155;
    color: white;
}

</style>

</head>

<body>

<main>

<aside>
    <div>
        <h3>Admin Panel</h3>

        <div class="menu">
    <a href="dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a>

    <a class="<?php if($section=='profesor') echo 'active-link'; ?>" 
       href="dashboard.php?section=profesor">
       <i class="fa-solid fa-chalkboard-user"></i>Profesoret
    </a>

    <a class="<?php if($section=='student') echo 'active-link'; ?>" 
       href="dashboard.php?section=student">
       <i class="fa-solid fa-user-graduate"></i>Studentet
    </a>

    <a class="<?php if($section=='mesazhe') echo 'active-link'; ?>" 
       href="dashboard.php?section=mesazhe">
       <i class="fa-solid fa-envelope"></i>Mesazhet
    </a>
</div>
    </div>

    <div class="bottom">
        <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i>Dil</a>
    </div>
</aside>

<section>

<h2>Dashboard</h2>
<div class="box">
    <div class="box-main <?php if($section=='profesor') echo 'active'; ?>">
        <i class="fa-solid fa-chalkboard-user"></i>
        <h4>Profesor Total</h4>
        <p><?php echo $profesore; ?></p>
    </div>

    <div class="box-main <?php if($section=='student') echo 'active'; ?>">
        <i class="fa-solid fa-graduation-cap"></i>
        <h4>Student Total</h4>
        <p><?php echo $studente; ?></p>
    </div>

    <div class="box-main <?php if($section=='mesazhe') echo 'active'; ?>">
        <i class="fa-solid fa-message"></i>
        <h4>Mesazhe</h4>
        <p><?php echo $mesazhe; ?></p>
    </div>

    <div class="box-main">
        <i class="fas fa-spinner"></i>
        <h4>Aktiviteti</h4>
        <p><?php echo $aktiviteti; ?>%</p>
    </div>
</div>

<div class="tablat">

<!-- PROFESORET -->
<div class="table">
    <div class="table-header">
        <h3>Profesoret</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php render_add_row('profesor'); ?>
            <?php render_people_rows($conn, 'profesors', 'profesor', $edit_id, $edit_type); ?>
        </tbody>
    </table>
</div>

<!-- STUDENTET -->
<div class="table">
    <div class="table-header">
        <h3>Studentet</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php render_add_row('student'); ?>
            <?php render_people_rows($conn, 'students', 'student', $edit_id, $edit_type); ?>
        </tbody>
    </table>
</div>

<!-- MESAZHET -->
<div class="table">
    <div class="table-header">
        <h3>Mesazhet</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>Emri</th>
                <th>Email</th>
                <th>Mesazhi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $res = $conn->query("SELECT id, full_name, email, message FROM contact_messages ORDER BY id DESC");
        while ($row = $res->fetch_assoc()) { ?>
            <tr>
                <td><?php echo e($row['full_name']); ?></td>
                <td><?php echo e($row['email']); ?></td>
                <td><?php echo e($row['message']); ?></td>
                <td>
                    <form method="POST" class="actions" onsubmit="return confirm('A je i sigurt?')">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="mesazh">
                        <input type="hidden" name="id" value="<?php echo (int) $row['id']; ?>">
                        <button class="delete" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</div>

</section>
</main>

</body>
</html>
