<!-- Button to open modal -->
<button class="btn btn-sm bg-blue-600 border-none text-gray-50 hover:bg-blue-700" onclick="showModal('my_modal_2<?php echo $teacher['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
    </svg>
</button>
<dialog id="my_modal_2<?php echo $teacher['id']; ?>" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle text-gray-50 btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-gray-50 text-lg mb-8">Add teacher.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/teacher/edit_teacher.php" method="post">
            <input type="hidden" name="id" value="<?php echo $teacher['id']; ?>">
            <div class="col-span-2">
                <h3 class="font-bold text-gray-50 text-lg mb-8">Primary details.</h3>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="teacher_id" class="block mb-2 text-sm font-medium text-gray-50">Teacher Id</label>
                        <input type="numeric" readonly value="<?php echo $teacher['teacher_id']; ?>" name="teacher_id" id="teacher_id" class="text-gray-50 input input-bordered input-md w-full" placeholder="Teacher id" required="">
                    </div>
                    <div>
                        <label for="teacher_fname" class="block mb-2 text-sm font-medium text-gray-50">First name</label>
                        <input type="text" name="teacher_fname" value="<?php echo $teacher['teacher_fname']; ?>" id="teacher_fname" class="input  text-gray-50 input-bordered input-md w-full" placeholder="First name" required="">
                    </div>
                    <div>
                        <label for="teacher_mname" class="block mb-2 text-sm font-medium text-gray-50">Middle name (Optional)</label>
                        <input type="text" name="teacher_mname" id="teacher_mname" value="<?php echo $teacher['teacher_mname']; ?>" class="input  text-gray-50 input-bordered input-md w-full" placeholder="Middle name">
                    </div>
                    <div>
                        <label for="teacher_lname" class="block mb-2 text-sm font-medium text-gray-50">Last name</label>
                        <input type="text" value="<?php echo $teacher['teacher_lname']; ?>" name="teacher_lname" id="teacher_lname" class="input text-gray-50  input-bordered input-md w-full" placeholder="Last name" required="">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="teacher_gender" class="block mb-2 text-sm font-medium text-gray-50">Teacher Gender</label>
                        <input type="text" value="<?php echo $teacher['teacher_gender']; ?>" name="teacher_gender" id="teacher_gender" class="input text-gray-50 input-bordered input-md w-full" placeholder="Gender" required="">
                    </div>
                    <div>
                        <label for="teacher_birthdate" class="block mb-2 text-sm font-medium text-gray-50">Teacher Birthdate</label>
                        <input type="date" name="teacher_birthdate" value="<?php echo $teacher['teacher_birthdate']; ?>" id="datetimepicker" placeholder="Select Birthday" class="input  text-gray-50 input-bordered w-full max-w">
                    </div>
                    <div>
                        <label for="teacher_address" class="block mb-2 text-sm font-medium text-gray-50">Teacher Address</label>
                        <input type="text" name="teacher_address" value="<?php echo $teacher['teacher_address']; ?>" id="teacher_address" class="input  text-gray-50 input-bordered input-md w-full" placeholder="Address" required="">
                    </div>
                    <div>
                        <label for="teacher_email" class="block mb-2 text-sm font-medium text-gray-50">Teacher Email</label>
                        <input type="email" name="teacher_email" value="<?php echo $teacher['teacher_email']; ?>" id="teacher_email" class="input text-gray-50  input-bordered input-md w-full" placeholder="Email" required="">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="teacher_strand" class="block mb-2 text-sm font-medium text-gray-50">Teacher Strand</label>
                        <?php
                        include '../../../php/db_connect.php';
                        $query = "SELECT id, strand_name FROM strand";
                        $result = $conn->query($query);
                        if ($result) {
                        ?>
                            <select required value="<?php echo $teacher['teacher_strand_id'] . ',' . $teacher['teacher_strand']; ?>" name="strand" class="text-gray-50 select select-bordered w-full max-w-xs">
                                <option selected value="<?php echo $teacher['teacher_strand_id'] . ',' . $teacher['teacher_strand']; ?>"><?php echo $teacher['teacher_strand']; ?></option>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . $row['id'] . "," . $row['strand_name'] . "\">" . $row['strand_name'] . "</option>";
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
                <h3 class="font-bold text-gray-50 text-lg mb-8">Login details.</h3>
                <div class="grid grid-cols-3 gap-2 mb-5">
                    <div>
                        <label for="teacher_username" class="block mb-2 text-sm font-medium text-gray-50">Username</label>
                        <input type="text" name="teacher_username" value="<?php echo $teacher['teacher_username']; ?>" id="teacher_username" class="input text-gray-50  input-bordered input-md w-full" placeholder="Username" required="">
                    </div>
                    <div>
                        <label for="teacher_password" class="block mb-2 text-sm font-medium text-gray-50">Password</label>
                        <input type="password" name="teacher_password" id="teacher_password" class="input text-gray-50  input-bordered input-md w-full" placeholder="Password">
                        <small class="text-gray-50">Leave blank to keep current password</small>
                    </div>
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn text-gray-50 btn-primary">Update Teacher</button>
                </div>
            </div>
        </form>

    </div>
</dialog>