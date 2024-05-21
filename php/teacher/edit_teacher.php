<?php
session_start(); // Start the session

// Database connection
include '../../php/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $id = $_POST['id'];
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
        list($strand_id, $strand_name) = explode(",", $_POST['strand']);
        $teacher_username = $_POST['teacher_username'];
        $teacher_password = $_POST['teacher_password'];
        $user_type = "Teacher";

        // Update users table
        if (!empty($teacher_password)) {
            // Hash the password using bcrypt
            $hashed_password = password_hash($teacher_password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("UPDATE users SET user_id = ?, user_fullname = ?, user_username = ?, user_password = ?, user_type = ? WHERE user_id = ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("ssssss", $teacher_id, $fullname, $teacher_username, $hashed_password, $user_type, $teacher_id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET user_id = ?, user_fullname = ?, user_username = ?, user_type = ? WHERE user_id = ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("sssss", $teacher_id, $fullname, $teacher_username, $user_type, $teacher_id);
        }

        if ($stmt->execute()) {
            // Update teacher_accounts table
            $stmt = $conn->prepare("UPDATE teacher_accounts SET teacher_id = ?, teacher_fname = ?, teacher_mname = ?, teacher_lname = ?, teacher_gender = ?, teacher_birthdate = ?, teacher_address = ?, teacher_email = ?, teacher_strand = ?, teacher_strand_id = ?, teacher_username = ?" . (!empty($teacher_password) ? ", teacher_password = ?" : "") . " WHERE id = ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }

            if (!empty($teacher_password)) {
                $stmt->bind_param("ssssssssssssss", $teacher_id, $teacher_fname, $teacher_mname, $teacher_lname, $teacher_gender, $teacher_birthdate, $teacher_address, $teacher_email, $strand_name, $strand_id, $teacher_username, $hashed_password, $id);
            } else {
                $stmt->bind_param("ssssssssssss", $teacher_id, $teacher_fname, $teacher_mname, $teacher_lname, $teacher_gender, $teacher_birthdate, $teacher_address, $teacher_email, $strand_name, $strand_id, $teacher_username, $id);
            }

            if ($stmt->execute()) {
                if ($conn->affected_rows > 0) {
                    $_SESSION['success_message'] = "Teacher record updated successfully";
                } else {
                    $_SESSION['error_message'] = "No changes were made to the record.";
                }
            } else {
                $_SESSION['error_message'] = "Error: " . $stmt->error;
            }
        } else {
            $_SESSION['error_message'] = "Error: " . $stmt->error;
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
