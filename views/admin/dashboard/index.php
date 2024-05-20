<!DOCTYPE html>
<html lang="en" data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../../views/output.css" rel="stylesheet">
    <?php include '../../partials/navbar.php'; ?>
</head>

<body>


    <div class="flex flex-col h-screen w-full ">
        <div class="grid place-items-center pt-12">
            <div class="max-w-6xl w-full">
                <?php include '../partials/stats.php'; ?>
            </div>
        </div>


        <div class="grid place-items-center mt-5">
            <?php include '../partials/announcement.php'; ?>
        </div>
    </div>

</body>

</html>