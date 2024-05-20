<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="my_modal_1.showModal()">Add teacher</button>
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-8">Add teacher.</h3>
        <!-- Form start -->
        <form id="admin_form" method="submit">
            <input type="text" placeholder="Type fullname here" class="input input-bordered w-full max-w mb-5" />
            <input type="text" placeholder="Type username here" class="input input-bordered w-full max-w mb-5" />
            <input type="password" placeholder="Type password here" class="input input-bordered w-full max-w mb-5" />
            <select class="select select-bordered w-full max-w">
                <option disabled selected>Select type here...</option>
                <option>Admin</option>
            </select>
            <!-- Modal action buttons -->
            <div class="modal-action">
                <button type="button" onclick="submitForm()" class="btn btn-success hover:bg-green-600 px-12">Submit</button>
                <button class="btn bg-red-500 hover:bg-red-600 px-12" onclick="my_modal_1.close()">Close</button>
            </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>