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
                    <th class="border-b border-gray-200">Date Created</th>
                    <th class="border-b border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black">
                <?php if (!empty($users)) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr class="hover:bg-slate-200">
                            <td class="border-b text-sm font-bold border-gray-200"><?php echo $user['id']; ?></td>
                            <td class="border-b text-sm font-semibold border-gray-200"><?php echo $user['user_id']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $user['user_fullname']; ?></td>
                            <td class="border-b text-sm font-semibold border-gray-200"><?php echo $user['user_type']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $user['date_created']; ?></td>
                            <td class="border-b text-sm border-gray-200">
                                <!-- Use data attributes to store user data -->
                                <?php include '../../admin/all_accounts/modal/edit_modal.php'; ?>
                                <?php include '../../admin/all_accounts/modal/delete_modal.php'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="border-b text-sm border-gray-200 text-center">No users found</td>
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