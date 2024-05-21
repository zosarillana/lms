<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if ID is provided in the request
if (isset($_POST['id'])) {
    // Get the ID
    $id = $_POST['id'];

    // Prepare and bind statement to delete from users table
    $stmt_users = $conn->prepare("DELETE FROM users WHERE id=?");

    // Prepare and bind statement to delete from students_accounts table
    $stmt_students = $conn->prepare("DELETE FROM student_accounts WHERE student_id=?");

    // Check if the statements are prepared successfully
    if (!$stmt_users || !$stmt_students) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/admin/students/index.php");
        exit();
    }

    // Bind parameters for users table deletion
    $stmt_users->bind_param("i", $id);

    // Bind parameters for students_accounts table deletion
    $stmt_students->bind_param("i", $id);

    // Execute the statements
    if ($stmt_users->execute() && $stmt_students->execute()) {
        // Set success message
        $_SESSION['success_message'] = "Data deleted successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt_users->error . " " . $stmt_students->error;
    }

    // Close the statements
    $stmt_users->close();
    $stmt_students->close();
} else {
    $_SESSION['error_message'] = "ID is not provided";
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/admin/students/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
