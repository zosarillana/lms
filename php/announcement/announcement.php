<?php
session_start(); // Start the session
include "../../php/db_connect.php"; // Include your database connection

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
    header("Location: ../../views/admin/announcements/index.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded successfully
    if (isset($_FILES["file"])) {
        // Check for specific upload errors
        $upload_error_code = $_FILES["file"]["error"];
        if ($upload_error_code !== UPLOAD_ERR_OK) {
            $_SESSION['error_message'] = "File upload error: " . $upload_error_code;
            header("Location: ../../views/admin/announcements/index.php");
            exit();
        }

        // Get form data
        $datetime = $_POST['announcement_date'];
        $message = $_POST['announcement_msg'];

        // Define the target directory for the file upload
        $target_dir = "../../uploaded/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is a valid image type
        $allowed_extensions = array("jpg", "jpeg", "png");
        if (!in_array($imageFileType, $allowed_extensions)) {
            $_SESSION['error_message'] = "Sorry, only JPG, JPEG, and PNG files are allowed.";
            header("Location: ../../views/admin/announcements/index.php");
            exit();
        }

        // Try to move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Prepare and bind the SQL statement
            $sql = "INSERT INTO announcement (datetime, message, file) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Check if the statement is prepared successfully
            if (!$stmt) {
                $_SESSION['error_message'] = "Error: " . $conn->error;
                header("Location: ../../views/admin/announcements/index.php");
                exit();
            }

            $stmt->bind_param("sss", $datetime, $message, $target_file);

            // Execute the statement
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Announcement added successfully.";
            } else {
                $_SESSION['error_message'] = "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        }
    } else {
        $_SESSION['error_message'] = "File upload error: File not received.";
    }
}

// Close the connection
$conn->close();

// Redirect to the announcement page
header("Location: ../../views/admin/announcements/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
