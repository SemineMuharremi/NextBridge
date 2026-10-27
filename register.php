<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

$error = '';
$success = '';

if (isset($_POST['register'])) {
    verify_csrf();

    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role     = $_POST['role'] ?? '';

    // Llogaritë admin nuk mund të krijohen nga regjistrimi publik
    $table = in_array($role, ['student', 'profesor'], true) ? role_table($role) : null;

    if ($table === null) {
        $error = "Zgjedh rolin!";
    } elseif ($username === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Ju lutem shkruani username dhe email të vlefshëm!";
    } elseif (strlen($password) < 6) {
        $error = "Fjalëkalimi duhet të ketë së paku 6 karaktere!";
    } else {
        $stmt = $conn->prepare("SELECT id FROM $table WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            $error = "Ky email është i regjistruar si $role!";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO $table (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hash);
            $stmt->execute();
            $success = ucfirst($role) . " u regjistrua me sukses! Tani mund të bëni login.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Regjistrohu | NextBridge</title>

<style>
body{
    margin:0;
    font-family: Arial, sans-serif;
    background:#a9b7d0;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* CONTAINER */
.container{
    width:750px;
    height:450px;
    background:#fff;
    border-radius:20px;
    display:flex;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

/* LEFT SIDE */
.left{
    width:50%;
    background: linear-gradient(135deg, #5b8def, #6a11cb);
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    border-top-right-radius:100px;
    border-bottom-right-radius:100px;
}

.left h2{
    font-size:28px;
    margin-bottom:10px;
}

.left p{
    font-size:14px;
    margin-bottom:20px;
}

.left button{
    padding:10px 25px;
    border:1px solid white;
    background:transparent;
    color:white;
    border-radius:5px;
    cursor:pointer;
}

/* RIGHT SIDE */
.right{
    width:50%;
    padding:40px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.right h2{
    text-align:center;
    margin-bottom:20px;
}

/* INPUTS */
.input-group{
    margin-bottom:15px;
}

.input-group input{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:5px;
    outline:none;
}

.input-group input:focus{
    border-color:#5b8def;
}

/* BUTTON */
.register-btn{
    width:100%;
    padding:10px;
    background:#5b8def;
    border:none;
    color:white;
    border-radius:5px;
    cursor:pointer;
    margin-top:10px;
}

.register-btn:hover{
    background:#4a7be0;
}

/* LINKS */
.links{
    text-align:center;
    margin-top:10px;
}

.links a{
    text-decoration:none;
    color:#555;
}

.error{
    color:red;
    text-align:center;
    margin-top:10px;
}

.success{
    color:green;
    text-align:center;
    margin-top:10px;
}
</style>
</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <h2>Miresevini perseri!</h2>
        <p>Keni nje llogari aktuale?</p>
        <a href="login.php">
            <button>Login</button>
        </a>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <form method="POST">
            <?php echo csrf_field(); ?>
            <h2>Regjistrohu</h2>

            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                  <select name="role" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:5px;">
                  <option value="">Zgjedh rolin</option>
                  <option value="student">Student</option>
                  <option value="profesor">Profesor</option>
             </select>
           </div>

            <button class="register-btn" name="register">Register</button>

            <div class="links">
                <a href="login.php">Keni nje llogari? Login</a>
            </div>
        </form>

<?php if ($error) { ?>
    <p class="error"><?php echo e($error); ?></p>
<?php } elseif ($success) { ?>
    <p class="success"><?php echo e($success); ?></p>
<?php } ?>

    </div>

</div>

</body>
</html>