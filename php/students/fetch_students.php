<?php
include "../../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the schedules table
$sql = "SELECT `id`, `student_id`, `strand_id`, `student_fname`, `student_mname`, `student_lname`, `student_email`, `student_strand`, `student_gradelevel`, `student_gender`, `student_address`, `student_birthdate`, `student_guardian`, `student_guardian_contact`, `student_guardian_address`, `student_guardian_work`, `student_2ndguardian`, `student_2ndguardian_contact`, `student_2ndguardian_address`, `student_2ndguardian_work`, `student_username`, `student_password`, `date_created`, `date_updated` FROM `student_accounts`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the fetched data in an array
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
} else {
    $students = [];
}

$conn->close();
