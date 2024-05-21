<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Courses</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Courses</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../../admin/courses/modal/add_modal.php'; ?>
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">Course Number</th>
                    <th class="border-b border-gray-200">Course Name</th>
                    <th class="border-b border-gray-200">Date Created</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php if (!empty($strands)) : ?>
                    <?php foreach ($strands as $strand) : ?>
                        <tr class="hover:bg-slate-200">
                            <th class="border-b text-sm border-gray-200"><?php echo $strand['id']; ?></th>
                            <td class="border-b text-sm font-semibold border-gray-200"><?php echo $strand['strand_name']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $strand['date_created']; ?></td>
                            <td class="border-b text-sm border-gray-200">
                                <!-- Use data attributes to store user data -->
                                <?php include '../../admin/courses/modal/edit_modal.php'; ?>
                                <?php include '../../admin/courses/modal/delete_modal.php'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="border-b text-sm border-gray-200 text-center">No strands found</td>
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