<?php
session_start();
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare a SQL statement to fetch the user data
    $sql = $conn->prepare("SELECT * FROM users WHERE user_username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    // Check if the username exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user_data = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user_data['user_password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['user_fullname'] = $user_data['user_fullname'];
            $_SESSION['user_username'] = $user_data['user_username'];

            // Check user type before redirecting
            if ($user_data['user_type'] == 'Teacher') {
                // Password is correct, redirect to teacher dashboard
                $_SESSION['success_message'] = "Login successful";
                header("Location: ../views/teacher/dashboard/index.php");
            } else {
                // Password is correct, redirect to admin dashboard (or relevant page)
                $_SESSION['success_message'] = "Login successful";
                header("Location: ../views/admin/dashboard/index.php"); // Replace with appropriate path
            }
            exit();
        } else {
            // Password is incorrect, set error message
            $_SESSION['error_message'] = "Incorrect password. Please try again.";
        }
    } else {
        // Username does not exist, set error message
        $_SESSION['error_message'] = "Username not found. Please try again.";
    }

    // Close prepared statement and database connection
    $sql->close();
    $conn->close();
}

// Redirect back to login page if not a POST request
header("Location: ../index.php");
exit();
