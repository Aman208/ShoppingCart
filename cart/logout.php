<?php
session_start();
$_SESSION["cashID"]="";
session_destroy();

header("Location:index.php");
?>