<?php
require_once __DIR__ . '/includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <title>About</title>
    <style>

.about-us{
       margin-top: 12%;
       text-align: center;
        color: #16164f;
        line-height: 1.3;
       font-weight: 400;
       font-size: 56px;
}
section{
    margin-top: 2%;
    display: grid;
    grid-template-columns: 1fr 1fr;
} 
.left {
    display: grid;
    justify-content: center;
    align-items: center;
    margin-left: 220px;
}
.right{
   margin-right: 200px;
}
.left h3{
    font-size: 15px;
    color: #4d4c4c;
    text-align: end;
    font-weight: 500;
}
.left h1{
        font-size: 42px;
    text-transform: capitalize;
    margin-bottom: 15px;
    margin-top: -150px;
    display: block;
    line-height: 1.2;
    font-weight: 500;
    color: #16164f;
}
.right p{
    font-size: 20px;
    font-style: italic;
    color: #252525;
    margin-bottom: 25px;
    line-height: 1.7;
}
.right h3{
    color: #442f9c;
    text-align: center;
    font-size: 23px;
    font-weight: 500;
}
.background-text {
  position: absolute;
  top: 55%;
  left: 30%;
  transform: translate(-50%, -50%);
  font-size: 100px;
  font-weight: 900;
  color: rgba(40, 26, 104, 0.04); 
  letter-spacing: 10px;
  user-select: none;
  pointer-events: none;
  z-index: 1;
  white-space: nowrap;
}
main {
    margin-top: 10%;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top center; 
    background-image: url(assets/images/aboutbackground.jpg);
    position: relative;
    overflow: hidden;
    height: 690px;
}
.about{
    margin-top: 16%;
    text-align: center;
    
}
.about h1{
    font-size: 44px;
    color : #5d50c6;
}
.about h1 span{
      color: #fb940d;
}
.about p {
    font-size: 18px;
    line-height: 1.8;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.5);
}
.continier {
  display: flex;
  justify-content: space-around;
  align-items: center;
  margin-top: 5%;
}

.continier h3 {
  font-weight: 500;
  font-size: 45px;
  color: #1eaaf1;
  display: block;
  font-family: "Roboto", sans-serif;
  text-align: center;
}

