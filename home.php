<?php
require_once __DIR__ . '/includes/functions.php';

$xml = simplexml_load_file(__DIR__ . "/data/featured_courses.xml");
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
    <title>Home</title>
    <style>
      
main {
    background-image: url(assets/images/bgimg.jpg);
    background-size: cover;
    background-position: center;
    position: relative; 
    overflow: hidden;
}


main::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.3); 
    z-index: 0;
}

main * {
    position: relative;
    z-index: 1;
}
.hyrje{
    margin-top: 18%;
    text-align: center;
    color: rgb(243, 243, 221);
}
.hyrje h1{
  font-size: 60px;
    color: #fff;
    line-height: 1.2;
    font-weight: 800;
}

.hyrje button{
    margin-top: 10px;
    width: 150px;
    height: 50px;
    line-height: 1.5;
    cursor: pointer;
    background: #fda638;
    border: 1px solid #fda638;
    border-radius: 45px;
    color: #fff;
    font-size: 15px;
}
.hyrje button:hover{
  background-color: var(--orange);

}

.KeyInfo{
    margin-top: 330px;
    display: flex;
    justify-content: flex-end;
    
}
.KeyInfo img {
    margin-left: 33%;
    margin-top: -45px;
    z-index: 999999;
    width: 135px;
    height:135px;
    border-radius: 80px;
}
.box{
    height: 270px;
   
}
.box h4 , p{
    text-align: center;
    font-family: "Roboto", sans-serif;
}
.box h4{
    font-weight: 500;
    font-size: 22px;
    color: #fff;
}
.box p{
    margin-top: 0;
    margin-bottom: 1rem;
    line-height: 1.8rem;
    font-weight: 400;
    color: rgba(255, 255, 255, 0.8);
}
.box:first-child{
    background-color: var(--blue)
}
.box:nth-child(2){
    background-color:var(--green)
}
.box:nth-child(3){
    background-color:var(--indigo)
}
.box:nth-child(4){
    background-color: var( --red)
}

.more{
    margin: 0 auto;
    margin-top: 50px;
    display: grid;
    grid-template-columns: 2fr 2fr;
    gap: 15px;
    width: 1200px;
    padding: 20px;

}
.cl-4{
    padding: 10px;
    display: flex;
}
.cl-4 img{
    width: 100px;
    height: 100px;
    border-radius: 150px;
    padding: 20px;
}
.info h3 ,p {
    text-align: center;
}
.info h3{
    font-size: 20px;
    color: var(--dark);
}
.info p {
    line-height: 1.8rem;
    color: var(--gray);
}
.Feature{
    margin-top: 60px;
    margin-bottom: 40px;
}
.Feature h1{
  text-align: center;    
  color: rgb(0, 0, 75);
  padding-top: 20px;

  font-size: 40px;
  font-family: "Roboto", sans-serif;
  font-weight: 700;
}
.Feature p{
    color: var(--gray);
    font-family: "Roboto", sans-serif;
   margin-top: -15px;
}
.box-col1{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    border-top: 15px;
    margin-bottom: 170px;
    
}
.box-col:nth-child(1) {
    background-color: var(--blue);
    color: rgb(252, 233, 233);
    text-align: start !important;
    width: 360px;
    height: 200px;
    margin-left: 10px;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
}
.box-col:nth-child(2) {
    background-color: var(--indigo);
    color: rgb(252, 233, 233);
    text-align: start !important;
    width: 360px;
    height: 200px;
    margin-left: 10px;
    border-radius: 10px;
    transition: all 0.3s ease-in-out; 
}
.box-col:nth-child(3) {
    background-color: var(--purple);
    color: rgb(252, 233, 233);
    text-align: start !important;
    width: 360px;
    height: 200px;
    margin-left: 10px;
    border-radius: 10px;
    transition: all 0.3s ease-in-out; 
}

