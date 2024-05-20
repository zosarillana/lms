<!doctype html>
<html data-theme="cupcake">

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
            <section class="flex-grow bg-base-100 rounded-box place-items-center">
                <div class="grid place-items-center w-full h-full">
                    <div class="max-w-xl w-full pt-5 pb-10">
                        <div data-theme="cupcake" class="bg-gray-100 rounded-md shadow dark:border md:mt-0 sm:max-w-xl xl:p-0">
                            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-1x1">
                                    Sign up!</h1>
                                <p class="text-sm font-light text-gray-900 ">
                                    Sign up here! ❤️
                                </p>
                                <form class="space-y-4 md:space-y-6" action="../../php/register.php" method="POST">
                                    <div class="col-span-2">
                                        <div class="grid grid-cols-2 gap-2">
                                            <div>
                                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                                                <input type="text" name="first_name" id="first_name" class="input input-bordered input-md w-full" placeholder="First name" required="">
                                            </div>
                                            <div>
                                                <label for="lasst_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                                                <input type="text" name="last_name" id="lasst_name" class="input input-bordered input-md w-full" placeholder="Last name" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2">
                                        <div>
                                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
                                            <input type="text" name="age" id="age" placeholder="Age" class="input input-bordered input-md w-full" required="" />
                                        </div>
                                        <div>
                                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">Birthdate</label>
                                            <input type="date" name="birthdate" id="birthdate" class="input input-bordered input-md w-full" placeholder="YYYY/DD/MM" required="">
                                        </div>
                                        <div>
                                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                                            <select name="gender" class="select select-bordered w-full max-w-xs">
                                                <option disabled selected>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                            <input type="text" name="username" id="username" placeholder="Username" class="input input-bordered input-md w-full" required />
                                        </div>
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                            <input type="email" name="email" id="email" placeholder="Email@gmail.com" class="input input-bordered input-md w-full" required />
                                        </div>
                                    </div>
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class="input input-bordered input-md w-full" required />
                                    </div>
                                    <button class="btn btn-block border-none text-gray-50 btn-secondary hover:bg-pink-400">Sign in</button>
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        Already have an account? <a href="../../views/signin/index.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up here!</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="divider divider-horizontal"></div>
            <div class="flex-grow card place-items-center place-content-center pb-20" style="background-image: url('../../images/paws.jpg'); background-repeat: no-repeat; background-size: cover;">
                <div>
                    <div class="flex pb-5 place-items-center">
                        <div class="w-[450px]">
                            <img src="../../images/logo.png" alt="Example Image" class="w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>