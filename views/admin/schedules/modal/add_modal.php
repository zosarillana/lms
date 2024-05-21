<!-- Button to open modal -->
<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="document.getElementById('my_modal_1').showModal()">Add schedule</button>
<dialog id="my_modal_1" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add schedule.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/schedules/add_schedules.php" method="post">
            <div class="col-span-2">
                <div class="grid grid-cols-4 gap-2 mb-5">
                    <div>
                        <label for="subject_name" class="block mb-2 text-sm font-medium text-gray-50">Subject</label>
                        <?php
                        include '../../../php/db_connect.php';
                        $query = "SELECT id, subject_name FROM subject";
                        $result = $conn->query($query);
                        if ($result) {
                        ?>
                            <select required name="subject" class="select select-bordered w-full max-w-xs">
                                <option disabled selected>Select Subject</option>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . $row['id'] . "," . $row['subject_name'] . "\">" . $row['subject_name'] . "</option>";
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
                        <label for="start_time" class="block mb-2 text-sm font-medium text-gray-50">Start time</label>
                        <input type="time" name="start_time" class="input input-bordered input-md w-full" placeholder="" required step="3600">

                    </div>
                    <div>
                        <label for="end_time" class="block mb-2 text-sm font-medium text-gray-50">End Time</label>
                        <input type="time" name="end_time" class="input input-bordered input-md w-full" placeholder="" required step="3600">

                    </div>
                    <div>
                        <label for="teacher_address" class="block mb-2 text-sm font-medium text-gray-50">Strand</label>
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
                </div>

                <h3 class="font-semibold text-base mb-8">Scheduled day</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Monday</span>
                            <input name="schedule_day[]" value="Monday" type="checkbox" class="checkbox checkbox-sm" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Tuesday</span>
                            <input name="schedule_day[]" value="Tuesday" type="checkbox" class="checkbox checkbox-sm" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Wednesday</span>
                            <input name="schedule_day[]" value="Wednesday" type="checkbox" class="checkbox checkbox-sm" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Thursday</span>
                            <input name="schedule_day[]" value="Thursday" type="checkbox" class="checkbox checkbox-sm" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Friday</span>
                            <input name="schedule_day[]" value="Friday" type="checkbox" class="checkbox checkbox-sm" />

                        </label>
                    </div>
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn bg-green-700 border-none text-gray-200 hover:bg-green-900 px-12">Submit</button>
                </div>
        </form>
        <!-- Form end -->
    </div>


</dialog>