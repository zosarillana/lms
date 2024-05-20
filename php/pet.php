<?php
session_start();
include 'db_connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST['type'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $weight = $_POST['weight'];
        $breed = $_POST['breed'];

        $target_dir = "../pets/";
        $target_file = $target_dir . basename($_FILES["pet_image"]["name"]);

        if (move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;

            $sql = "INSERT INTO pet (user_id, type, name, age, gender, weight, breed, pet_image) 
                    VALUES ('$user_id', '$type', '$name', '$age', '$gender', '$weight', '$breed', '$image_path')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['success_message'] = "New pet record created successfully";
                // Redirect to the submit page after successful insertion
                header("Location: ../views/pets/addpet.php");
                exit(); // Ensure no further code execution after redirection
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $conn->close();
    }
} else {
    echo "You must be logged in to add a pet.";
}
