<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if strand ID is provided in the request
if (isset($_POST['id'])) {
    // Get the strand ID
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM strand WHERE id=?");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/admin/courses/index.php");
        exit();
    }

    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "Strand deleted successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    $_SESSION['error_message'] = "Strand ID is not provided";
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/admin/courses/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