.box-col:hover {
    border: 2px solid rgb(0, 0, 69);
    background-color: rgba(0, 0, 69, 0.05);
    box-shadow: 0 6px 15px rgba(0, 0, 69, 0.3); 
    transform: translateY(-5px); 
    color: rgb(0, 0, 69); 
}
.box-col i {
  font-size: 30px;
  margin-top:20px;
  margin-left: 10px;
  color:rgb(217, 217, 224);
}
.box-col h2{
    text-align: start;
    margin-left: 10px;
    font-size: 19px;
    font-family: sans-serif;
    font-weight: 600;

}
.box-col p{
    text-align: start;
    margin-left: 10px;
    font-family: "Roboto", sans-serif;
}
/* ======= MEDIA QUERIES ======= */
@media (max-width: 1200px) {
  .hyrje h1 {
    font-size: 45px;
  }

  .more {
    width: 90%;
    grid-template-columns: 1fr 1fr;
  }

  .box-col1 {
    flex-wrap: wrap;
    gap: 20px;
  }
}
@media (max-width: 900px) {
  .hyrje {
    margin-top: 25%;
  }

  .hyrje h1 {
    font-size: 38px;
  }

  .hyrje button {
    width: 130px;
    height: 45px;
  }

  .KeyInfo {
    flex-wrap: wrap;
    justify-content: center;
  }

  .KeyInfo img {
    margin-left: 0;
  }

  .more {
    grid-template-columns: 1fr;
    width: 90%;
  }

  .box-col1 {
    flex-direction: column;
    align-items: center;
  }

  .box-col {
    width: 80%;
    margin-bottom: 20px;
  }
}
@media (max-width: 600px) {
  .hyrje {
    margin-top: 40%;
    padding: 0 10px;
  }

  .hyrje h1 {
    font-size: 30px;
  }

  .hyrje button {
    width: 120px;
    height: 40px;
    font-size: 14px;
  }

  .KeyInfo {
    flex-direction: column;
    align-items: center;
  }

  .KeyInfo .box {
    width: 90%;
    margin-bottom: 20px;
  }

  .more {
    grid-template-columns: 1fr;
    width: 95%;
    padding: 10px;
  }

  .cl-4 {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .cl-4 img {
    width: 80px;
    height: 80px;
    padding: 10px;
  }

/* Section spacing */
.Feature {
    margin-top: 80px;
    text-align: center;
}

.Feature h1 {
    font-size: 36px;
    color: rgb(0, 0, 75);
    font-weight: 700;
}

.Feature p {
    color: var(--gray);
    margin-top: 5px;
    font-size: 16px;
}

/* Grid më clean */
.box-col1 {
    display: flex;
    justify-content: center;
    gap: 25px;
    margin-top: 40px;
    flex-wrap: wrap;
}

/* Cards */
.featured-box {
    background: #fff;
    color: #333;
    width: 300px;
    min-height: 220px;
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
}

/* Icon */
.featured-box i {
    font-size: 28px;
    color: #fda638;
    margin-bottom: 10px;
}

/* Title */
.featured-box h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #16164f;
}

.featured-box p {
    font-size: 14px;
    line-height: 1.6;
}


.featured-box .time {
    margin-top: 15px;
    display: inline-block;
    background: #fda638;
    color: #fff;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
}


.featured-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
}
}

