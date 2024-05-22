<!-- Button to open modal -->
<button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4" onclick="document.getElementById('my_modal_1').showModal()">Request Credentials</button>
<dialog id="my_modal_1" class="modal">
    <div class=" modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-8">Request Credentials.</h3>
        <!-- Form start -->
        <form id="admin_form" action="../../../php/teacher/add_teacher.php" method="post">
            <div class="col-span-2">
                <h3 class="font-bold text-lg mb-8">Primary details.</h3>
                <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>
                        <label for="student" class="block mb-2 text-sm font-medium text-gray-50">Select a student:</label>
                        <select required name="student" class="select select-bordered w-full max-w">
                            <option disabled selected>Select Student</option>
                        </select>
                    </div>
                    <div>
                        <label for="subject_name" class="block mb-2 text-sm font-medium text-gray-50">Subject name:</label>
                        <select required name="subject_name" class="select select-bordered w-full max-w">
                            <option disabled selected>Select subject</option>
                        </select>
                    </div>
                    <div>
                        <label for="first_quarter" class="block mb-2 text-sm font-medium text-gray-50">First Quarter</label>
                        <input type="text" name="first_quarter" id="first_quarter" class="input input-bordered input-md w-full" placeholder="first quarter grade" required="">
                    </div>
                    <div>
                        <label for="2nd_quarter" class="block mb-2 text-sm font-medium text-gray-50">2nd Quarter</label>
                        <input type="text" name="2nd_quarter" id="2nd_quarter" class="input input-bordered input-md w-full" placeholder="second quarter grade" required="">
                    </div>
                    <div>
                        <label for="final" class="block mb-2 text-sm font-medium text-gray-50">Final</label>
                        <input type="text" name="final" id="final" class="input input-bordered input-md w-full" placeholder="final grade" required="">
                    </div>
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn bg-green-700 border-none text-gray-200 hover:bg-green-900 px-12">Submit</button>
                </div>
        </form>
        <!-- Form end -->
    </div>
</dialog>