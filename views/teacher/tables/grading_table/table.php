<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Grading</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Grading</p>
    <?php include '../../teacher/grading/modal/add_modal.php'; ?>
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">Fullname</th>
                    <th class="border-b border-gray-200">Subject</th>
                    <th class="border-b border-gray-200">1st Quarter</th>
                    <th class="border-b border-gray-200">2nd Quarter</th>
                    <th class="border-b border-gray-200">Finals</th>
                    <th class="border-b border-gray-200">Date Created</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">

                <tr class="hover:bg-slate-200">
                    <th class="border-b text-sm border-gray-200">thorfin karlsefni</th>
                    <th class="border-b text-sm border-gray-200">Filipino</th>
                    <td class="border-b text-sm border-gray-200">80</td>
                    <td class="border-b text-sm border-gray-200">80</td>
                    <td class="border-b text-sm border-gray-200">80</td>
                    <td class="border-b text-sm border-gray-200">2024-05-22 06:44:57</td>
                    <td class="border-b text-sm border-gray-200">
                        <?php include '../../teacher/student_list/modal/edit_modal.php'; ?>
                        <?php include '../../admin/students/modal/delete_modal.php'; ?>
                    </td>
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