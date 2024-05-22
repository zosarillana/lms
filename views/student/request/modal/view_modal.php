<button class="btn btn-sm bg-gray-600 border-none text-gray-50 hover:bg-gray-700" onclick="showModal('my_modal_3<?php echo $subjectList['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
    </svg>

</button>
<dialog id="my_modal_3<?php echo $subjectList['id']; ?>" class="modal">

    <div class=" modal-box w-11/12 max-w-5xl text-gray-50">
        <form method="post">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="document.getElementById('my_modal_<?php echo $subjectList['student_id']; ?>').close()">✕</button>
        </form>
        <h3 class="font-bold text text-lg mb-5">Edit profile</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/student_list/edit_student_list.php" method="post">
            <h3 class="font-bold text-lg mb-8">Primary details.</h3>
            <div class="grid grid-cols-3 gap-2 mb-3">
                <div>
                    <input hidden type="text" value="<?php echo $subjectList['id']; ?>" name="id" placeholder="Type id number here" class="input input-bordered w-full max-w mb-5" />
                    <label for="student_id" class="block mb-2 text-sm font-medium text-gray-50">Student fullname</label>
                    <input readonly type="text" name="student_id" value="<?php echo $subjectList['student_fullname']; ?>" id="student_id" class="input input-bordered input-md w-full" placeholder="Student id" readonly>
                </div>
                <div>
                    <label for="student_fname" class="block mb-2 text-sm font-medium text-gray-50">Request</label>
                    <input type="text" name="student_fname" value="<?php echo $subjectList['request']; ?>" id="student_fname" class="input input-bordered input-md w-full" placeholder="First name" readonly>
                </div>
                <div>
                    <label for="student_mname" class="block mb-2 text-sm font-medium text-gray-50">Status</label>
                    <input type="text" name="student_mname" value="<?php echo $subjectList['status']; ?>" id="student_mname" class="input input-bordered input-md w-full" placeholder="Middle name" readonly>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-2 mb-5">
                <div>
                    <label for="first_quarter" class="block mb-2 text-sm font-medium text-gray-50">Message</label>
                    <textarea name="message" class="textarea textarea-bordered w-full max-w" placeholder="reason for request" readonly> <?php echo $subjectList['message']; ?> </textarea>
                </div>
            </div>
    </div>
</dialog>