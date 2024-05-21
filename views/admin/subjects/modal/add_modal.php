<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="my_modal_1.showModal()">Add Subjects</button>
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add subjects.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/subjects/add_subjects.php" method="post">
            <input type="text" name="subject_name" placeholder="Subject Name" class="input input-bordered w-full max-w mb-5" required />
            <!-- Modal action buttons -->
            <div class="modal-action">
                <button type="submit" class="btn btn-success hover:bg-green-600 px-12">Submit</button>
            </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>