<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NextBridge</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}
    body{background:#f8f9fc;color:#333}

    nav{display:flex;justify-content:space-between;align-items:center;padding:20px 8%;background:#fff;box-shadow:0 2px 10px rgba(0,0,0,.05);position:sticky;top:0;z-index:1000}
    nav h2{color:#16164f}
    nav a{margin-left:20px;text-decoration:none;color:#555;font-weight:500}
    nav .btn{background:#fda638;color:#fff;padding:8px 18px;border-radius:20px}

    .hero{display:flex;align-items:center;justify-content:space-between;padding:100px 8%;flex-wrap:wrap}
    .hero-text{max-width:520px}
    .hero-text h1{font-size:52px;color:#16164f;line-height:1.2}
    .hero-text p{margin:20px 0;color:#666;line-height:1.7}
    .hero-text .btn{display:inline-block;background:#fda638;color:#fff;padding:12px 25px;border-radius:30px;text-decoration:none;margin-right:10px}
    .hero img{width:450px;max-width:100%}

    .stats{display:flex;justify-content:center;gap:50px;padding:40px 8%;background:#fff}
    .stat{text-align:center}
    .stat h3{color:#16164f;font-size:28px}
    .stat p{color:#777}

    .features{text-align:center;padding:80px 8%}
    .features h2{font-size:34px;color:#16164f}
    .feature-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:25px;margin-top:40px}
    .feature-card{background:#fff;padding:30px;border-radius:15px;box-shadow:0 8px 20px rgba(0,0,0,.05);transition:.3s}
    .feature-card:hover{transform:translateY(-10px)}

    .courses{padding:80px 8%;background:#fff;text-align:center}
    .course-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:25px;margin-top:40px}
    .course-card{background:#f8f9fc;padding:20px;border-radius:15px;text-align:left;transition:.3s}
    .course-card:hover{transform:scale(1.03)}
    .course-card h4{color:#16164f;margin-bottom:10px}

    .testimonials{padding:80px 8%;text-align:center}
    .testimonial-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:25px;margin-top:40px}
    .testimonial{background:#fff;padding:25px;border-radius:15px;box-shadow:0 8px 20px rgba(0,0,0,.05)}

    .cta{background:#16164f;color:#fff;text-align:center;padding:70px 20px}
    .cta a{display:inline-block;margin-top:15px;background:#fda638;padding:12px 25px;border-radius:25px;color:#fff;text-decoration:none}

    footer{text-align:center;padding:25px;background:#fff;margin-top:40px;font-size:14px;color:#777}

    @media(max-width:900px){.hero{flex-direction:column;text-align:center}.hero img{margin-top:30px}.stats{flex-direction:column;gap:20px}}
    .contact-preview {
    text-align: center;
    padding: 80px 8%;
    background: #16164f;
    color: #fff;
}

.contact-preview h2 {
    font-size: 32px;
    margin-bottom: 10px;
}

.contact-preview p {
    color: #ddd;
    margin-bottom: 20px;
}

.contact-btn {
    display: inline-block;
    background: #fda638;
    color: #fff;
    padding: 12px 25px;
    border-radius: 30px;
    text-decoration: none;
    transition: 0.3s;
}

.contact-btn:hover {
    background: #ffb84d;
}
  </style>
</head>
<body>

<nav>
  <h2>NextBridge</h2>
  <div>
    <a href="login.php">Login</a>
    <a href="register.php" class="btn">Sign Up</a>
  </div>
</nav>

<section class="hero">
  <div class="hero-text">
    <h1>Ngrit Aftësitë e Tua me Mësim Modern</h1>
    <p>Bëhu pjesë e mijëra studentëve që po ndërtojnë të ardhmen e tyre përmes kurseve praktike, mentorëve profesionistë dhe përvojës reale.</p>
    <a href="register.php" class="btn">Get Started</a>
    <a href="login.php" class="btn" style="background:#16164f;">Login</a>
  </div>
  <img src="assets/images/prices1.jpg" alt="learning">
</section>

<section class="stats">
  <div class="stat"><h3>10K+</h3><p>Students</p></div>
  <div class="stat"><h3>120+</h3><p>Courses</p></div>
  <div class="stat"><h3>50+</h3><p>Teachers</p></div>
  <div class="stat"><h3>95%</h3><p>Success Rate</p></div>
</section>

<section class="features">
  <h2>Pse ne?</h2>
  <div class="feature-grid">
    <div class="feature-card"><h3>Profesor te kualifikuar</h3><p>Instruktorë me përvojë të lartë që ju udhëzojnë hap pas hapi.</p></div>
    <div class="feature-card"><h3>Mesim Fleksibil</h3><p>Qasuni në kurse në çdo kohë dhe nga çdo vend.</p></div>
    <div class="feature-card"><h3>Projecte Reale</h3><p>Perforconi njohurite duke punuar ne projekte te ndryshme.</p></div>
    <div class="feature-card"><h3>Qertifikata</h3><p>Përfitoni certifikata pas përfundimit të kurseve.</p></div>
  </div>
</section>

<section class="courses">
  <h2>Kurse te njohura</h2>
  <div class="course-grid">
    <div class="course-card"><h4>Web Development</h4><p>Meso HTML, CSS, JS dhe nderto vebsite te verteta.</p></div>
    <div class="course-card"><h4>Matematike</h4><p>Zhvillo logjiken,dhe kupto nje her e mire Matematiken</p></div>
    <div class="course-card"><h4>Programim ne Python</h4><p>Behu "master" ne ndertimin e apliakcioneve reale</p></div>
  </div>
</section>

<section class="testimonials">
  <h2>Nga Studentet!</h2>
  <div class="testimonial-grid">
    <div class="testimonial"><p>"Kjo platformë ma ndryshoi mënyrën se si mësoj. Shumë e rekomandueshme!"</p><strong>- Student</strong></div>
    <div class="testimonial"><p>"Më ndihmoi të kuptoj logjiken"</p><strong>- Student</strong></div>
    <div class="testimonial"><p>"Kurse shumë praktike dhe të lehta për t’u ndjekur."</p><strong>- Fillestar</strong></div>
  </div>
</section>


<section class="contact-preview">
  <h2>Na Kontakto</h2>
  <p>Nëse ke ndonjë pyetje, na shkruaj dhe do të të përgjigjemi shpejt.</p>

  <a href="contact.php" class="contact-btn">Hap Formën e Kontaktit</a>
</section>
<footer>
  © 2026 NextBridge. All rights reserved.
</footer>

</body>
</html>