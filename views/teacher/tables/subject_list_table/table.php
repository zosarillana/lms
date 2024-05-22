<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Subject List</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Subject List</p>

    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">Subject</th>
                    <th class="border-b border-gray-200">Semester</th>
                    <th class="border-b border-gray-200">Grade Level</th>
                    <th class="border-b border-gray-200">Day</th>
                    <th class="border-b border-gray-200">Time</th>
                    <th class="border-b border-gray-200">School Year</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">

                <tr class="hover:bg-slate-200">
                    <th class="border-b text-sm border-gray-200">Filipino</th>
                    <th class="border-b text-sm border-gray-200">1st Semester</th>
                    <td class="border-b text-sm border-gray-200">Grade 11</td>
                    <td class="border-b text-sm border-gray-200">Monday</td>
                    <td class="border-b text-sm border-gray-200">7:00 - 8:00</td>
                    <td class="border-b text-sm border-gray-200">2024-05-22 06:44:57</td>

                </tr>
            </tbody>
        </table>
        <?php include '../tables/pagination/pagination.php'; ?>
    </div>
</div>

<?php include '../tables/scripts/paginate.php'; ?>
<script>
    function showModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.showModal();
        }
    }
</script>