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
                                        Set Announcent!</h1>
                                    <p class="text-sm font-light text-white ">
                                        Select a file to set an announcement.
                                    </p>
                                    <form class="space-y-4 md:space-y-6" action="" method="POST">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-white">Select file</label>
                                            <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w" />
                                        </div>

                                        <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-white">Select Date and time of announcement</label>
                                            <input type="text" id="datetimepicker" placeholder="Select Date and Time" class="input input-bordered w-full max-w">
                                        </div>

                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-white">Accouncement Message</label>
                                            <textarea class="textarea textarea-bordered w-full max-w" placeholder="Bio"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-block border-none text-gray-50 btn-secondary hover:bg-pink-400">Set Announcent</button>

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
</script>

</html>