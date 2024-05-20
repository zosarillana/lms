<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">All Users</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">All users</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../../admin/all_accounts/modal/add_modal.php'; ?>
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">No.</th>
                    <th class="border-b border-gray-200">ID Number</th>
                    <th class="border-b border-gray-200">Fullname</th>
                    <th class="border-b border-gray-200">User Type</th>
                    <th class="border-b border-gray-200">Email</th>
                    <th class="border-b border-gray-200">Contact Number</th>
                    <th class="border-b border-gray-200">Address</th>
                    <th class="border-b border-gray-200">Date Created</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <!-- row 1 -->
                <tr class="hover:bg-slate-200">
                    <th class="border-b text-sm border-gray-200">1</th>
                    <th class="border-b text-sm border-gray-200">13312f</th>
                    <td class="border-b text-sm border-gray-200">Cy Ganderton</td>
                    <td class="border-b text-sm border-gray-200">Admin</td>
                    <td class="border-b text-sm border-gray-200">name@gmail.com</td>
                    <td class="border-b text-sm border-gray-200">+63993441245</td>
                    <td class="border-b text-sm border-gray-200">Manila</td>
                    <td class="border-b text-sm border-gray-200">2024-05-18 16:37:56</td>
                </tr>
                <!-- row 2 -->
                <tr class="hover:bg-slate-200">
                    <th class="border-b text-sm border-gray-200">2</th>
                    <th class="border-b text-sm border-gray-200">21231f</th>
                    <td class="border-b text-sm border-gray-200">Hart Hagerty</td>
                    <td class="border-b text-sm border-gray-200">Teacher</td>
                    <td class="border-b text-sm border-gray-200">name@gmail.com</td>
                    <td class="border-b text-sm border-gray-200">+63993441245</td>
                    <td class="border-b text-sm border-gray-200">Bacolod</td>
                    <td class="border-b text-sm border-gray-200">2024-05-18 16:37:56</td>
                </tr>
                <!-- row 3 -->
                <tr class="hover:bg-slate-200">
                    <th class="border-b text-sm border-gray-200">3</th>
                    <th class="border-b text-sm border-gray-200">33312c</th>
                    <td class="border-b text-sm border-gray-200">Brice Swyre</td>
                    <td class="border-b text-sm border-gray-200">Student</td>
                    <td class="border-b text-sm border-gray-200">name@gmail.com</td>
                    <td class="border-b text-sm border-gray-200">+63993441245</td>
                    <td class="border-b text-sm border-gray-200">Siargao</td>
                    <td class="border-b text-sm border-gray-200">2024-05-18 16:37:56</td>
                </tr>
            </tbody>
        </table>
        <?php include '../tables/pagination/pagination.php'; ?>
    </div>
</div>

<?php include '../tables/scripts/paginate.php'; ?>