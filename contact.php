<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

if (isset($_POST['send'])) {
    verify_csrf();

    $fullname = trim($_POST['fname'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $subject  = trim($_POST['subject'] ?? '');
    $message  = trim($_POST['message'] ?? '');

    if ($fullname === '' || $subject === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = "Ju lutem plotësoni të gjitha fushat saktë!";
    } else {
        $stmt = $conn->prepare("INSERT INTO contact_messages (full_name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $subject, $message);
        $_SESSION['msg'] = $stmt->execute() ? "Mesazhi u dergua me sukses!" : "Gabim gjatë dërgimit!";
    }

    // Redirect për të shmangur resubmission
    header("Location: contact.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css"/>
    <title>Kontakt | NextBridge</title>
</head>
<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Poppins', sans-serif;
}

body{
  background:#f4f6fb;
  color:#333;
}

/* NAVBAR */
nav{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:18px 8%;
  background:#fff;
  box-shadow:0 4px 15px rgba(0,0,0,0.05);
  position:sticky;
  top:0;
  z-index:1000;
}

nav h2{
  color:#1a1a4b;
  font-weight:700;
}

nav a{
  margin-left:20px;
  text-decoration:none;
  color:#555;
  font-weight:500;
  transition:0.3s;
}

nav a:hover{
  color:#ff7a18;
}

nav .btn{
  background:linear-gradient(135deg, #ff7a18, #ffb347);
  color:#fff;
  padding:8px 18px;
  border-radius:25px;
  transition:0.3s;
}

nav .btn:hover{
  opacity:0.9;
}

/* CONTACT SECTION */
.contact-section {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 60px 20px;
  background: linear-gradient(180deg, #f4f6fb, #eef2f7);
}

/* CONTAINER */
.contact-container {
  display: flex;
  width: 90%;
  max-width: 1050px;
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

/* LEFT SIDE */
.contact-info {
  flex: 1;
  padding: 45px;
  background: linear-gradient(135deg, #007bff, #ff7a18);
  color: white;
}

.contact-info h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.contact-info p {
  font-size: 14px;
  opacity: 0.9;
  line-height: 1.6;
}

.info-box {
  display: flex;
  align-items: center;
  gap: 12px;
  margin: 22px 0;
  font-size: 14px;
}

.info-box i {
  font-size: 18px;
}

/* RIGHT SIDE */
.contact-form {
  flex: 2;
  padding: 45px;
}

.contact-form h2 {
  font-size: 24px;
  margin-bottom: 20px;
  color:#1a1a4b;
}

.input-row {
  display: flex;
  gap: 15px;
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 13px;
  margin: 10px 0;
  border: 1px solid #ddd;
  border-radius: 10px;
  outline: none;
  font-size: 14px;
  transition: 0.2s;
  background:#fafafa;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-color: #ff7a18;
  box-shadow: 0 0 0 3px rgba(255,122,24,0.15);
  background:#fff;
}

.contact-form textarea {
  height: 130px;
  resize: none;
}

.contact-form button {
  width: 100%;
  background: linear-gradient(135deg, #007bff, #ff7a18);
  color: white;
  border: none;
  padding: 13px;
  border-radius: 10px;
  cursor: pointer;
  font-weight: 600;
  transition: 0.3s;
}

.contact-form button:hover {
  transform: translateY(-2px);
  opacity:0.95;
}

/* MESSAGE */
.contact-form p{
  margin-top:10px;
  font-weight:500;
  color:green;
}

footer{
  text-align:center;
  padding:12px 0;
  background:#fff;
  color:#777;
  font-size:13px;
  border-top:1px solid #eee;
}

/* RESPONSIVE */
@media (max-width: 900px){
  .contact-container{
    flex-direction: column;
  }

  .input-row{
    flex-direction: column;
  }

  .contact-info,
  .contact-form{
    padding:30px;
  }
}

</style>
<body>
<nav>
  <h2>NextBridge</h2>
  <div>
    <a href="login.php">Login</a>
    <a href="register.php" class="btn">Sign Up</a>
  </div>
</nav>
<section class="contact-section">
  <div class="contact-container">
    
    <div class="contact-info">
      <h2>Na kontakto</h2>
      <p>Jemi të hapur për çdo sugjerim ose thjesht për një bisedë.</p>

      <div class="info-box">
        <i class="fa-solid fa-location-dot"></i>
        <p><strong>Adresa:</strong> Rruga Adem Jashari, Prishtinë, Kosovë 20001</p>
      </div>

      <div class="info-box">
        <i class="fa-solid fa-phone"></i>
        <p><strong>Telefoni:</strong> +1235 2355 98</p>
      </div>

      <div class="info-box">
        <i class="fa-solid fa-paper-plane"></i>
        <p><strong>Email:</strong> nextbridge@gmail.com</p>
      </div>

      <div class="info-box">
        <i class="fa-solid fa-globe"></i>
        <p><strong>Uebfaqja:</strong> NextBridge.com</p>
      </div>
    </div>

    <div class="contact-form">
      <h2>Dërgo mesazh</h2>
      <form method="POST">
        <?php echo csrf_field(); ?>

        <div class="input-row">
          <input type="text" placeholder="Emri i plotë" maxlength="30" name="fname" required>
          <input type="email" placeholder="Adresa Email" name="email" required>
        </div>

        <input type="text" placeholder="Subjekti" name="subject" required>
        <textarea placeholder="Mesazhi juaj" name="message" required></textarea>

        <?php if(isset($_SESSION['msg'])){
          echo "<p style='color:green;'>" . e($_SESSION['msg']) . "</p>";
          unset($_SESSION['msg']);
        } ?>

        <button type="submit" name="send">Dërgo Mesazhin</button>
      </form>
    </div>

  </div>
</section>
<footer>
  @All right reserved | NextBridge
</footer>
</body>
</html>