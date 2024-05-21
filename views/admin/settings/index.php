<?php
session_start();
// Include database connection
include "../../../php/db_connect.php";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <?php include '../../partials/navbar.php'; ?>
</head>

<body>
    <div class="flex flex-col h-screen ">
        <div class="grid place-items-center pt-5">
            <div class="max-w-6xl w-full">
                <section class="flex-grow bg-base-100 rounded-box place-items-center">
                    <div class="grid place-items-center w-full h-full">
                        <div class="max-w-xl w-full pt-5 pb-10">
                            <div class="bg-base-300 rounded-md shadow  sm:max-w-xl xl:p-0">
                                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                    <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-1x1">
                                        Profile</h1>
                                    <p class="text-sm font-light text-white ">
                                        Welcome Username
                                    </p>
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
                                    <form class="space-y-4 md:space-y-6" action="../../../php/settings/edit_settings.php" method="POST">
                                        <div>

                                            <input hidden value="<?php echo $_SESSION['user_id'];  ?>" name="user_id"></input>
                                            <label class="block mb-2 text-sm font-medium text-white">Full name</label>
                                            <input type="text" name="user_fullname" value="<?php echo $_SESSION['user_fullname'];  ?>" placeholder="Type here" class="input input-bordered w-full max-w" />
                                        </div>

                                        <div>
                                            <label for="user_username" class="block mb-2 text-sm font-medium text-white">Username</label>
                                            <input type="text" name="user_username" value="<?php echo $_SESSION['user_username'];  ?>" placeholder="Type here" class="input input-bordered w-full max-w" />
                                        </div>

                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-white">Password</label>
                                            <input type="text" name="user_password" placeholder="Type here" class="input input-bordered w-full max-w" />
                                        </div>

                                        <button type="submit" class="btn btn-block border-none text-gray-50 btn-secondary hover:bg-pink-400">Update profile</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
<script>
    flatpickr("#datetimepicker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        // Add more options as needed
    });

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

</html>