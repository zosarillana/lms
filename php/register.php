<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO user (first_name, last_name, age, birthdate, gender, username, email, password) 
            VALUES ('$first_name', '$last_name', '$age', '$birthdate', '$gender', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // header("Location: /views/signin/index.php");
        header("Location: ../views/signin/index.php");

        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
