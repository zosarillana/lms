<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="my_modal_1.showModal()">Add admin</button>
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Add admin.</h3>

        <!-- Form start -->
        <form id="admin_form" action="../../../php/all_accounts/add_admin.php" method="post">
            <input type="text" name="user_id" placeholder="Type id number here" class="input input-bordered w-full max-w mb-5" />
            <input type="text" name="user_fullname" placeholder="Type fullname here" class="input input-bordered w-full max-w mb-5" />
            <input type="text" name="user_username" placeholder="Type username here" class="input input-bordered w-full max-w mb-5" />
            <input type="password" name="user_password" placeholder="Type password here" class="input input-bordered w-full max-w mb-5" />
            <select name="user_type" class="select select-bordered w-full max-w">
                <option disabled selected>Select type here...</option>
                <option value="Admin">Admin</option>
            </select>
            <!-- Modal action buttons -->
            <div class="modal-action">
                <button type="submit" class="btn bg-green-700 border-none text-gray-200 hover:bg-green-900 px-12">Submit</button>
            </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>