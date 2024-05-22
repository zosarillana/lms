<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Grades</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Grades</p>
    <?php include '../../student/grades/modal/print_modal.php'; ?>
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
                  
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php
                $student_id = $_SESSION['user_id'];
                if (!empty($studentGrades)) :
                    foreach ($studentGrades as $studentGrade) :
                        // Check if the teacher_id matches
                        if ($studentGrade['student_id'] == $student_id) :
                ?>
                            <tr class="hover:bg-slate-200">
                                <th class="border-b text-sm border-gray-200"><?php echo $studentGrade['student_fname'] . " " . $studentGrade['student_lname'] ?></th>
                                <th class="border-b text-sm border-gray-200"><?php echo $studentGrade['subject_name']; ?></th>
                                <th class="border-b text-sm border-gray-200"><?php echo $studentGrade['semester']; ?></th>
                                <td class="border-b text-sm border-gray-200"><?php echo $studentGrade['1st_quarter']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $studentGrade['2nd_quarter']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $studentGrade['final']; ?></td>
                                <td class="border-b text-sm border-gray-200"><?php echo $studentGrade['date_created']; ?></td>                                
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