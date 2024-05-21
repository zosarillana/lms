<?php
include "../../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the schedules table
$sql = "SELECT `id`, `teacher_id`, `teacher_strand_id`, `teacher_fname`, `teacher_mname`, `teacher_lname`, `teacher_gender`, `teacher_birthdate`, `teacher_address`, `teacher_email`, `teacher_strand`, `teacher_username`, `teacher_password`, `date_created`, `date_updated` FROM `teacher_accounts`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the fetched data in an array
    $teachers = [];
    while ($row = $result->fetch_assoc()) {
        $teachers[] = $row;
    }
} else {
    $teachers = [];
}

$conn->close();
