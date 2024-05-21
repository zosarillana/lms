<button class="btn btn-sm bg-blue-600 border-none text-gray-50 hover:bg-blue-700" onclick="showModal('my_modal_<?php echo $student['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
    </svg>
</button>
<dialog id="my_modal_<?php echo $student['id']; ?>" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl text-gray-50">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="document.getElementById('my_modal_<?php echo $student['id']; ?>').close()">✕</button>
        </form>
        <h3 class="font-bold text text-lg mb-5">Edit profile</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/students/edit_students.php" method="post">

            <h3 class="font-bold text-lg mb-8">Primary details.</h3>
            <div class="grid grid-cols-4 gap-2 mb-5">
                <div>
                    <input hidden type="text" value="<?php echo $student['id']; ?>" name="id" placeholder="Type id number here" class="input input-bordered w-full max-w mb-5" />
                    <label for="student_id" class="block mb-2 text-sm font-medium text-gray-50">Student ID</label>
                    <input readonly type="text" name="student_id" value="<?php echo $student['student_id']; ?>" id="student_id" class="input input-bordered input-md w-full" placeholder="Student id" required="">
                </div>
                <div>
                    <label for="student_fname" class="block mb-2 text-sm font-medium text-gray-50">First name</label>
                    <input type="text" name="student_fname" value="<?php echo $student['student_fname']; ?>" id="student_fname" class="input input-bordered input-md w-full" placeholder="First name" required="">
                </div>
                <div>
                    <label for="student_mname" class="block mb-2 text-sm font-medium text-gray-50">Middle name (Optional)</label>
                    <input type="text" name="student_mname" value="<?php echo $student['student_mname']; ?>" id="student_mname" class="input input-bordered input-md w-full" placeholder="First name" required="">
                </div>
                <div>
                    <label for="student_lname" class="block mb-2 text-sm font-medium text-gray-50">Last name</label>
                    <input type="text" name="student_lname" value="<?php echo $student['student_lname']; ?>" id="student_lname" class="input input-bordered input-md w-full" placeholder="Last name" required="">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 mb-5">
                <div>
                    <label for="student_gender" class="block mb-2 text-sm font-medium text-gray-50">Student Gender</label>
                    <input type="text" name="student_gender" value="<?php echo $student['student_gender']; ?>" id="student_gender" class="input input-bordered input-md w-full" placeholder="Gender" required="">
                </div>
                <div>
                    <label for="student_birthdate" class="block mb-2 text-sm font-medium text-gray-50">Student Birthdate</label>
                    <input type="date" name="student_birthdate" value="<?php echo $student['student_birthdate']; ?>" id="datetimepicker" placeholder="Select Birthday" class="input input-bordered w-full max-w">
                </div>
                <div>
                    <label for="student_address" class="block mb-2 text-sm font-medium text-gray-50">Student Address</label>
                    <input type="text" name="student_address" id="student_address" value="<?php echo $student['student_address']; ?>" class="input input-bordered input-md w-full" placeholder="Address" required="">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 mb-5">
                <div>
                    <label for="student_email" class="block mb-2 text-sm font-medium text-gray-50">Student Email</label>
                    <input type="email" name="student_email" id="student_email" value="<?php echo $student['student_email']; ?>" class="input input-bordered input-md w-full" placeholder="Email" required="">
                </div>
                <div>
                    <label for="student_strand" class="block mb-2 text-sm font-medium text-gray-50">Student Strand</label>
                    <?php
                    include '../../../php/db_connect.php';
                    $query = "SELECT id, strand_name FROM strand";
                    $result = $conn->query($query);
                    if ($result) {
                    ?>
                        <select required value="<?php echo $student['strand_id'] . ',' . $student['student_strand']; ?>" name="strand" class="select select-bordered w-full max-w-xs">
                            <option selected value="<?php echo $student['strand_id'] . ',' . $student['student_strand']; ?>"><?php echo $student['student_strand']; ?></option>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"" . $row['id'] . "," . $row['strand_name'] . "\">" . $row['strand_name'] . "</option>";
                            }
                            ?>
                        </select>
                    <?php
                        $result->free();
                    } else {
                        echo "Error executing query: " . $mysqli->error;
                    }
                    $conn->close();
                    ?>
                </div>
                <div>
                    <label for="student_gradelevel" class="block mb-2 text-sm font-medium text-gray-50">Grade Level</label>
                    <select name="student_gradelevel" value="<?php echo $student['student_gradelevel']; ?>" class="select select-bordered w-full max-w-xs">
                        <option readonly selected value="<?php echo $student['student_gradelevel']; ?>"><?php echo $student['student_gradelevel']; ?></option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                    </select>
                </div>
            </div>
            <h3 class="font-bold text-lg mb-8">Secondary details.</h3>
            <div class="grid grid-cols-4 gap-2 mb-5">
                <div>
                    <label for="student_guardian" class="block mb-2 text-sm font-medium text-gray-50">Guardian name</label>
                    <input type="text" value="<?php echo $student['student_guardian']; ?>" name="student_guardian" id="student_guardian" class="input input-bordered input-md w-full" placeholder="Name" required="">
                </div>
                <div>
                    <label for="student_guardian_contact" class="block mb-2 text-sm font-medium text-gray-50">Guardian Contact</label>
                    <input type="text" value="<?php echo $student['student_guardian_contact']; ?>" name="student_guardian_contact" id="student_guardian_contact" class="input input-bordered input-md w-full" placeholder="Contact" required="">
                </div>
                <div>
                    <label for="student_guardian_address" class="block mb-2 text-sm font-medium text-gray-50">Guardian Address</label>
                    <input type="text" value="<?php echo $student['student_guardian_address']; ?>" name="student_guardian_address" id="student_guardian_address" class="input input-bordered input-md w-full" placeholder="Address" required="">
                </div>
                <div>
                    <label for="student_guardian_work" class="block mb-2 text-sm font-medium text-gray-50">Guardian Occupation</label>
                    <input type="text" value="<?php echo $student['student_guardian_work']; ?>" name="student_guardian_work" id="student_guardian_work" class="input input-bordered input-md w-full" placeholder="Occupation" required="">
                </div>
            </div>
            <div class="grid grid-cols-4 gap-2 mb-5">
                <div>
                    <label for="student_2ndguardian" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian name</label>
                    <input type="text" value="<?php echo $student['student_2ndguardian']; ?> " name="student_2ndguardian" id="student_2ndguardian" class="input input-bordered input-md w-full" placeholder="Name" required="">
                </div>
                <div>
                    <label for="student_2ndguardian_contact" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian Contact</label>
                    <input type="text" value="<?php echo $student['student_2ndguardian_contact']; ?>" name=" student_2ndguardian_contact" id="student_2ndguardian_contact" class="input input-bordered input-md w-full" placeholder="Contact" required="">
                </div>
                <div>
                    <label for="student_2ndguardian_address" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian Address</label>
                    <input type="text" value="<?php echo $student['student_2ndguardian_address']; ?> " name=" student_2ndguardian_address" id="student_2ndguardian_address" class="input input-bordered input-md w-full" placeholder="Address" required="">
                </div>
                <div>
                    <label for="student_2ndguardian_work" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian Occupation</label>
                    <input type="text" value="<?php echo $student['student_2ndguardian_work']; ?>" name=" student_2ndguardian_work" id="student_2ndguardian_work" class="input input-bordered input-md w-full" placeholder="Occupation" required="">
                </div>
            </div>
            <h3 class="font-bold text-lg mb-8">Login details.</h3>
            <div class="grid grid-cols-3 gap-2 mb-5">
                <div>
                    <label for="student_username" class="block mb-2 text-sm font-medium text-gray-50">Student Username</label>
                    <input type="text" value="<?php echo $student['student_username']; ?>" name="student_username" id="student_username" class="input input-bordered input-md w-full" placeholder="Username" required="">
                </div>
                <div>
                    <label for="student_password" class="block mb-2 text-sm font-medium text-gray-50">Student Password</label>
                    <input type="password" name="student_password" id="student_password" class="input text-gray-50  input-bordered input-md w-full" placeholder="Password">
                    <small class="text-gray-50">Leave blank to keep current password</small>

                </div>
            </div>

            <!-- Modal action buttons -->
            <div class="modal-action">
                <button type="submit" class="btn btn-secondary text-gray-50 border-none hover:bg-indigo-600 px-12">Update</button>
            </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>