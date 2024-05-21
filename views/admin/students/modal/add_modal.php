<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="my_modal_1.showModal()">Add students</button>
<dialog id="my_modal_1" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add students.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/students/add_students.php" method="POST">
            <div class="col-span-2">
                <h3 class="font-bold text-lg mb-8">Primary details.</h3>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="student_id" class="block mb-2 text-sm font-medium text-gray-50">Student ID</label>
                        <input type="text" name="student_id" id="student_id" class="input input-bordered input-md w-full" placeholder="Student id" required="">
                    </div>
                    <div>
                        <label for="student_fname" class="block mb-2 text-sm font-medium text-gray-50">First name</label>
                        <input type="text" name="student_fname" id="student_fname" class="input input-bordered input-md w-full" placeholder="First name" required="">
                    </div>
                    <div>
                        <label for="student_mname" class="block mb-2 text-sm font-medium text-gray-50">Middle name (Optional)</label>
                        <input type="text" name="student_mname" id="student_mname" class="input input-bordered input-md w-full" placeholder="First name" required="">
                    </div>
                    <div>
                        <label for="student_lname" class="block mb-2 text-sm font-medium text-gray-50">Last name</label>
                        <input type="text" name="student_lname" id="student_lname" class="input input-bordered input-md w-full" placeholder="Last name" required="">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 mb-5">
                    <div>
                        <label for="student_gender" class="block mb-2 text-sm font-medium text-gray-50">Student Gender</label>
                        <input type="text" name="student_gender" id="student_gender" class="input input-bordered input-md w-full" placeholder="Gender" required="">
                    </div>
                    <div>
                        <label for="student_birthdate" class="block mb-2 text-sm font-medium text-gray-50">Student Birthdate</label>
                        <input type="date" name="student_birthdate" id="datetimepicker" placeholder="Select Birthday" class="input input-bordered w-full max-w">
                    </div>
                    <div>
                        <label for="student_address" class="block mb-2 text-sm font-medium text-gray-50">Student Address</label>
                        <input type="text" name="student_address" id="student_address" class="input input-bordered input-md w-full" placeholder="Address" required="">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 mb-5">
                    <div>
                        <label for="student_email" class="block mb-2 text-sm font-medium text-gray-50">Student Email</label>
                        <input type="email" name="student_email" id="student_email" class="input input-bordered input-md w-full" placeholder="Email" required="">
                    </div>
                    <div>
                        <label for="student_strand" class="block mb-2 text-sm font-medium text-gray-50">Student Strand</label>
                        <?php
                        include '../../../php/db_connect.php';
                        $query = "SELECT id, strand_name FROM strand";
                        $result = $conn->query($query);
                        if ($result) {
                        ?>
                            <select required name="strand" class="select select-bordered w-full max-w-xs">
                                <option disabled selected>Select Strand</option>
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
                        <select name="student_gradelevel" class="select select-bordered w-full max-w-xs">
                            <option disabled selected>Grade Level</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                </div>
                <h3 class="font-bold text-lg mb-8">Secondary details.</h3>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="student_guardian" class="block mb-2 text-sm font-medium text-gray-50">Guardian name</label>
                        <input type="text" name="student_guardian" id="student_guardian" class="input input-bordered input-md w-full" placeholder="Name" required="">
                    </div>
                    <div>
                        <label for="student_guardian_contact" class="block mb-2 text-sm font-medium text-gray-50">Guardian Contact</label>
                        <input type="text" name="student_guardian_contact" id="student_guardian_contact" class="input input-bordered input-md w-full" placeholder="Contact" required="">
                    </div>
                    <div>
                        <label for="student_guardian_address" class="block mb-2 text-sm font-medium text-gray-50">Guardian Address</label>
                        <input type="text" name="student_guardian_address" id="student_guardian_address" class="input input-bordered input-md w-full" placeholder="Address" required="">
                    </div>
                    <div>
                        <label for="student_guardian_work" class="block mb-2 text-sm font-medium text-gray-50">Guardian Occupation</label>
                        <input type="text" name="student_guardian_work" id="student_guardian_work" class="input input-bordered input-md w-full" placeholder="Occupation" required="">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="student_2ndguardian" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian name</label>
                        <input type="text" name="student_2ndguardian" id="student_2ndguardian" class="input input-bordered input-md w-full" placeholder="Name" required="">
                    </div>
                    <div>
                        <label for="student_2ndguardian_contact" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian Contact</label>
                        <input type="text" name="student_2ndguardian_contact" id="student_2ndguardian_contact" class="input input-bordered input-md w-full" placeholder="Contact" required="">
                    </div>
                    <div>
                        <label for="student_2ndguardian_address" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian Address</label>
                        <input type="text" name="student_2ndguardian_address" id="student_2ndguardian_address" class="input input-bordered input-md w-full" placeholder="Address" required="">
                    </div>
                    <div>
                        <label for="student_2ndguardian_work" class="block mb-2 text-sm font-medium text-gray-50">2nd Guardian Occupation</label>
                        <input type="text" name="student_2ndguardian_work" id="student_2ndguardian_work" class="input input-bordered input-md w-full" placeholder="Occupation" required="">
                    </div>
                </div>
                <h3 class="font-bold text-lg mb-8">Login details.</h3>
                <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>
                        <label for="student_username" class="block mb-2 text-sm font-medium text-gray-50">Student Username</label>
                        <input type="text" name="student_username" id="student_username" class="input input-bordered input-md w-full" placeholder="Username" required="">
                    </div>
                    <div>
                        <label for="student_password" class="block mb-2 text-sm font-medium text-gray-50">Student Password</label>
                        <input type="password" name="student_password" id="student_password" class="input input-bordered input-md w-full" placeholder="Password" required="">
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