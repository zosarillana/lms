<?php
session_start(); // Start the session

// Database connection
include '../../php/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $student_id = $_POST['student_id'];
        $student_fname = $_POST['student_fname'];
        $student_mname = $_POST['student_mname'];
        $student_lname = $_POST['student_lname'];
        $fullname = $student_fname . " " . $student_lname;
        $student_gender = $_POST['student_gender'];
        $student_birthdate = $_POST['student_birthdate'];
        $student_address = $_POST['student_address'];
        $student_email = $_POST['student_email'];
        // Explode strand to get strand_id and strand_name
        list($strand_id, $strand_name) = explode(",", $_POST['strand']);
        $student_gradelevel = $_POST['student_gradelevel'];
        $student_guardian = $_POST['student_guardian'];
        $student_guardian_contact = $_POST['student_guardian_contact'];
        $student_guardian_address = $_POST['student_guardian_address'];
        $student_guardian_work = $_POST['student_guardian_work'];
        $student_2ndguardian = $_POST['student_2ndguardian'];
        $student_2ndguardian_contact = $_POST['student_2ndguardian_contact'];
        $student_2ndguardian_address = $_POST['student_2ndguardian_address'];
        $student_2ndguardian_work = $_POST['student_2ndguardian_work'];
        $student_username = $_POST['student_username'];
        $student_password = $_POST['student_password'];
        // Hash the password using bcrypt
        $hashed_password = password_hash($student_password, PASSWORD_BCRYPT);
        $user_type = "Student";

        // Check for user duplication
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? OR user_username = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("ss", $student_id, $student_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error_message'] = "Error: Duplicate user ID or username.";
        } else {
            // Insert into users table
            $stmt = $conn->prepare("INSERT INTO users (user_id, user_fullname, user_username, user_password, user_type) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("sssss", $student_id, $fullname, $student_username, $hashed_password, $user_type);
            if ($stmt->execute()) {
                // Insert into student_accounts table
                $stmt = $conn->prepare("INSERT INTO student_accounts (student_id, student_fname, student_mname, student_lname, student_gender, student_birthdate, student_address, student_email, student_strand, strand_id, student_gradelevel, student_guardian, student_guardian_contact, student_guardian_address, student_guardian_work, student_2ndguardian, student_2ndguardian_contact, student_2ndguardian_address, student_2ndguardian_work, student_username, student_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $conn->error);
                }
                $stmt->bind_param("sssssssssssssssssssss", $student_id, $student_fname, $student_mname, $student_lname, $student_gender, $student_birthdate, $student_address, $student_email, $strand_name, $strand_id, $student_gradelevel, $student_guardian, $student_guardian_contact, $student_guardian_address, $student_guardian_work, $student_2ndguardian, $student_2ndguardian_contact, $student_2ndguardian_address, $student_2ndguardian_work, $student_username, $hashed_password);
                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "New record created successfully";
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
        header("Location: ../../views/admin/students/index.php");
        exit();
    }
}
