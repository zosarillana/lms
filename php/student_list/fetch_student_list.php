<?php
include "../../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the schedules table
$sql = "SELECT `id`, `teacher_id`, `student_id`, `grade_level`, `school_year`, `teacher_fname`, `teacher_lname`, `student_fname`, `student_lname`,  `subject_id`,  `strand_id`,
`student_schedule_subject_name`, `student_schedule_subject_schedule_day`,`student_schedule_subject_schedule_time`,`student_schedule_strand_name`,
`date_created`,`date_updated`, `semester` FROM `student_with_subjects`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the fetched data in an array
    $studentLists = [];
    while ($row = $result->fetch_assoc()) {
        $studentLists[] = $row;
    }
} else {
    $studentLists = [];
}

$conn->close();
