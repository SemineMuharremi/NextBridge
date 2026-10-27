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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css"/>
    <title>Prices</title>
</head>
<style>
    section{
        display: grid;
        grid-template-columns: repeat(4,1fr);
        margin-top: 9%;
        margin-left: 13%;
        gap: 20px;
        width: 600px;
        margin-bottom: 90px;
    }
    .card{
        width: 270px;
        justify-self: center;
        background-color: #f8f9fab3 !important;
    }
    .card h1{
        text-align: center;
        font-weight: 400;
        font-family: sans-serif;
        font-size: 22px;
        padding: 10px;
    }
    .card h3{
        text-align: center;
        font-weight: 900;
        font-size: 28px;
        color: #1eaaf1;
        font-family: sans-serif;
    }
    .card h3 span{
        font-family: sans-serif;
        font-size: 12px;
         line-height: 1.8;
        font-weight: 500;
        color: rgba(0, 0, 0, 0.5);
    }
    .card img{
        width: 270px;
        height: 150px;
    }
    .card p {
    text-align: center;
    font-family: "Work Sans", Arial, sans-serif;
    font-size: 16px;
    line-height: 1.8;
    font-weight: 400;
    color: rgba(0, 0, 0, 0.5);
    padding: 10px;
    }
    .card:nth-child(1) button {
      margin-left: 79.5px;
      margin-bottom: 20px;
      margin-top: 10px;
      background: #1eaaf1;
      border: 1px solid #1eaaf1;
      color: #fff;
      padding: 20px;
      border-radius: 40px;
    }
   .card:nth-child(1) button:hover{
        background-color: #fff;
        color: #1eaaf1;

    }
     .card:nth-child(2) button {
      margin-left: 79.5px;
      margin-bottom: 20px;
      margin-top: 10px;
      background: #fda638;
      border: 1px solid #fda638;
      color: #fff;
      padding: 20px;
      border-radius: 40px;
    }
   .card:nth-child(2) button:hover{
        background-color: #fff;
        color: #fda638;

    }
       .card:nth-child(3) button {
      margin-left: 79.5px;
      margin-bottom: 20px;
      margin-top: 10px;
      background-color: #8cc152;
      border: 1px solid #8cc152;
      color: #fff;
      padding: 20px;
      border-radius: 40px;
    }
   .card:nth-child(3) button:hover{
        color: #8cc152;
        background-color: #fff;

    }
         .card:nth-child(4) button {
      margin-left: 79.5px;
      margin-bottom: 20px;
      margin-top: 10px;
     background: #f1453d;
    border: 1px solid #f1453d;
    color: #fff;
      padding: 20px;
      border-radius: 40px;
    }
   .card:nth-child(4) button:hover{
        color: #f1453d;
        background-color: #fff;

    }
    .card {
  transform: scale(0.8);
  opacity: 0;
  animation: popUp 0.8s ease forwards;
}

.card:nth-child(1) { animation-delay: 0.2s; }
.card:nth-child(2) { animation-delay: 0.4s; }
.card:nth-child(3) { animation-delay: 0.6s; }
.card:nth-child(4) { animation-delay: 0.8s; }

@keyframes popUp {
  to {
    transform: scale(1);
    opacity: 1;
  }
}


/* LARGE TABLET / SMALL DESKTOP (993px - 1199px) */
@media only screen and (min-width: 993px) and (max-width: 1199px) {
    section {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
}

/* TABLET (601px - 992px) */
@media only screen and (min-width: 601px) and (max-width: 992px) {
    section {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-top: 120px;
        width: 600px;
    }

    .card h1 { font-size: 18px; }
    .card h3 { font-size: 22px; }
    .card p { font-size: 14px; }
    .card button {
        width: 50%;
        padding: 15px;
        margin: 10px auto; /* qendër në mobile/tablet */
        display: block;
        
    }
    .card a{
        text-decoration: none;
    }
}

/* MOBILE (≤600px) */
@media only screen and (max-width: 600px) {
    section {
        grid-template-columns: 1fr;
        gap: 15px;
        margin-top: 120px;
        margin-left: -8px !important;
        width: 450px;
    }

    .card h1 { font-size: 16px; }
    .card h3 { font-size: 20px; }
    .card p { font-size: 13px; }
    .card button {
        width: 50%;
        padding: 12px;
        margin: 10px auto;
        display: block;
    }
}



</style>
<body>
<?php include __DIR__ . "/includes/header.php"; ?>

<section>
        <div class="card">
            <h1>Basic</h1>
            <h3>29.99$ <span>/5month</span></h3>
            <img src="assets/images/prices1.jpg">
            <p>Mësoni kodimin bazë, prapa mureve logjike, larg gabimeve dhe defekteve komplekse, aty rriten programuesit e rinj të<br> sigurt.</p>
            <a href="contact.php"><button>20% off</button></a>
        </div>
        <div class="card">
            <h1>Standard</h1>
            <h3>49.99$ <span>/5month</span></h3>
            <img src="assets/images/prices2.jpg">
            <p>Puno hap pas hapi, përtej mësimeve të përditshme, larg konfuzionit dhe dyshimit, aty ndërto zgjidhësit krijues të problemeve.</p>
           <a href="contact.php"><button>20% off</button></a>
        </div>
        <div class="card">
            <h1>Premium</h1>
            <h3>54.50$ <span>/5month</span></h3>
            <img src="assets/images/prices3.jpg">
            <p>Mësoni kodimin bazë, prapa mureve logjike, larg gabimeve dhe defekteve komplekse, aty rriten programuesit e rinj të <br>sigurt.</p>
            <a href="contact.php"><button>20% off</button></a>
        </div>
        <div class="card">
            <h1>Platinum</h1>
            <h3>89.99$ <span>/5month</span></h3>
            <img src="assets/images/takecourse.webp">
            <p>Puno hap pas hapi, përtej mësimeve të përditshme, larg konfuzionit dhe dyshimit, aty ndërto zgjidhësit krijues të problemeve.</p>
            <a href="contact.php"><button>20% off</button></a>
        </div>
</section>
<?php
include __DIR__ . "/includes/footer.php";
?>
</body>
</html>