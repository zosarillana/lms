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

    // Prepare and bind statement to delete from students_accounts table
    $stmt_students = $conn->prepare("DELETE FROM student_with_subjects WHERE student_id=?");

    // Check if the statement is prepared successfully
    if (!$stmt_students) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/teacher/student_list/index.php");
        exit();
    }

    // Bind parameters for students_accounts table deletion
    $stmt_students->bind_param("i", $id);

    // Execute the statement
    if ($stmt_students->execute()) {
        // Set success message
        $_SESSION['success_message'] = "Data deleted successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt_students->error;
    }

    // Close the statement
    $stmt_students->close();
} else {
    $_SESSION['error_message'] = "ID is not provided";
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/teacher/student_list/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
