<?php
session_start();
session_destroy();
header("Location: /projectdemo/php/login.php");

?>