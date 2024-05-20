 <div>
     <!-- You can open the modal using ID.showModal() method -->
     <button class="btn w-[100px] btn-xs border-none text-white bg-pink-500 hover:bg-pink-900" onclick="my_modal_4.showModal()">View</button>
     <dialog id="my_modal_4" class="modal">
         <div class="modal-box w-11/12 max-w-5xl">
             <h3 class="font-bold text-white text-lg">Student details</h3>
             <p class="py-4">
             <div class="grid grid-cols-2 gap-4 pb-5">
                 <div>
                     <label for="submitted_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submitted
                         by</label>
                     <input disabled type="text" name="submitted_by" id="submitted_by" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cy Ganderton" required="">
                 </div>
                 <div>
                     <label for="course" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
                     <input disabled type="text" name="course" id="course" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="BSIT" required="">
                 </div>
             </div>
             <div class="grid grid-cols-3 gap-4">
                 <div>
                     <label for="document_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document
                         name</label>
                     <input disabled type="text" name="document_name" id="document_name" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Data Management System" required="">
                 </div>
                 <div>
                     <label for="date_submitted" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                         Submitted</label>
                     <input disabled type="text" name="date_submitted" id="date_submitted" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="BSIT" required="">
                 </div>
                 <div>
                     <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                     <input disabled type="text" name="status" id="status" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Approved" required="">
                 </div>
             </div>



             <div class="modal-action">
                 <form method="dialog">
                     <!-- if there is a button, it will close the modal -->
                     <button class="btn w-[150px] bg-red-500 hover:bg-red-700 text-white">Close</button>
                 </form>
             </div>
         </div>
     </dialog>
 </div>