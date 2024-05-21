<!-- Button to open modal -->
<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="document.getElementById('my_modal_1').showModal()">Add Teacher</button>
<dialog id="my_modal_1" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add teacher.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/teacher/add_teacher.php" method="post">
            <div class="col-span-2">
                <h3 class="font-bold text-lg mb-8">Primary details.</h3>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="teacher_id" class="block mb-2 text-sm font-medium text-gray-50">Teacher Id</label>
                        <input type="numeric" name="teacher_id" id="teacher_id" class="input input-bordered input-md w-full" placeholder="Teacher id" required="">
                    </div>
                    <div>
                        <label for="teacher_fname" class="block mb-2 text-sm font-medium text-gray-50">First name</label>
                        <input type="text" name="teacher_fname" id="teacher_fname" class="input input-bordered input-md w-full" placeholder="First name" required="">
                    </div>
                    <div>
                        <label for="teacher_mname" class="block mb-2 text-sm font-medium text-gray-50">Middle name (Optional)</label>
                        <input type="text" name="teacher_mname" id="teacher_mname" class="input input-bordered input-md w-full" placeholder="Middle name" required="">
                    </div>
                    <div>
                        <label for="teacher_lname" class="block mb-2 text-sm font-medium text-gray-50">Last name</label>
                        <input type="text" name="teacher_lname" id="teacher_lname" class="input input-bordered input-md w-full" placeholder="Last name" required="">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="teacher_gender" class="block mb-2 text-sm font-medium text-gray-50">Teacher Gender</label>
                        <input type="text" name="teacher_gender" id="teacher_gender" class="input input-bordered input-md w-full" placeholder="Gender" required="">
                    </div>
                    <div>
                        <label for="teacher_birthdate" class="block mb-2 text-sm font-medium text-gray-50">Teacher Birthdate</label>
                        <input type="date" name="teacher_birthdate" id="datetimepicker" placeholder="Select Birthday" class="input input-bordered w-full max-w">

                    </div>
                    <div>
                        <label for="teacher_address" class="block mb-2 text-sm font-medium text-gray-50">Teacher Address</label>
                        <input type="text" name="teacher_address" id="teacher_address" class="input input-bordered input-md w-full" placeholder="Address" required="">
                    </div>
                    <div>
                        <label for="teacher_email" class="block mb-2 text-sm font-medium text-gray-50">Teacher Email</label>
                        <input type="email" name="teacher_email" id="teacher_email" class="input input-bordered input-md w-full" placeholder="Email" required="">
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
                            <select required name="teacher_strand" class="select select-bordered w-full max-w-xs">
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
                </div>
                <h3 class="font-bold text-lg mb-8">Login details.</h3>
                <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>
                        <label for="teacher_username" class="block mb-2 text-sm font-medium text-gray-50">Teacher Username</label>
                        <input type="text" name="teacher_username" id="teacher_username" class="input input-bordered input-md w-full" placeholder="Username" required="">
                    </div>
                    <div>
                        <label for="teacher_password" class="block mb-2 text-sm font-medium text-gray-50">Teacher Password</label>
                        <input type="password" name="teacher_password" id="teacher_password" class="input input-bordered input-md w-full" placeholder="Password" required="">
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