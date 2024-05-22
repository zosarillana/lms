
<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if subject ID is provided in the request
if (isset($_POST['id'])) {
    // Get the subject ID
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM student_grades WHERE id=?");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/teacher/grading/index.php");
        exit();
    }

    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "subject deleted successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    $_SESSION['error_message'] = "subject ID is not provided";
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/teacher/grading/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
