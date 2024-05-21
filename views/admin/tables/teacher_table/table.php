<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Teacher</a></li>
        </ul>
    </div>

    <p class="text-lg font-bold mb-5">Teachers</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../../admin/teachers/modal/add_modal.php'; ?>
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
                <?php if (!empty($teachers)) : ?>
                    <?php foreach ($teachers as $teacher) : ?>
                        <tr class="hover:bg-slate-200">
                            <th class="border-b text-sm border-gray-200 "><?php echo $teacher['id']; ?></th>
                            <th class="border-b text-sm border-gray-200"><?php echo $teacher['teacher_id']; ?></th>
                            <td class="border-b text-sm border-gray-200"><?php echo $teacher['teacher_fname'] . " " . $teacher['teacher_lname']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $teacher['teacher_email']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $teacher['teacher_strand']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $teacher['teacher_gender']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $teacher['date_created']; ?></td>
                            <td class="border-b text-sm border-gray-200">

                                <?php include '../../admin/teachers/modal/edit_modal.php'; ?>
                                <?php include '../../admin/teachers/modal/add_subject_students.php'; ?>
                                <?php include '../../admin/teachers/modal/delete_modal.php'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="border-b text-sm border-gray-200 text-center">No teacher found</td>
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