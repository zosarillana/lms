<!doctype html>
<html data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../views/output.css" rel="stylesheet">
</head>
<?php include '../partials/navbar.php'; ?>

<body class="bg-[url('../../images/mainBG1.png')]">
    <div class=" flex flex-col h-screen w-screen">
        <div class=" pt-10 pl-5  ">
            <div class="grid grid-cols-7 gap-3">
                <div>
                    <label for="type" class="pl-2 font-semibold">Select Type</label>
                    <select class="select select-bordered w-full max-w-xs">
                        <option disabled selected>Type</option>
                        <option>Type 1</option>
                        <option>Type 2</option>
                    </select>
                </div>
                <div>
                    <label for="gender" class="pl-2 font-semibold">Select Gender</label>
                    <select class="select select-bordered w-full max-w-xs">
                        <option disabled selected>Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div>
                    <label for="breed" class="pl-2 font-semibold">Breed</label>
                    <input type="text" placeholder="breed" class="input input-bordered input-md max-w-xs" />
                </div>
            </div>
        </div>


    </div>

</body>

</html>