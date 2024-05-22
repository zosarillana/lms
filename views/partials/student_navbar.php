<div class="navbar bg-base-300">
    <div class="flex-none">
        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle peer" />
            <div class="drawer-content">
                <!-- Page content here -->
                <label for="my-drawer" class="btn btn-ghost drawer-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>
            <div class="drawer-side">
                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu p-4 w-72 min-h-full bg-base-200 text-base-content">
                    <li class="ml-9 mb-3">
                        <img src="../../../images/logo-nobg.png" style="width: 85%;" alt="Image description">
                    </li>
                    <label class="ml-4 mb-5 fs-10 font-semibold text-lg">
                        Student
                    </label>
                    <li class="font-normal text-lg"><a href="../dashboard/index.php"> Dashboard</a></li>
                    <li class="font-normal text-lg"><a href="../../../views/student/grades/index.php">Grades</a></li>
                    <li class="font-normal text-lg"><a href="../../../views/student/subject_list/index.php">Subject List</a></li>
                    <li class=" font-normal text-lg"><a href="../../../views/student/attendance/index.php">Attendance</a></li>
                    <li class=" font-normal text-lg"><a href="../../../views/student/request/index.php">Requests</a></li>
                    <li class="font-normal text-lg"><a href="../../../views/student/settings/index.php">Settings</a></li>
                    <li class="font-normal text-lg"><a href="../../../php/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <style>
            .drawer {
                z-index: 9999;
                /* Adjust this value as needed */
            }
        </style>
    </div>
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">CampusConnect 📚</a>
    </div>
    <div class="flex-none">
        <!-- <button class="btn btn-square btn-ghost hide-when-drawer-active">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
            </svg>
        </button> -->
    </div>
</div>


<script>
    document.getElementById('my-drawer').addEventListener('change', function() {
        const navItems = document.querySelectorAll('.hide-when-drawer-active');
        navItems.forEach(item => {
            item.style.display = this.checked ? 'none' : 'block';
        });
    });
</script>