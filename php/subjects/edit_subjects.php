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
    $subject_name = $_POST['subject_name'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE subject SET subject_name=? WHERE id=?");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/admin/subjects/index.php");
        exit();
    }

    $stmt->bind_param("si", $subject_name, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "Subject information updated successfully";
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
header("Location: ../../views/admin/subjects/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
