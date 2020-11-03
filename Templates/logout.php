<?php
session_start();
echo print_r($_SESSION);
session_unset();
// for checking
echo "session destroyed!";
echo $_SESSION["uid"];

echo print_r($_SESSION);
header("location:home.php")
?>