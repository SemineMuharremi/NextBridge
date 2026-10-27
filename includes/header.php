<?php require_once __DIR__ . '/functions.php'; ?>
<header>
  <div class="logo">
      <a href="home.php"><img src="assets/images/finallogo.png" alt="NextBridge"></a>
  </div>

  <div class="nav">
      <ul>
          <li><a href="home.php" class="nav-link">Home</a></li>
          <li><a href="about.php" class="nav-link">About</a></li>
          <li><a href="courses.php" class="nav-link">Courses</a></li>
          <li><a href="price.php" class="nav-link">Pricing</a></li>
      </ul>
  </div>
  <div class="butoni">
<?php if (isset($_SESSION['username'])) { ?>

<div class="ig-profile">
    <div class="ig-avatar">
        <i class="fa-solid fa-user"></i>
    </div>

    <div class="ig-dropdown">
        <div class="ig-user">
            <?php echo e($_SESSION['username']); ?>
        </div>

        <a href="logout.php" class="ig-logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>
    </div>
</div>

<?php } ?>
  </div>
</header>
