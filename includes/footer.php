<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/db.php';

$footerMsg = "";

if (isset($_POST['subscribe'])) {
    verify_csrf();
    $email = trim($_POST['email'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $footerMsg = "Email i pavlefshëm!";
    } else {
        // kontroll a ekziston
        $stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            $footerMsg = "Ky email është regjistruar!";
        } else {
            $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
            $stmt->bind_param("s", $email);
            $footerMsg = $stmt->execute() ? "Ju faleminderit!" : "Gabim gjatë abonimit!";
        }
    }
}
?>
<footer>

    <div class="question">
        <h4>Keni një Pyetje?</h4>

        <p>
            <i class="fa-solid fa-location-dot"></i>
            Rruga 203, Mountain View, San Francisco, California, USA
        </p>

        <p>
            <i class="fa-solid fa-phone"></i>
            +2 392 3929 210
        </p>

        <p>
            <i class="fa-solid fa-envelope"></i>
            info@yourdomain.com
        </p>
    </div>

    <div class="RecentBlog">
        <h3>Blogjet e Fundit</h3>

        <div class="blogfooter">
            <img src="assets/images/footer1img.jpg" alt="">

            <a href="more.html">
                <p>
                    Edhe më të fuqishmit nuk mund të kontrollojnë gjithçka në jetë
                </p>
            </a>
        </div>

        <p>
            <i class="fa-solid fa-calendar-days"></i>
            Dhj 25, 2018
            <i class="fa-solid fa-user"></i>
            Admin
        </p>

        <div class="blogfooter">
            <img src="assets/images/footerimg2.jpg" alt="">

            <a href="more.html">
                <p>
                    Çdo hap i vogël në mësim sjell sukses të madh në të ardhmen
                </p>
            </a>
        </div>

        <p>
            <i class="fa-solid fa-calendar-days"></i>
            Dhj 25, 2018
            <i class="fa-solid fa-user"></i>
            Admin
        </p>
    </div>

    <div class="Links">
        <h4>Linqet</h4>

        <ul>
            <li>
                <i class="fa-solid fa-arrow-right"></i>
                <a href="home.php">Ballina</a>
            </li>

            <li>
                <i class="fa-solid fa-arrow-right"></i>
                <a href="about.php">Rreth Nesh</a>
            </li>

            <li>
                <i class="fa-solid fa-arrow-right"></i>
                <a href="courses.php">Kurset</a>
            </li>

            <li>
                <i class="fa-solid fa-arrow-right"></i>
                <a href="price.php">Çmimet</a>
            </li>
        </ul>
    </div>
         <div class="subscribe">
              <form method="POST">
                <h4>Nese po na ndiqni!</h4>
                  <?php echo csrf_field(); ?>

                  <input type="email" name="email" placeholder="Shkruaj emailin..." required>

                   <button type="submit" name="subscribe">Subscribe</button>

        <?php if (!empty($footerMsg)) { ?>
            <p style="margin-top:10px;color:green;"><?php echo e($footerMsg); ?></p>
        <?php } ?>

    </form>
</div>

</footer>
<div class="copyright">
    <h4>Copyright © 2026 All rights reserved | Made With Love <i class="fa-solid fa-heart"></i> By NextBridge</h4>
</div>
