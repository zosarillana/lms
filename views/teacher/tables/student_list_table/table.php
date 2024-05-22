<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Student List</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Student List</p>
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">No.</th>
                    <th class="border-b border-gray-200">ID Number</th>
                    <th class="border-b border-gray-200">Fullname</th>
                    <th class="border-b border-gray-200">Strand</th>
                    <th class="border-b border-gray-200">Grade Level</th>
                    <th class="border-b border-gray-200">School year</th>
                    <th class="border-b border-gray-200">Date Created</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php
                $user_idTeacher = $_SESSION['user_id'];

                if (!empty($studentLists)) {
                    // Create an associative array to store the latest entries for each student
                    $latestEntries = [];

                    // Sort the student lists by 'date_created' or 'id' in descending order
                    usort($studentLists, function ($a, $b) {
                        return strtotime($b['date_created']) - strtotime($a['date_created']); // Change 'date_created' to 'id' if sorting by ID
                    });

                    // Loop through sorted student lists to filter the latest entries
                    foreach ($studentLists as $studentList) {
                        $studentKey = $studentList['student_id'];
                        if ($studentList['teacher_id'] == $user_idTeacher && !isset($latestEntries[$studentKey])) {
                            $latestEntries[$studentKey] = $studentList;
                        }
                    }
                ?>
                    <?php foreach ($latestEntries as $studentList) : ?>
                        <tr class="hover:bg-slate-200">
                            <th class="border-b text-sm border-gray-200"><?php echo $studentList['id']; ?></th>
                            <th class="border-b text-sm border-gray-200"><?php echo $studentList['student_id']; ?></th>
                            <td class="border-b text-sm border-gray-200"><?php echo htmlspecialchars($studentList['student_fname'] . " " . $studentList['student_lname']); ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo htmlspecialchars($studentList['student_schedule_strand_name']); ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo htmlspecialchars($studentList['grade_level']); ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo htmlspecialchars($studentList['school_year']); ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo htmlspecialchars($studentList['date_created']); ?></td>
                            <td class="border-b text-sm border-gray-200">
                                <?php include '../../teacher/student_list/modal/edit_modal.php'; ?>
                                <?php include '../../teacher/student_list/modal/delete_modal.php'; ?>
                                <?php include '../../teacher/student_list/modal/view_modal.php'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="8" class="border-b text-sm border-gray-200 text-center">No students found</td>
                    </tr>
                <?php } ?>

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