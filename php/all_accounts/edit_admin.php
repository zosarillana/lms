<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['id'];
    $user_fullname = $_POST['user_fullname'];
    $user_username = $_POST['user_username'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT); // Hash the password for security

    // Check if user_type is set
    if (isset($_POST['user_type'])) {
        $user_type = $_POST['user_type'];
    } else {
        $_SESSION['error_message'] = "User type is not set";
        header("Location: ../../views/admin/all_accounts/index.php");
        exit();
    }

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE users SET user_fullname=?, user_username=?, user_password=?, user_type=? WHERE id=?");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/admin/all_accounts/index.php");
        exit();
    }

    $stmt->bind_param("ssssi", $user_fullname, $user_username, $user_password, $user_type, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "User information updated successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/admin/all_accounts/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
