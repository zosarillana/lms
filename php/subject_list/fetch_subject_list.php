<?php
include "../../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the schedules table
$sql = "SELECT * FROM `student_with_subjects`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the fetched data in an array
    $subjectList = [];
    while ($row = $result->fetch_assoc()) {
        $subjectList[] = $row;
    }
} else {
    $subjectList = [];
}

$conn->close();
