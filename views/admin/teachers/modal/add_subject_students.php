<?php
// Button to open modal
?>
<button class="btn btn-sm bg-green-600 border-none text-gray-50 hover:bg-green-700" onclick="showModal('my_modal_3<?php echo $teacher['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>
</button>

<dialog id="my_modal_3<?php echo $teacher['id']; ?>" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-gray-50 text-lg mb-8">Assign student.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/teacher/add_subject_students.php" method="post">
            <input type="hidden" name="id" value="<?php echo $teacher['id']; ?>">
            <h3 class="font-bold text-gray-50 text-lg mb-8">Teacher details.</h3>
            <div class="grid grid-cols-4 gap-2 mb-5">
                <div>
                    <label for="teacher_id" class="block mb-2 text-sm font-medium text-gray-50">Teacher Id</label>
                    <input type="numeric" readonly value="<?php echo $teacher['teacher_id']; ?>" name="teacher_id" id="teacher_id" class="text-gray-50 input input-bordered input-md w-full" placeholder="Teacher id" required="">
                </div>
                <div>
                    <label for="teacher_fname" class="block mb-2 text-sm font-medium text-gray-50">First name</label>
                    <input type="text" readonly name="teacher_fname" value="<?php echo $teacher['teacher_fname']; ?>" id="teacher_fname" class="input  text-gray-50 input-bordered input-md w-full" placeholder="First name" required="">
                </div>
                <div>
                    <label for="teacher_lname" class="block mb-2 text-sm font-medium text-gray-50">Last name</label>
                    <input type="text" readonly value="<?php echo $teacher['teacher_lname']; ?>" name="teacher_lname" id="teacher_lname" class="input text-gray-50  input-bordered input-md w-full" placeholder="Last name" required="">
                </div>
                <div>
                    <label for="teacher_strand" class="block mb-2 text-sm font-medium text-gray-50">Teacher strand</label>
                    <input type="text" readonly value="<?php echo $teacher['teacher_strand']; ?>" name="teacher_strand" id="teacher_lname" class="input text-gray-50  input-bordered input-md w-full" placeholder="Last name" required="">
                </div>
            </div>
            <h3 class="font-bold text-gray-50 text-lg mb-8">Select student.</h3>
            <div class="grid grid-cols-4 gap-2 mb-5">
                <div>
                    <div>
                        <label for="select_student" class="block mb-2 text-sm font-medium text-gray-50">Select student</label>
                        <?php
                        include '../../../php/db_connect.php';
                        $query = "SELECT student_id, student_fname, student_lname FROM student_accounts";
                        $result = $conn->query($query);
                        if ($result) {
                        ?>
                            <select required name="select_student" class="text-gray-50 select select-bordered w-full max-w-xs">
                                <option disabled selected>Select a student</option>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . $row['student_id'] . "," . $row['student_fname'] . "," . $row['student_lname'] . "\">" . $row['student_fname'] . " " . $row['student_lname'] . "</option>";
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
                </div>
                <div>
                    <label for="select_strand" class="block mb-2 text-sm font-medium text-gray-50">Select strand</label>
                    <?php
                    // Close the first connection and re-establish it for the second query
                    $conn->close();
                    include '../../../php/db_connect.php';

                    $teacher_strand = $conn->real_escape_string($teacher['teacher_strand']);
                    $query = "SELECT subject_id, strand_id, schedule_subject_name, schedule_strand_name, schedule_time, schedule_day FROM schedules WHERE schedule_strand_name = '$teacher_strand'";
                    $result = $conn->query($query);
                    if ($result) {
                    ?>
                        <select required name="select_strand" class="text-gray-50 select select-bordered w-full max-w-xs">
                            <option selected disabled>Select strand</option>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"" . $row['subject_id'] . "," . $row['strand_id'] . ","
                                    . $row['schedule_subject_name'] .  "," . $row['schedule_day'] .  "," . $row['schedule_time'] .
                                    "," . $row['schedule_strand_name'] . "\">" . $row['schedule_subject_name'] . " " . $row['schedule_time'] . " "
                                    . $row['schedule_day'] . " " .  $row['schedule_strand_name'] .
                                    "</option>";
                            }
                            ?>
                        </select>
                    <?php
                        $result->free();
                    } else {
                        echo "Error executing query: " . $conn->error;
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn text-gray-50 btn-primary">Add subject to students</button>
            </div>
    </div>
    </form>
    </div>
</dialog>