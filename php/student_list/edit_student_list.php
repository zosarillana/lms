<?php
session_start(); // Start the session

// Database connection
include '../../php/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data (excluding password and username)
        $id = $_POST['id'];
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

        // Print variable values for debugging
        echo "ID: " . $id . "<br>";
        echo "Student ID: " . $student_id . "<br>";
        // Add similar lines for other variables

        // Update student_accounts table (excluding password and username)
        $stmt = $conn->prepare("UPDATE student_accounts SET student_id = ?, student_fname = ?, student_mname = ?, student_lname = ?, student_gender = ?, student_birthdate = ?, student_address = ?, student_email = ?, student_strand = ?, strand_id = ?, student_gradelevel = ?, student_guardian = ?, student_guardian_contact = ?, student_guardian_address = ?, student_guardian_work = ?, student_2ndguardian = ?, student_2ndguardian_contact = ?, student_2ndguardian_address = ?, student_2ndguardian_work = ? WHERE id = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ssssssssssssssssssss", $student_id, $student_fname, $student_mname, $student_lname, $student_gender, $student_birthdate, $student_address, $student_email, $strand_name, $strand_id, $student_gradelevel, $student_guardian, $student_guardian_contact, $student_guardian_address, $student_guardian_work, $student_2ndguardian, $student_2ndguardian_contact, $student_2ndguardian_address, $student_2ndguardian_work, $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $_SESSION['success_message'] = "Record updated successfully (excluding password and username)";
            } else {
                $_SESSION['error_message'] = "No changes were made to the record.";
            }
        } else {
            // Improved error handling with specific message for each error type
            $error_message = "Error executing statement: " . $stmt->error;
            if (strpos($stmt->error, "Duplicate") !== false) {
                $error_message = "Error: Student ID or Email already exists.";
            }
            $_SESSION['error_message'] = $error_message;
        }

        // Close statement and connection
    } catch (Exception $e) {
        $_SESSION['error_message'] = $e->getMessage();
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        $conn->close();
        header("Location: ../../views/teacher/student_list/index.php");
        exit();
    }
}
