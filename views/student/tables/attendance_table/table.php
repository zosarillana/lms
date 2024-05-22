<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Attendance</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Attendance</p>

    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">Student Name</th>
                    <th class="border-b border-gray-200">Percentage</th>
                    <th class="border-b border-gray-200">Month</th>

                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">

                <tr class="hover:bg-slate-200">
                    <th class="border-b text-sm border-gray-200">thorfin karlsefni</th>
                    <th class="border-b text-sm border-gray-200">85%</th>
                    <td class="border-b text-sm border-gray-200">July</td>
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