/* Ky është span-i për numrin */
.continier h3 .counter-num {
  font-size: 45px;
  color: #1eaaf1;
  font-weight: 700;
  display: block;
}
.continier h3 span:not(.counter-num) {
  font-size: 16px;
  color: rgb(66, 65, 65);
  font-weight: 400;
  display: block;
}
article{
    margin: 0 auto;
}
.parents-article{
    margin-top: 70px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 50px;

}
.parent {
    margin-top: 5%;
}
.parent h1{
    color: #5d50c6;
    text-align: center;
    font-size: 44px;
    font-weight: 600;
}
.parent h1 span{
    color: #fda638;
    text-align: center;
}
.parent p {
    font-family: "Roboto", sans-serif;
    text-align: center;
    font-size: 16px;
    line-height: 1.8;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.5);
}
.parent-box{
    display: flex;
    background-color: #2d272708;
    margin: 0 auto;
    width: 500px;
    height: 200px;
}
.parent-box img{
    width: 250px;
    height: 130px;
    border-radius: 50%;
    align-self: center;
    margin-left: 20px;
    margin-right: 30px;
}
.parent-box p {
    margin-top: 50px;
    align-self: center;
    text-align: start;
    color: rgba(0, 0, 0, 0.8);
    font-size: 16px;
    font-weight: 400;
    line-height: 1.8;
}
.parent-box p span {
    color: #000000;
    margin-top: 20px;
}
.mother{
    color: #1eaaf1 !important;
}
.take-quote{
    background-image: url(assets/images/quote.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top center;
    position: relative; 
    overflow: hidden;
    margin-bottom: 10px;
    width: 100%;
    height: 590px;
}
.quote{
    width: 600px;
    height: 600px;
    margin-top: -25px;
    background-color:#34b4f2;
    color: white;
    margin-left: 50%;
}
.quote h1{
    
    text-align: start;
    margin-left: 40px;
    font-weight: 400;
    font-size: 40px;
    color: #fff;
}
.quote h2{
    font-size: 35px;
    color: #ffffff00;
    margin-left: 40px;
}
.quote p{
    color: rgba(255, 255, 255, 0.9);
    margin-left: 40px;
    margin-right: 40px;
    font-size: 16px;
    line-height: 1.8;
    font-weight: 400;
     font-family: "Work Sans", Arial, sans-serif;
}
.inputs{
    margin-top: 60px;
    margin-left: 40px;
    margin-right: 40px;
}
.inputs form {
  display: grid;
  grid-template-columns: repeat(2, 1fr); 
  gap: 20px;
  justify-content: center;
  align-items: center;
}

.inputs input,
.inputs select {
  width: 250px;
  height: 50px;
  background-color: #34b4f2;
  border: none;
  border-bottom: 1px solid rgba(255, 255, 255, 0.484);
  text-align: start;
  color: white;
  font-size: 16px;
  outline: none;
}

.inputs input::placeholder{
  color: rgba(255, 255, 255, 0.8);
}
.inputs .message {
  grid-column: 2;
}

.inputs button {
  grid-column: 2; 
  width: 250px;
  height: 50px;
  background-color: #fda638;
  color:  #fff;
  border: none;
  border-radius: 50px;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
}

.inputs button:hover {
  background-color: #01080ba8;
  color: white;
}
.hero-section {
    margin-top: 6.3%;
    padding: 80px 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    background: linear-gradient(135deg, #f5f7ff, #ffffff);
    position: relative;
}

.left {
    margin-left: 150px;
}

.left h1 {
    font-size: 48px;
    font-weight: 600;
}

.left h3 {
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #7a7a7a;
}

.right {
    margin-right: 150px;
}

.right p {
    font-size: 18px;
    line-height: 1.8;
}

.hero-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 28px;
    background-color: #5d50c6;
    color: white;
    border-radius: 30px;
    text-decoration: none;
    font-size: 15px;
    transition: 0.3s;
}

.hero-btn:hover {
    background-color: #fb940d;
}

.background-text {
    font-size: 120px;
    left: 40%;
    color: rgba(40, 26, 104, 0.03);
}
.new-about {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.new-about h1 {
    margin-top: 20px;
}

.new-about p {
    margin-top: 15px;
}

.about-btn {
    margin-top: 25px;
    width: fit-content;
    padding: 12px 30px;
    background-color: white;
    color: #34b4f2;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
    margin-left:60px;
}

.about-btn:hover {
    background-color: #fda638;
    color: white;
}
/* ======================= Media Queries ======================= */
@media only screen and (max-width: 600px) {
    .about-us {
        font-size: 36px;
        margin-top: 30%;
    }
    section {
        grid-template-columns: 1fr;
        margin-top: 10%;
    }
    .left {
        margin-left: 0;
        text-align: center;
    }
    .left h1 {
        margin-top: 0;
        font-size: 28px;
    }
    .left h3 {
        font-size: 14px;
    }
    .right {
        margin-right: 0;
        text-align: center;
    }
    .right p {
        font-size: 16px;
    }
    .background-text {
        font-size: 60px;
        left: 50%;
    }
    main {
        height: auto;
        background-position: center top;
    }
    .about h1 {
        font-size: 32px;
    }
    .about p {
        font-size: 16px;
    }
    .continier {
        flex-direction: column;
        gap: 20px;
    }
    .parents-article {
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 0 auto;
    }
    .parent-box {
        width: 100%;
        flex-direction: column;
        align-items: center;
    }
    .parent-box img {
        width: 150px;
        height: 150px;
        margin: 0 auto 10px;
    }
    .parent-box p {
        text-align: center;
        margin-top: 0;
    }
    .take-quote {
        height: auto;
    }
    .quote {
        width: 90%;
        margin-left: 5%;
        height: auto;
        padding: 20px;
    }
    .inputs form {
        grid-template-columns: 1fr;
    }
    .inputs .message,
    .inputs button {
        grid-column: 1;
        width: 100%;
    }
    .days-on-off img {
        margin-left: 0;
        height: 200px;
    }
}


@media only screen and (min-width: 601px) and (max-width: 992px) {
    .about-us {
        font-size: 44px;
        margin-top: 15%;
    }
    section {
        grid-template-columns: 1fr 1fr;
    }
    .left {
        margin-left: 50px;
    }
    .right {
        margin-right: 50px;
    }
    .left h1 {
        font-size: 36px;
        margin-top: -50px;
    }
    .right p {
        font-size: 18px;
    }
    .background-text {
        font-size: 80px;
        left: 40%;
    }
    main {
        height: 600px;
    }
    .about h1 {
        font-size: 36px;
    }
    .continier h3 {
        font-size: 36px;
    }
    .parents-article {
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    .parent-box {
        width: 400px;
        height: auto;
        flex-direction: row;
    }
    .parent-box img {
        width: 180px;
        height: 180px;
    }
    .quote {
        width: 80%;
        margin-left: 10%;
    }
}
@media only screen and (min-width: 1200px) {
    .about-us {
        margin-top: 12%;
    }
    section {
        margin-top: 2%;
    }
    .left {
        margin-left: 220px;
    }
    .right {
        margin-right: 200px;
    }
    .background-text {
        font-size: 100px;
        left: 30%;
    }
    main {
        height: 690px;
    }
}
</style>
</head>
<body>
<?php include __DIR__ . "/includes/header.php"; ?>
<section class="hero-section">
    <div class="left">
        <span class="background-text">HISTORIA</span>
        <h3>Kosovë • Që nga viti 2004</h3>
        <h1>Rreth Historisë Sonë</h1>
    </div>

    <div class="right">
        <p>
            Ne jemi të përkushtuar të ofrojmë përvoja cilësore të të mësuarit përmes kurseve online dhe fizike në të gjithë Kosovën.
            Programet tona përfshijnë fusha të ndryshme, nga teknologjia dhe gjuhët deri te biznesi dhe dizajni,
            duke i ndihmuar studentët të zhvillojnë aftësi reale për sukses të vërtetë.
        </p>

        <h3>NextBridge</h3>

        <a href="courses.php" class="hero-btn">Eksploro Kurset</a>
    </div>
</section>
<main>
    <div class="about">
        <h1>20 Vite <span>Përvojë</span></h1>
        <p>
            Ne jemi të përkushtuar të ofrojmë edukim cilësor dhe trajnime praktike
            që i ndihmojnë nxënësit të arrijnë potencialin e tyre të plotë.
        </p>
    </div>

    <div class="continier">
        <h3>
            <span class="counter-num" data-target="18">0</span><br>
            <span>Mësues të Certifikuar</span>
        </h3>

        <h3>
            <span class="counter-num" data-target="251">0</span><br>
            <span>Fëmijë të Suksesshëm</span>
        </h3>

        <h3>
            <span class="counter-num" data-target="364">0</span><br>
            <span>Prindër të Kënaqur</span>
        </h3>

        <h3>
            <span class="counter-num" data-target="100">0</span><br>
            <span>Çmime të Fituara</span>
        </h3>
    </div>
</main>

<article>
    <div class="parent">
        <h1>Çfarë <span>Thonë Prindërit Për Ne</span></h1>

        <p>
            Prindërit vlerësojnë progresin dhe vetëbesimin që fëmijët e tyre fitojnë me ne.<br>
            Qasja jonë e përkushtuar siguron mësim, zhvillim dhe përparim afatgjatë.
        </p>
    </div>

    <div class="parents-article">

        <div class="parent-box">
            <img src="assets/images/ImaHarrison.jpg">

            <p>
                Si nënë, jam shumë e kënaqur. Fëmija im mësoi shumë në klasat tuaja
                dhe shijoi çdo moment. Ishte vërtet një përvojë e mrekullueshme dhe e vlefshme.<br>

                <span>Ima Harrison</span><br><br>
                <span class="mother">Nënë</span>
            </p>
        </div>

        <div class="parent-box">
            <img src="assets/images/oliviabrown.jpg">

            <p>
                Ka qenë një përvojë e mrekullueshme të shoh fëmijën tim duke eksploruar,
                krijuar dhe mësuar. Ky vend vërtet nxjerr më të mirën nga çdo fëmijë.<br>

                <span>Olivia Brown</span><br><br>
                <span class="mother">Nënë</span>
            </p>
        </div>

        <div class="parent-box">
            <img src="assets/images/sarahmiller.jpg">

            <p>
                Si nënë, nuk mund të isha më e lumtur. Vajza ime zbuloi interesa të reja
                dhe fitoi vetëbesim përmes mësimeve tuaja. Çdo seancë ishte plot gëzim dhe kreativitet.<br>

                <span>Sarah Miller</span><br><br>
                <span class="mother">Nënë</span>
            </p>
        </div>

        <div class="parent-box">
            <img src="assets/images/narahall.jpg">

            <p>
                Nuk mund të jem më e lumtur me zhvillimin e vajzës sime këtu.
                Ajo mësoi gjëra të reja çdo ditë dhe gjithmonë kthehej në shtëpi me buzëqeshje.<br>

                <span>Nara Hall</span><br><br>
                <span class="mother">Nënë</span>
            </p>
        </div>

        <div class="parent-box">
            <img src="assets/images/johnrober.jpg">

            <p>
                Të shoh djalin tim kaq të etur për të mësuar ka qenë e mrekullueshme.
                Mësimet janë argëtuese dhe interesante — ai mezi pret çdo ditë të re.<br>

                <span>John Rober</span><br><br>
                <span class="mother">Babai</span>
            </p>
        </div>

        <div class="parent-box">
            <img src="assets/images/michelecarter.jpeg">

            <p>
                Djali im e adhuroi çdo klasë! Mësuesit e bënë mësimin emocionues
                dhe unë mund ta shihja vetëbesimin e tij duke u rritur javë pas jave.<br>

                <span>Michael Carter</span><br><br>
                <span class="mother">Babai</span>
            </p>
        </div>

    </div>
</article>

<div class="take-quote">
    <div class="quote new-about">
        <h2>NextBridge</h2>

        <h1>Ndërtojmë të Ardhmen Përmes Mësimit</h1>

        <p>
            Në NextBridge, ne besojmë se edukimi është më shumë sesa vetëm njohuri — është transformim.
            Misioni ynë është të krijojmë një ambient frymëzues ku studentët mund të eksplorojnë,
            të zhvillohen dhe të fitojnë aftësi praktike që formësojnë të ardhmen e tyre.
        </p>

        <p>
            Me fokus në inovacion, kreativitet dhe mësim praktik, ne ndihmojmë çdo nxënës
            të zbulojë potencialin e tij të plotë dhe të ecë me besim drejt mundësive të së nesërmes.
        </p>

        <a href="more.html" class="about-btn">Mëso Më Shumë</a>
    </div>
</div>
<?php
include __DIR__ . "/includes/footer.php";
?>
 
</body>
</html>
<script>
function animateCounters() {
  const counters = document.querySelectorAll(".counter-num");

  counters.forEach(counter => {
    const target = parseInt(counter.getAttribute("data-target"));
    let count = 0;
    const duration = 4000; 
    const stepTime = 50;   
    const increment = target / (duration / stepTime);

    counter.textContent = 0;

    const updateCount = () => {
      count += increment;
      if (count < target) {
        counter.textContent = Math.floor(count);
        setTimeout(updateCount, stepTime);
      } else {
        counter.textContent = target;
      }
    };

    updateCount();
  });
}


animateCounters();
setInterval(animateCounters, 10000);




</script>

