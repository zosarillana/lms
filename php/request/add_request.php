<?php
// Start session
session_start();
// Add your database connection
include '../../php/db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['student_fullname'], $_POST['select_credential'], $_POST['message'])) {
        // Get form data
        $studentID = $_POST['student_id'];
        $student_fullname = $_POST['student_fullname'];
        $select_credential = $_POST['select_credential'];
        $message = $_POST['message'];
        $status = "Pending";
        // Perform any necessary validation here

        // Prepare and execute SQL statement to insert data
        $stmt = $conn->prepare("INSERT INTO request_credentials (student_id, student_fullname, request, message, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $studentID, $student_fullname, $select_credential, $message, $status);
        if ($stmt->execute()) {
            // Success message
            $_SESSION['success_message'] = "Teacher request added successfully!";
        } else {
            // Error message
            $_SESSION['error_message'] = "Error adding teacher request: " . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Error message if required fields are not set
        $_SESSION['error_message'] = "All fields are required!";
    }

    // Redirect back to the form page
    header("Location: ../../views/student/request/index.php");
    exit();
} else {
    // Redirect back to form page if not a POST request
    header("Location: ../../views/student/request/index.php");
    exit();
}
