<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Credentials</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-10">Credentials</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../../student/request/modal/add_modal.php'; ?>
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">No.</th>
                    <th class="border-b border-gray-200">Student Name.</th>
                    <th class="border-b border-gray-200">Type of Credential</th>
                    <th class="border-b border-gray-200">Message</th>
                    <th class="border-b border-gray-200">Status</th>
                    <th class="border-b border-gray-200">Date submitted</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php
                $student_id = $_SESSION['user_id'];
                if (!empty($credentialList)) :
                    foreach ($credentialList as $subjectList) :
                        // Check if the teacher_id matches
                        if ($subjectList['student_id'] == $student_id) :
                ?>
                            <tr class="hover:bg-slate-200">

                                <th class="border-b text-sm border-gray-200"><?php echo $subjectList['id']; ?></th>
                                <th class="border-b text-sm border-gray-200"><?php echo $subjectList['student_fullname']; ?></th>
                                <td class="border-b text-sm border-gray-200"><?php echo $subjectList['request']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $subjectList['message']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $subjectList['status']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $subjectList['date_created']; ?></td>
                                <td class="border-b text-sm border-gray-200">
                                    <?php include '../../student/request/modal/view_modal.php'; ?>
                                </td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                else :
                    ?>
                    <tr>
                        <td colspan="8" class="border-b text-sm border-gray-200 text-center">No Credentials found</td>
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