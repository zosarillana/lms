<?php
session_start();

include 'db_connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM pet WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    //same issue mar ga error sakoa remove ra comments
    // include_once($_SERVER['DOCUMENT_ROOT'] . '/views/pets/yourpet.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/codeiza/pawsconnect/views/pets/yourpet.php');
}
