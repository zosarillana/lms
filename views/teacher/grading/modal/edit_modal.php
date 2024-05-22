<button class="btn btn-sm bg-blue-600 border-none text-gray-50 hover:bg-blue-700" onclick="showModal('my_modal_2<?php echo $grade['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
    </svg>
</button>
<dialog id="my_modal_2<?php echo $grade['id']; ?>" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl text-gray-50">
        <form method="post">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="document.getElementById('my_modal_<?php echo $student['student_id']; ?>').close()">✕</button>
        </form>
        <h3 class="font-bold text text-lg mb-5">Edit grade</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/grading/edit_grade.php" method="post">
            <h3 class="font-bold text-lg mb-8">Primary details.</h3>
            <div class="grid grid-cols-4 gap-2 mt-5 mb-5">
                    <div>
                        <label for="student_name" class="block mb-2 text-sm font-medium text-gray-50">Student fullname</label>
                        <input readonly type="text" value="<?php echo $grade['student_fname'] . " " . $grade['student_lname']; ?>" name="student_name" id="student_name" class="input input-bordered input-md w-full" placeholder="first quarter grade">
                        <input hidden type="text" value="<?php echo $grade['id'] ?>" name="id" id="id" class="input input-bordered input-md w-full" placeholder="first quarter grade">
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-50">Subject</label>
                        <input readonly type="text" value="<?php echo $grade['subject_name']; ?>" name="subject" id="subject" class="input input-bordered input-md w-full" placeholder="second quarter grade">
                    </div>
                    <div>
                        <label for="semester" class="block mb-2 text-sm font-medium text-gray-50">Semester</label>
                        <input readonly type="text" value="<?php echo $grade['semester']; ?>" name="semester" id="semester" class="input input-bordered input-md w-full" placeholder="second quarter grade">
                    </div>
                    <div>
                        <label for="grade_level" class="block mb-2 text-sm font-medium text-gray-50">Grade Level</label>
                        <input readonly type="text" value="<?php echo $grade['grade_level']; ?>" name="grade_level" id="grade_level" class="input input-bordered input-md w-full" placeholder="final grade">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2 mt-5 mb-5">
                    <div>
                        <label for="first_quarter" class="block mb-2 text-sm font-medium text-gray-50">First Quarter</label>
                        <input type="text" value="<?php echo $grade['1st_quarter']; ?>" name="first_quarter" id="first_quarter" class="input input-bordered input-md w-full" placeholder="first quarter grade">
                    </div>
                    <div>
                        <label for="second_quarter" class="block mb-2 text-sm font-medium text-gray-50">Second Quarter</label>
                        <input type="text" value="<?php echo $grade['2nd_quarter']; ?>" name="second_quarter" id="second_quarter" class="input input-bordered input-md w-full" placeholder="second quarter grade">
                    </div>
                    <div>
                        <label for="final" class="block mb-2 text-sm font-medium text-gray-50">Final</label>
                        <input type="text" value="<?php echo $grade['final']; ?>" name="final" id="final" class="input input-bordered input-md w-full" placeholder="final grade">
                    </div>
                </div>
            <div class="modal-action">
                <button type="submit" class="btn btn-secondary text-gray-50 border-none hover:bg-indigo-600 px-12">Update</button>
            </div>
        </form>
        <!-- Form end -->

    </div>
</dialog>