</style>
</head>
<body>
<?php include __DIR__ . "/includes/header.php"; ?>
<main>
    <div class="hyrje">
        <h1>Mësimi perfekt <br>për të gjithë ju!</h1>

        <a href="more.html">
            <button>Lexo Më Shumë</button>
        </a>
    </div>

    <div class="KeyInfo">

        <div class="box">
            <img src="assets/images/CertifiedTeachers.jpg">

            <h4>Mësues të Certifikuar</h4>

            <p>
                Mësuesit tanë të certifikuar udhëzojnë çdo student me kujdes,
                njohuri dhe pasion çdo ditë.
            </p>
        </div>

        <div class="box">
            <img src="assets/images/SpecialEducation.jpg">

            <h4>Edukimi Special</h4>

            <p>
                Ne ofrojmë edukim special përmes kurseve tona,
                duke udhëhequr çdo student me kujdes, aftësi dhe përkushtim.
            </p>
        </div>

        <div class="box">
            <img src="assets/images/Book&Libraary.jpg">

            <h4>Libra & Bibliotekë</h4>

            <p>
                Ne ofrojmë libra dhe burime bibliotekare,
                duke ndihmuar çdo lexues të eksplorojë dijen dhe të mësojë me kënaqësi.
            </p>
        </div>

        <div class="box">
            <img src="assets/images/Certification.jpg">

            <h4>Certifikim</h4>

            <p>
                Pas përfundimit me sukses, ju do të pajiseni me certifikata të njohura
                që vërtetojnë aftësitë tuaja.
            </p>
        </div>

    </div>
</main>

<section>
    <div class="more">

        <div class="cl-4">
            <div class="img">
                <img src="assets/images/Safety.png">
            </div>

            <div class="info">
                <h3>Siguria në Vend të Parë</h3>

                <p>
                    Ne jemi të përkushtuar të sigurojmë nivelin më të lartë të sigurisë
                    në mënyrë që secili të ndihet i mbrojtur dhe i sigurt në çdo kohë.
                </p>
            </div>
        </div>

        <div class="cl-4">
            <div class="img">
                <img src="assets/images/classes.png">
            </div>

            <div class="info">
                <h3>Klasa të Rregullta</h3>

                <p>
                    Ne ofrojmë klasa të vazhdueshme dhe tërheqëse
                    që ndihmojnë çdo student të mësojë dhe të zhvillohet me ritmin e vet.
                </p>
            </div>
        </div>

        <div class="cl-4">
            <div class="img">
                <img src="assets/images/teacher.png">
            </div>

            <div class="info">
                <h3>Mësues të Certifikuar</h3>

                <p>
                    Mësuesit tanë të certifikuar sjellin profesionalizëm dhe pasion
                    në çdo mësim, duke garantuar edukim cilësor për studentët.
                </p>
            </div>
        </div>

        <div class="cl-4">
            <div class="img">
                <img src="assets/images/clasroom.png">
            </div>

            <div class="info">
                <h3>Klasa të Pajisura</h3>

                <p>
                    Ne ofrojmë klasa të bollshme dhe të pajisura mirë,
                    të krijuara për një ambient komod dhe efektiv të të mësuarit.
                </p>
            </div>
        </div>

        <div class="cl-4">
            <div class="img">
                <img src="assets/images/creative.png">
            </div>

            <div class="info">
                <h3>Mësime Kreative</h3>

                <p>
                    Mësimet tona kreative janë krijuar për të frymëzuar kureshtjen
                    dhe për të inkurajuar studentët të shprehin lirshëm idetë e tyre.
                </p>
            </div>
        </div>

        <div class="cl-4">
            <div class="img">
                <img src="assets/images/sports.png">
            </div>

            <div class="info">
                <h3>Hapësira Sportive</h3>

                <p>
                    Hapësirat tona sportive promovojnë shëndetin,
                    punën në grup dhe aktivitetin fizik në një ambient të sigurt dhe mbështetës.
                </p>
            </div>
        </div>

    </div>
</section>

<div class="Feature">
    <h1>Karakteristika Fantastike</h1>

    <p>
        Platforma jonë kombinon metoda moderne të mësimdhënies
        me ushtrime praktike.
    </p>
</div>

<div class="box-col1">
<?php foreach($xml->course as $course) { ?>
    
    <div class="box-col featured-box">
        <i class="fa-solid fa-book-open"></i>
        <h2><?php echo e($course->title); ?></h2>
        <p><?php echo e($course->description); ?></p>
        <p class="time"><?php echo e($course->time); ?></p>
    </div>

<?php } ?>
</div>

<?php 
include __DIR__ . "/includes/footer.php";
?>
</body>
</html>

