<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

$result = $conn->query("SELECT * FROM courses");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css"/>
    
    <title>Courses</title>

<style>
main{
    display: grid;
    grid-template-columns: 2fr 2fr;
    margin-top: 10%;
    margin-left: 100px;
    margin-bottom: 10px;
    gap: 30px;
}
.box{
    background-color: rgba(182, 182, 182, 0.080);
    display: flex;
    width: 580px;
}
.img{
    margin-right: 20px;
    width: 250px;        /* kontrollon madhësinë */
    height: 180px;
    flex-shrink: 0;      /* mos u shtri */
}

.img img{
    width: 100%;
    height: 100%;
    object-fit: cover;   /* mos u shtrembëro */
    border-radius: 10px; /* opsionale - duket nicer */
}
.iner-box h1{
    color: var(--blue);
    font-weight: 500;
    font-size: 24px;
}
.iner-box h3{
    color: #fda638;
    font-size: 16px;
}
.iner-box h3 span{
    color: black;
}
.iner-box p{
    color: var(--gray);
    font-size: 16px;
}
.box {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease-out;
}
.box.show {
    opacity: 1;
    transform: translateY(0);
}
.orari{
    height: 120px;
    width: 100%;
    margin-top: 20px;
    margin-bottom: 20px;
}
.orari button{
    border: none;
    border-radius: 50px;
    background-color: #fda638;
    color: white;
    font-size: 17px;
    width: 180px;
    height: 45px;
    margin-left: 85%;
    margin-top: 4%;
    cursor: pointer;
}
.orari button:hover{
    background-color:white;
    color:#fda638;
    border:1px solid #fda638;
}
</style>

</head>
<body>
<?php include __DIR__ . "/includes/header.php"; ?>

<main>

<?php while ($row = $result->fetch_assoc()) { ?>

<div class="box">
    <div class="img">
    <img src="assets/images/<?php echo e($row['image']); ?>" alt="<?php echo e($row['course_name']); ?>">
    </div>

    <div class="iner-box">
        <h1><?php echo e($row['course_name']); ?></h1>
        <h3>Class time:<span> <?php echo e($row['time']); ?></span></h3>
        <p><?php echo e($row['info']); ?></p>
    </div>
</div>

<?php } ?>

</main>



<?php 
include __DIR__ . "/includes/footer.php";
?>
<script>
const boxes = document.querySelectorAll('.box');

function checkBoxes() {
    const triggerBottom = window.innerHeight * 0.85;

    boxes.forEach(box => {
        const boxTop = box.getBoundingClientRect().top;

        if (boxTop < triggerBottom) {
            box.classList.add('show');
        } else {
            box.classList.remove('show');
        }
    });
}

window.addEventListener('scroll', checkBoxes);
checkBoxes();
</script>

</body>
</html>