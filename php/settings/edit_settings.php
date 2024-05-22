<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_id = $_POST['user_id'];
    $user_fullname = $_POST['user_fullname'];
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password']; // New password from form (if provided)

    // Update the user information
    if (empty($user_password)) {
        // Update without password
        $stmt = $conn->prepare("UPDATE users SET user_fullname=?, user_username=? WHERE user_id=?");
        $stmt->bind_param("ssi", $user_fullname, $user_username, $user_id);
    } else {
        // Hash the new password before updating
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE users SET user_fullname=?, user_username=?, user_password=? WHERE user_id=?");
        $stmt->bind_param("sssi", $user_fullname, $user_username, $hashed_password, $user_id);
    }

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Execute the statement
    if ($stmt->execute()) {
        // Update session variables
        $_SESSION['user_fullname'] = $user_fullname;
        $_SESSION['user_username'] = $user_username;

        // Set success message
        $_SESSION['success_message'] = "Profile updated successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

// Redirect to referring page
if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    // Fallback in case HTTP_REFERER is not set
    header("Location: ../../views/admin/profile.php");
}
exit(); // Ensure that subsequent code is not executed after redirection
