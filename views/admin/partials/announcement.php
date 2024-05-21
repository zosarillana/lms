<?php
// Fetch the latest announcement based on date_created
// Include database connection
include "../../../php/db_connect.php";

$sql = "SELECT * FROM announcement ORDER BY date_created DESC LIMIT 1";
$result = $conn->query($sql);

// Initialize variables for announcement data
$announcement_message = "There are currently no announcements.";
$datetime = "No date available.";
$announcement_image = "../../../images/logo.jpg"; // Default image path if no announcement found

// Check if the query executed successfully
if ($result && $result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $announcement_message = $row['message'];
    $datetime = $row['datetime'];
    $announcement_image = "../" . $row['file']; // Assuming 'file' column stores the image file path
}

// Close the database connection
$conn->close();
?>

<div class="lg:w-700 lg:w-3/4 mx-auto card lg:card-side bg-base-300 shadow-xl">
    <figure>
        <img src="<?php echo $announcement_image; ?>" style="height:400px;" alt="Announcement" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">New Announcement</h2>
        <p>Announcement set at date: <?php echo $datetime; ?><br>
            Announcement message: <?php echo $announcement_message; ?></p>
        <div class="card-actions justify-end">
            <!-- <button class="btn btn-primary">Listen</button> -->
        </div>
    </div>
</div>