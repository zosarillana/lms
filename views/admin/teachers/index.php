<!DOCTYPE html>
<html lang="en" data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../../src/output.css" rel="stylesheet">
    <?php include '../../partials/navbar.php'; ?>
</head>

<body>
    <div class="flex flex-col h-screen ">
        <div class="grid place-items-center pt-5">
            <div class="max-w-6xl w-full">
                <?php include '../tables/teacher_table/table.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>