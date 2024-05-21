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
    $strand_name = $_POST['strand_name'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE strand SET strand_name=? WHERE id=?");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/admin/courses/index.php");
        exit();
    }

    $stmt->bind_param("si", $strand_name, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "Strand information updated successfully";
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
header("Location: ../../views/admin/courses/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
