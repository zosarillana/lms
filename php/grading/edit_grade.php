<?php
session_start();
include "../../php/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $first_quarter = $_POST['first_quarter'];
    $second_quarter = $_POST['second_quarter'];
    $final = $_POST['final'];

    // Update the student grades
    $stmt = $conn->prepare("UPDATE student_grades SET 1st_quarter = ?, 2nd_quarter = ?, final = ? WHERE id = ? ");
    $stmt->bind_param("sssi", $first_quarter, $second_quarter, $final, $id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Grade updated successfully.";
    } else {
        $_SESSION['error_message'] = "Error updating grade: " . $stmt->error;
    }

    $stmt->close();

    header("Location: ../../views/teacher/grading/index.php"); // Redirect to index page
    exit();
}

$conn->close();
