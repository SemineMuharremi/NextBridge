<?php
session_start();
session_destroy(); // fshin të gjitha session-et
header("Location: login.php");
exit();
?>