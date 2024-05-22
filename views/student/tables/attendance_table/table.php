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
                <?php
                $student_id = $_SESSION['user_id'];
                if (!empty($attendanceList)) :
                    foreach ($attendanceList as $subjectList) :
                        // Check if the teacher_id matches
                        if ($subjectList['student_id'] == $student_id) :
                ?>
                            <tr class="hover:bg-slate-200">                               
                                <th class="border-b text-sm border-gray-200"><?php echo $subjectList['student_fullname']; ?></th>
                                <th class="border-b text-sm border-gray-200"><?php echo $subjectList['percentage']; ?></th>
                                <td class="border-b text-sm border-gray-200"><?php echo $subjectList['month']; ?></td>                                
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