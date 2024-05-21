<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Students</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Students</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../../admin/students/modal/add_modal.php'; ?>
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>

                    <th class="border-b border-gray-200">No.</th>
                    <th class="border-b border-gray-200">ID Number</th>
                    <th class="border-b border-gray-200">Fullname</th>
                    <th class="border-b border-gray-200">Email</th>
                    <th class="border-b border-gray-200">Strand</th>
                    <th class="border-b border-gray-200">Gender</th>
                    <th class="border-b border-gray-200">Date Created</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php if (!empty($students)) : ?>
                    <?php foreach ($students as $student) : ?>
                        <tr class="hover:bg-slate-200">
                            <th class="border-b text-sm border-gray-200"><?php echo $student['id']; ?></th>
                            <th class="border-b text-sm border-gray-200"><?php echo $student['student_id']; ?></th>
                            <td class="border-b text-sm border-gray-200"><?php echo $student['student_fname'] . " " .  $student['student_lname']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $student['student_email']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $student['student_strand']; ?></td>
                            <td class=" border-b text-sm border-gray-200"><?php echo $student['student_gender']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $student['date_created']; ?></td>
                            <td class="border-b text-sm border-gray-200">
                                <!-- Use data attributes to store user data -->
                                <?php include '../../admin/students/modal/edit_modal.php'; ?>
                                <?php include '../../admin/students/modal/delete_modal.php'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="border-b text-sm border-gray-200 text-center">No students found</td>
                    </tr>
                <?php endif; ?>
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