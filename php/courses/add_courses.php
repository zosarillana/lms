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
    $strand_name = $_POST['strand_name'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO strand (strand_name) VALUES (?)");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error preparing statement: " . $conn->error;
        header("Location: ../../views/admin/courses/index.php");
        exit();
    }

    $stmt->bind_param("s", $strand_name);

    try {
        // Execute the statement
        if ($stmt->execute()) {
            // Set success message
            $_SESSION['success_message'] = "New strand added successfully";
        } else {
            // Set error message
            $_SESSION['error_message'] = "Error: " . $stmt->error;
        }
    } catch (mysqli_sql_exception $e) {
        // Check if it's a duplicate entry error
        if ($e->getCode() == 1062) {
            $_SESSION['error_message'] = "Duplicated entry for strand name: $strand_name";
        } else {
            $_SESSION['error_message'] = "Error: " . $e->getMessage();
        }
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/admin/courses/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
