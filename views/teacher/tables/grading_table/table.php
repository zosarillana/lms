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
                    <th class="border-b border-gray-200">Semester</th>
                    <th class="border-b border-gray-200">1st Quarter</th>
                    <th class="border-b border-gray-200">2nd Quarter</th>
                    <th class="border-b border-gray-200">Final</th>
                    <th class="border-b border-gray-200">Date Created</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php
                $teacher_id = $_SESSION['user_id'];
                if (!empty($grades)) :
                    foreach ($grades as $grade) :
                        // Check if the teacher_id matches
                        if ($grade['teacher_id'] == $teacher_id) :
                ?>
                            <tr class="hover:bg-slate-200">
                                <th class="border-b text-sm border-gray-200"><?php echo $grade['student_fname'] . " " . $grade['student_lname'] ?></th>
                                <th class="border-b text-sm border-gray-200"><?php echo $grade['subject_name']; ?></th>
                                <th class="border-b text-sm border-gray-200"><?php echo $grade['semester']; ?></th>
                                <td class="border-b text-sm border-gray-200"><?php echo $grade['1st_quarter']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $grade['2nd_quarter']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $grade['final']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $grade['date_created']; ?></td>
                                <td class="border-b text-sm border-gray-200">
                                    <?php include '../../teacher/grading/modal/edit_modal.php'; ?>
                                    <?php include '../../teacher/grading/modal/delete_modal.php'; ?>
                                </td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                else :
                    ?>
                    <tr>
                        <td colspan="8" class="border-b text-sm border-gray-200 text-center">No grades found</td>
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