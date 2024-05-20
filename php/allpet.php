<?php
include "../../php/db_connect.php";

$sql = "SELECT * FROM pet ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $petData = [];

    while ($row = $result->fetch_assoc()) {
        $petData[] = $row;
    }
} else {
    $petData = [];
}

$conn->close();
?>
