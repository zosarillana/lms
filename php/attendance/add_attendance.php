<?php
// Start session
session_start();
include "../../php/db_connect.php"; // Include your database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['select_subject'], $_POST['2nd_quarter'], $_POST['final'])) {
        // Get form data
        $selectedStudent = $_POST['select_subject'];
        $attendancePercentage = $_POST['2nd_quarter'];
        $attendanceMonth = $_POST['final'];

        // Separate student ID, first name, and last name from the selectedStudent
        list($studentID, $teacher_id, $studentFirstName, $studentLastName) = explode(",", $selectedStudent);

        // Concatenate first name and last name with a space in between
        $student_fullname = $studentFirstName . " " . $studentLastName;

        // Perform any necessary validation here

        // Prepare and execute SQL statement to add attendance
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, teacher_id, student_fullname, percentage, month) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $studentID, $teacher_id, $student_fullname, $attendancePercentage, $attendanceMonth);
        if ($stmt->execute()) {
            // Success message
            $_SESSION['success_message'] = "Attendance added successfully!";
        } else {
            // Error message
            $_SESSION['error_message'] = "Error adding attendance: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // Error message if required fields are not set
        $_SESSION['error_message'] = "All fields are required!";
    }
} else {
    // Redirect to form page if accessed directly without submission
    header("Location: ../../views/teacher/attendance/index.php");
    exit();
}

// Close connection
$conn->close();

// Redirect back to the form page
header("Location: ../../views/teacher/attendance/index.php");
exit();
