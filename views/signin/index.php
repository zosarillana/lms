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
    <div class=" flex flex-col h-screen w-screen">
        <div class="flex-grow flex">
            <div class="flex-grow card place-items-center place-content-center pb-20" style="background-image: url('../../images/bg.jpg'); background-repeat: no-repeat; background-size: cover;">
                <div>
                    <div class="flex pb-5 place-items-center">
                        <div class="w-[450px]">
                            <img src="../../images/logo.png" alt="Example Image" class="w-full h-auto">
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
                                    Sign in!</h1>
                                <p class="text-sm font-light text-gray-900 ">
                                    Welcome to Paws Connect! A Match for Responsible Breeding ❤️
                                </p>
                                <form class="space-y-4 md:space-y-6" action="#">
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                        <input type="text" placeholder="Username" class="input input-bordered input-md w-full" required />
                                    </div>

                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class="input input-bordered input-md w-full" required />
                                    </div>
                                    <button class="btn btn-block border-none text-gray-50 btn-secondary hover:bg-pink-400">Sign in</button>
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        Already have an account? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up here!</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

            </section>

        </div>
</body>

</html>