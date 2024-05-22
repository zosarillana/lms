<!-- Button to open modal -->
<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="document.getElementById('my_modal_1').showModal()">Add Grade</button>
<dialog id="my_modal_1" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add grade.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/grading/add_grade.php" method="post">
            <div class="col-span-2">
                <h3 class="font-bold text-lg mb-2">Primary details.</h3>
                <div class="grid grid-cols-1 gap-2 mb-5">
                    <!-- <div>
                        <label for="select_student" class="block mb-2 text-sm font-medium text-gray-50">Select a student with subject:</label>
                        <?php
                        include '../../../php/db_connect.php';
                        $query = "SELECT student_id, student_fname, student_lname FROM student_accounts";
                        $result = $conn->query($query);
                        if ($result) {
                        ?>
                            <select required name="select_student" class="text-gray-50 select select-bordered w-full max-w">
                                <option disabled selected>Select a student</option>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . $row['student_id'] . "," . $row['student_fname'] . "," . $row['student_lname']  . "\">" . $row['student_fname'] . " " . $row['student_lname'] . "</option>";
                                }
                                ?>
                            </select>
                        <?php
                            $result->free();
                        } else {
                            echo "Error executing query: " . $conn->error;
                        }
                        ?> -->
                </div>
                <div>
                    <label for="subject_name" class="block mb-2 text-sm font-medium text-gray-50">Select a student to grade with:</label>
                    <?php
                    include '../../../php/db_connect.php';
                    $teacher_id = $_SESSION['user_id'];
                    $query = "SELECT subject_id, student_id, teacher_id, student_fname, student_lname, student_schedule_subject_name, grade_level, school_year, semester FROM student_with_subjects WHERE teacher_id = '$teacher_id'";
                    $result = $conn->query($query);
                    if ($result) {
                    ?>
                        <select required name="select_subject" class="text-gray-50 select select-bordered w-full max-w">
                            <option disabled selected>Select a student to grade</option>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"" . $row['subject_id'] . "," . $row['student_id'] . "," . $row['teacher_id'] . "," . $row['student_fname'] . "," . $row['student_lname'] . ","
                                    . $row['student_schedule_subject_name'] . "," . $row['grade_level'] . "," . $row['school_year'] .
                                   "," . $row['semester'] . "\">" . $row['student_fname'] . " ". $row['student_lname'] . " | " . $row['student_schedule_subject_name'] ." - " . $row['grade_level'] . " - " .$row['school_year'] . " - " .$row['semester'] . "</option>";
                            }
                            ?>
                        </select>
                    <?php
                        $result->free();
                    } else {
                        echo "Error executing query: " . $conn->error;
                    }
                    ?>
                </div>
                <div class="grid grid-cols-3 gap-2 mt-5 mb-5">
                    <div>
                        <label for="first_quarter" class="block mb-2 text-sm font-medium text-gray-50">First Quarter</label>
                        <input type="text" name="first_quarter" id="first_quarter" class="input input-bordered input-md w-full" placeholder="first quarter grade">
                    </div>
                    <div>
                        <label for="second_quarter" class="block mb-2 text-sm font-medium text-gray-50">Second Quarter</label>
                        <input type="text" name="second_quarter" id="second_quarter" class="input input-bordered input-md w-full" placeholder="second quarter grade">
                    </div>
                    <div>
                        <label for="final" class="block mb-2 text-sm font-medium text-gray-50">Final</label>
                        <input type="text" name="final" id="final" class="input input-bordered input-md w-full" placeholder="final grade">
                    </div>
                </div>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn bg-green-700 border-none text-gray-200 hover:bg-green-900 px-12">Submit</button>
            </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>