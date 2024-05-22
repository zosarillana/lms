<?php
session_start();
include '../../../php/db_connect.php';
include '../../../php/student_list/fetch_student_list.php';
?>
<!DOCTYPE html>
<html lang="en" data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../../src/output.css" rel="stylesheet">
    <?php include '../../partials/student_navbar.php'; ?>
</head>

<body>
    <div class="flex flex-col h-screen ">
        <div class="grid place-items-center pt-5">
            <div class="max-w-6xl w-full">
                <?php include '../tables/grades_table/table.php'; ?>
                <div class="mt-12">
                    <!-- Display success message -->
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '
                    <div id="alertDiv" role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>' . $_SESSION['success_message'] . '</span>
                    </div>
                    ';
                        unset($_SESSION['success_message']); // Clear the message
                    }
                    ?>

                    <!-- Display error message -->
                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo '
                    <div id="alertDiv" role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>' . $_SESSION['error_message'] . '</span>
                    </div>
                    ';
                        unset($_SESSION['error_message']); // Clear the message
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<script>
    // Get the alert element
    var alertDiv = document.getElementById("alertDiv");

    // Set a timeout to fade out the alert after 3 seconds
    setTimeout(function() {
        // Apply transition to fade out smoothly
        alertDiv.style.transition = "opacity 1s ease";
        alertDiv.style.opacity = "0";
        // Optionally, you can remove the alert after fading out
        setTimeout(function() {
            alertDiv.remove();
        }, 1000); // Wait for the fade out transition to complete before removing
    }, 3000); // 3000 milliseconds = 3 seconds
</script>