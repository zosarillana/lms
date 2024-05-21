<?php
session_start(); // Start the session

// Database connection
include '../../php/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $teacher_id = $_POST['teacher_id'];
        $teacher_fname = $_POST['teacher_fname'];
        $teacher_mname = $_POST['teacher_mname'];
        $teacher_lname = $_POST['teacher_lname'];
        $fullname = $teacher_fname . " " . $teacher_lname;
        $teacher_gender = $_POST['teacher_gender'];
        $teacher_birthdate = $_POST['teacher_birthdate'];
        $teacher_address = $_POST['teacher_address'];
        $teacher_email = $_POST['teacher_email'];
        // Explode strand to get strand_id and strand_name
        list($strand_id, $strand_name) = explode(",", $_POST['teacher_strand']);
        $teacher_username = $_POST['teacher_username'];
        $teacher_password = $_POST['teacher_password'];
        // Hash the password using bcrypt
        $hashed_password = password_hash($teacher_password, PASSWORD_BCRYPT);
        $user_type = "Teacher";

        // Check for user duplication
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_username = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("s", $teacher_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error_message'] = "Error: Duplicate username.";
        } else {
            // Insert into users table
            $stmt = $conn->prepare("INSERT INTO users (user_id, user_fullname, user_username, user_password, user_type) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("issss", $teacher_id, $fullname, $teacher_username, $hashed_password, $user_type);
            if ($stmt->execute()) {
                // Insert into teacher_accounts table
                $stmt = $conn->prepare("INSERT INTO teacher_accounts (teacher_id, teacher_fname, teacher_mname, teacher_lname, teacher_gender, teacher_birthdate, teacher_address, teacher_email, teacher_strand, teacher_strand_id, teacher_username, teacher_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $conn->error);
                }
                $stmt->bind_param("isssssssssss", $teacher_id, $teacher_fname, $teacher_mname, $teacher_lname, $teacher_gender, $teacher_birthdate, $teacher_address, $teacher_email, $strand_name, $strand_id, $teacher_username, $hashed_password);
                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "New teacher record created successfully";
                } else {
                    throw new Exception("Error: " . $stmt->error);
                }
            } else {
                throw new Exception("Error: " . $stmt->error);
            }
        }
    } catch (Exception $e) {
        $_SESSION['error_message'] = $e->getMessage();
    } finally {
        // Close database connection
        if (isset($stmt)) {
            $stmt->close();
        }
        $conn->close();
        header("Location: ../../views/admin/teachers/index.php");
        exit();
    }
}
