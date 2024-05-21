<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if user ID is provided in the request
if (isset($_POST['id'])) {
    // Get the user ID
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/admin/all_accounts/index.php");
        exit();
    }

    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "User deleted successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    $_SESSION['error_message'] = "User ID is not provided";
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/admin/all_accounts/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
