<?php

session_start();
$_SESSION = array();

session_destroy();
// header("Location: /views/signin/index.php");
header("Location: ../views/signin/index.php");
exit();
