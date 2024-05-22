<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

// Check if subject ID is provided in the request
if (isset($_POST['id'])) {
    // Get the subject ID
    $id = $_POST['id'];
    $approved = "Approved";
    // Prepare and bind
    $stmt = $conn->prepare("UPDATE request_credentials SET status = ? WHERE id = ?");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $stmt->bind_param("si", $approved, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "Approved request successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    $_SESSION['error_message'] = "Request ID is not provided";
}

// Close the connection
$conn->close();

// Redirect to the referring page or fallback to the credentials index page
if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../../views/admin/credentials/index.php");
}
exit(); // Ensure that subsequent code is not executed after redirection
