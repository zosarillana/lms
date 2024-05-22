<!-- Button to open modal -->
<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="document.getElementById('my_modal_1').showModal()">Request Credentials</button>
<dialog id="my_modal_1" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Request Credentials.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/request/add_request.php" method="post">
            <div class="col-span-2">
                <h3 class="font-bold text-lg mb-8">Primary details.</h3>
                <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>
                        <label for="student" class="block mb-2 text-sm font-medium text-gray-50">Student fullname</label>
                        <!-- Use readonly instead of hidden for displaying the value -->
                        <input hidden type="text" name="student_id" value="<?php echo $_SESSION['user_id']; ?>" placeholder="Type here" class="input input-bordered w-full max-w" />
                        <input readonly type="text" name="student_fullname" value="<?php echo $_SESSION['user_fullname']; ?>" placeholder="Type here" class="input input-bordered w-full max-w" />
                    </div>
                    <div>
                        <label for="select_credential" class="block mb-2 text-sm font-medium text-gray-50">Credential Type</label>
                        <select required name="select_credential" class="select select-bordered w-full max-w">
                            <option disabled selected>Select Credential</option>
                            <option value="FORM 137">FORM 137</option>
                            <option value="Good Moral">Good Moral</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-2 mb-5">
                    <div>
                        <label for="first_quarter" class="block mb-2 text-sm font-medium text-gray-50">Message</label>
                        <textarea name="message" class="textarea textarea-bordered w-full max-w" placeholder="reason for request"></textarea>
                    </div>
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn bg-green-700 border-none text-gray-200 hover:bg-green-900 px-12">Submit</button>
                </div>
            </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>