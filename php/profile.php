<?php
session_start();
include "db_connect.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $first_name = $user_data['first_name'];
    $last_name = $user_data['last_name'];
    $age = $user_data['age'];
    $birthdate = $user_data['birthdate'];
    $gender = $user_data['gender'];
    $email = $user_data['email'];
    $username = $user_data['username'];

    // Gi ilisan nako ga error sakoa hawaa lang comment
    // include_once($_SERVER['DOCUMENT_ROOT'] . '/views/profile/index.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/codeiza/pawsconnect/views/profile/index.php');
}
