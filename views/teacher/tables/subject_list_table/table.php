<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Subject List</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Subject List</p>

    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">Subject</th>
                    <th class="border-b border-gray-200">Semester</th>
                    <th class="border-b border-gray-200">Grade Level</th>
                    <th class="border-b border-gray-200">Day</th>
                    <th class="border-b border-gray-200">Time</th>
                    <th class="border-b border-gray-200">School Year</th>
                </tr>
            </thead>

            <tbody class="bg-gray-50 text-black">
                <?php
                $user_idTeacher = $_SESSION['user_id'];

                if (!empty($studentLists)) {
                    // Create an associative array to store unique subjects
                    $uniqueSubjects = [];

                    // Loop through student lists to filter unique subjects
                    foreach ($studentLists as $studentList) {
                        $subject = $studentList['student_schedule_subject_name'];

                        // Add the subject to the uniqueSubjects array if it doesn't already exist
                        if (!in_array($subject, $uniqueSubjects)) {
                            $uniqueSubjects[] = $subject;
                        }
                    }

                    // Now $uniqueSubjects contains unique subjects across all teacher_id values
                    // You can loop through this array to display the unique subjects
                    foreach ($uniqueSubjects as $subject) {
                        // Output the subject
                        echo "<tr class='hover:bg-slate-200'>";
                        echo "<th class='border-b text-sm border-gray-200'>$subject</th>";
                        // Loop through student lists to find corresponding data for this subject
                        foreach ($studentLists as $studentList) {
                            // Check if the student's subject matches the current subject
                            if ($studentList['student_schedule_subject_name'] === $subject) {
                                // Display relevant data for this subject
                                echo "<th class='border-b text-sm border-gray-200'>{$studentList['semester']}</th>";
                                echo "<td class='border-b text-sm border-gray-200'>{$studentList['grade_level']}</td>";
                                echo "<td class='border-b text-sm border-gray-200'>{$studentList['student_schedule_strand_name']}</td>";
                                echo "<td class='border-b text-sm border-gray-200'>{$studentList['student_schedule_subject_schedule_time']} {$studentList['student_schedule_subject_schedule_day']}</td>";
                                echo "<td class='border-b text-sm border-gray-200'>{$studentList['school_year']}</td>";
                                // Break out of the loop after the first match is found
                                break;
                            }
                        }
                        echo "</tr>";
                    }
                } else {
                    // Output if no students found
                    echo "<tr><td colspan='6' class='border-b text-sm border-gray-200 text-center'>No subjects found</td></tr>";
                }
                ?>

            </tbody>

        </table>
        <?php include '../tables/pagination/pagination.php'; ?>
    </div>
</div>

<?php include '../tables/scripts/paginate_forSubjectList.php'; ?>
<script>
    function showModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.showModal();
        }
    }
</script>