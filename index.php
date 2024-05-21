<?php
session_start();
include './php/db_connect.php';

?>


<!doctype html>
<html data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../views/output.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col h-screen w-screen">
        <div class="flex-grow flex">
            <div class="flex-grow card place-items-center place-content-center pb-20" style="background-image: url('../../images/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
                <div>
                    <div class="flex pb-5 place-items-center">
                        <div class="w-[350px]">
                            <img src="./images/logo-nobg.png" alt="Example Image" class="w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider divider-horizontal"></div>
            <section class="flex-grow bg-base-100 rounded-box place-items-center">
                <div class="grid place-items-center w-full h-full">
                    <div class="max-w-xl w-full pt-5 pb-10">
                        <div data-theme="cupcake" class="bg-gray-100 rounded-md shadow dark:border md:mt-0 sm:max-w-xl xl:p-0">
                            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-1x1">
                                    Sign in</h1>
                                <p class="text-sm font-semibold text-gray-900 ">
                                    Welcome to CampusConnect 📚
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
                                <form class="space-y-4 md:space-y-6" action="./php/login.php" method="POST">
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                        <input type="text" name="username" placeholder="Username" class="input input-bordered input-md w-full" required />
                                    </div>

                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class="input input-bordered input-md w-full" required />
                                    </div>
                                    <button type="submit" class="btn btn-block border-none text-gray-50 bg-blue-500 hover:bg-blue-900">Sign in</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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