<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Get form data
        // Get the selected option value
        $selected_subject = $_POST['subject'];
        $subject_values = explode(",", $selected_subject);
        $subject_id = $subject_values[0];
        $schecule_subject_name = $subject_values[1];

        // Get the selected option value
        $selected_strand = $_POST['strand'];
        $strand_values = explode(",", $selected_strand);
        $strand_id = $strand_values[0];
        $schedule_strand_name = $strand_values[1];

        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $schedule_time = $_POST['start_time'] . " - " . $_POST['end_time'];
        $schedule_days = $_POST['schedule_day']; // Array of selected days

        // Check if all required fields are provided
        if (!empty($subject_id) && !empty($start_time) && !empty($end_time) && !empty($strand_id) && !empty($schedule_days)) {
            // Check if start time and end time are the same
            if ($start_time == $end_time) {
                throw new Exception("Same start time and end time Error.");
            }

            // Check if the schedule conflicts with existing schedules
            $conflict = false;
            $conflict_message = "";

            // Query to check for conflicting schedules
            $conflict_query = "SELECT * FROM schedules WHERE subject_id = ? AND strand_id = ? AND schedule_time = ? AND schedule_day = ?";

            // Prepare and bind
            $check_conflict_stmt = $conn->prepare($conflict_query);

            if ($check_conflict_stmt) {
                foreach ($schedule_days as $day) {
                    $check_conflict_stmt->bind_param("iiss", $subject_id, $strand_id, $schedule_time, $day);
                    $check_conflict_stmt->execute();
                    $result = $check_conflict_stmt->get_result();

                    if ($result->num_rows > 0) {
                        $conflict = true;
                        $conflict_message .= "There is a conflicting schedule for $day. ";
                    }
                }
            } else {
                throw new Exception("Error preparing statement: " . $conn->error);
            }

            if (!$conflict) {
                // Prepare and bind
                $insert_stmt = $conn->prepare("INSERT INTO schedules (subject_id, strand_id, schedule_subject_name, schedule_strand_name, schedule_time, schedule_day) VALUES (?, ?, ?, ?, ?, ?)");

                // Check if the statement is prepared successfully
                if ($insert_stmt) {
                    // Loop through each selected day
                    foreach ($schedule_days as $day) {
                        // Execute the statement for each day
                        $insert_stmt->bind_param("iissss", $subject_id, $strand_id, $schecule_subject_name, $schedule_strand_name, $schedule_time, $day);
                        $insert_stmt->execute();
                    }
                    // Set success message
                    $_SESSION['success_message'] = "Schedules added successfully";
                } else {
                    throw new Exception("Error preparing statement: " . $conn->error);
                }
            } else {
                $_SESSION['error_message'] = $conflict_message;
            }
        } else {
            // Set error message if any required field is empty
            $_SESSION['error_message'] = "All fields are required";
        }
    } catch (Exception $e) {
        $_SESSION['error_message'] = $e->getMessage();
    } finally {
        // Close the statement
        if (isset($check_conflict_stmt)) {
            $check_conflict_stmt->close();
        }
        if (isset($insert_stmt)) {
            $insert_stmt->close();
        }
        // Close the connection
        $conn->close();

        // Redirect to index page
        header("Location: ../../views/admin/schedules/index.php");
        exit(); // Ensure that subsequent code is not executed after redirection
    }
}
