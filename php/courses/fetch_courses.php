<?php
include "../../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the strands table
$sql = "SELECT id, strand_name, date_created FROM strand";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the fetched data in an array
    $strands = [];
    while ($row = $result->fetch_assoc()) {
        $strands[] = $row;
    }
} else {
    $strands = [];
}

$conn->close();
