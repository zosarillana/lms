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
        $teacher_lname = $_POST['teacher_lname'];

        // Explode strand to get strand_id and strand_name
        list($student_id, $student_fname, $student_lname) = explode(",", $_POST['select_student']);
        list($subject_id, $strand_id, $student_schedule_subject_name, $student_schedule_subject_schedule_day, $student_schedule_subject_schedule_time, $student_schedule_strand_name) = explode(",", $_POST['select_strand']);

        // Check for schedule conflict
        $stmt = $conn->prepare("SELECT * FROM student_with_subjects WHERE student_id = ? AND student_schedule_subject_schedule_day = ? AND student_schedule_subject_schedule_time = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("iss", $student_id, $student_schedule_subject_schedule_day, $student_schedule_subject_schedule_time);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error_message'] = "Error: Student already has a schedule set on this time and day.";
        } else {
            // Insert into student_with_subjects table
            $stmt = $conn->prepare("INSERT INTO student_with_subjects (teacher_id, student_id, teacher_fname, teacher_lname, student_fname, student_lname, subject_id, strand_id, student_schedule_subject_name, student_schedule_subject_schedule_day, student_schedule_subject_schedule_time, student_schedule_strand_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("isssssssssss", $teacher_id, $student_id, $teacher_fname, $teacher_lname, $student_fname, $student_lname, $subject_id, $strand_id, $student_schedule_subject_name, $student_schedule_subject_schedule_day, $student_schedule_subject_schedule_time, $student_schedule_strand_name);
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Added a new student.";
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
