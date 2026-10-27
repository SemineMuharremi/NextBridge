<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

$error = '';

if (isset($_POST['login'])) {
    verify_csrf();

    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $roli     = $_POST['roli'] ?? '';
    $table    = role_table($roli);

    if ($table === null) {
        $error = "Zgjidh rolin!";
    } else {
        $stmt = $conn->prepare("SELECT id, username, password FROM $table WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if ($row && $row['password'] !== null && password_verify($password, $row['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id']  = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['roli']     = $roli;

            // Redirect sipas rolit
            header($roli === 'admin' ? "Location: admin/dashboard.php" : "Location: home.php");
            exit();
        }

        // Mesazh i njëjtë për email/fjalëkalim gabim, që të mos zbulohet cili email ekziston
        $error = "Email ose fjalëkalimi është gabim!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | NextBridge</title>

<style>
body{
    margin:0;
    font-family: Arial, sans-serif;
    background: #a9b7d0;
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
    position:relative;
    margin-bottom:15px;
}

.input-group input,
.input-group select{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:5px;
    outline:none;
}

.input-group input:focus,
.input-group select:focus{
    border-color:#5b8def;
}

/* BUTTON */
.login-btn{
    width:100%;
    padding:10px;
    background:#5b8def;
    border:none;
    color:white;
    border-radius:5px;
    cursor:pointer;
    margin-top:10px;
}

.login-btn:hover{
    background:#4a7be0;
}

/* LINKS */
.links{
    text-align:center;
    margin-top:10px;
    font-size:13px;
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
</style>

</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <h2>Pershendetje, Mire se vini!</h2>
        <p>Nuk keni nje llogari?</p>
        <a href="register.php">
            <button>Regjistrohu</button>
        </a>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <form method="POST">
            <?php echo csrf_field(); ?>
            <h2>Login</h2>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-group">
                <select name="roli" required>
                    <option value="" disabled selected>Zgjidh rolin</option>
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="profesor">Profesor</option>
                </select>
            </div>

           

            <button class="login-btn" name="login">Login</button>
        </form>

<?php if ($error) { ?>
    <p class="error"><?php echo e($error); ?></p>
<?php } ?>

    </div>

</div>

</body>
</html>