<button class="btn btn-sm bg-blue-600 border-none text-gray-50 hover:bg-blue-700" onclick="showModal('my_modal_2<?php echo $subject['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
    </svg>
</button>
<dialog id="my_modal_2<?php echo $subject['id']; ?>" class="modal">
    <div class="modal-box text-gray-50">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="document.getElementById('my_modal_<?php echo $subject['id']; ?>').close()">✕</button>
        </form>
        <h3 class="font-bold text text-lg mb-5">Edit profile</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/subjects/edit_subjects.php" method="post">
            <input hidden type="text" value="<?php echo $subject['id']; ?>" name="id" placeholder="Type id number here" class="input input-bordered w-full max-w mb-5" />
            <input type="text" value="<?php echo $subject['subject_name']; ?>" name="subject_name" placeholder="Set new fullname here" class="input input-bordered w-full max-w mb-5" />
            <!-- Modal action buttons -->
            <div class="modal-action">
                <button type="submit" class="btn btn-secondary text-gray-50 border-none hover:bg-indigo-600 px-12">Update</button>
            </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>