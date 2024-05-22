<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if select_subject is set in $_POST
    if (!isset($_POST['select_subject'])) {
        $_SESSION['error_message'] = "Please select a subject to grade.";
        header("Location: ../../views/teacher/grading/index.php");
        exit();
    }

    // Get form data
    list($subject_id, $student_id, $teacher_id,$student_fname, $student_lname, $student_schedule_subject_name, $grade_level, $school_year, $semester) = explode(",", $_POST['select_subject']);
    $first_quarter = $_POST['first_quarter'];
    $second_quarter = $_POST['second_quarter']; // Note: Changed the input name to remove starting number
    $final = $_POST['final'];

    // Check if the entry already exists
    $check_stmt = $conn->prepare("SELECT * FROM student_grades WHERE student_id = ? AND subject_id = ? AND grade_level = ? AND semester = ?");
    $check_stmt->bind_param("iiis", $student_id, $subject_id, $grade_level, $semester);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "This subject in this semester has already been graded for this student.";
        $check_stmt->close();
        $conn->close();
        header("Location: ../../views/teacher/grading/index.php");
        exit();
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO student_grades 
    (student_id, subject_id, teacher_id,subject_name, student_fname, student_lname, grade_level, school_year, semester, 1st_quarter, 2nd_quarter, final) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,? ,?)");

    // Check if the statement is prepared successfully
    if (!$stmt) {
        $_SESSION['error_message'] = "Error: " . $conn->error;
        header("Location: ../../views/teacher/grading/index.php");
        exit();
    }

    $stmt->bind_param(
        "iiisssssssss",
        $student_id,
        $subject_id,
        $teacher_id,
        $student_schedule_subject_name,
        $student_fname,
        $student_lname,
        $grade_level,
        $school_year,
        $semester,
        $first_quarter,
        $second_quarter,
        $final
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['success_message'] = "New record added successfully";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

// Redirect to index page
header("Location: ../../views/teacher/grading/index.php");
exit(); // Ensure that subsequent code is not executed after redirection
