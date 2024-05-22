<button class="btn btn-sm bg-green-500 border-none hover:bg-green-600" onclick="showModal('my_modal_2<?php echo $subjectList['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
    </svg>

</button>

<!-- Delete Modal -->
<dialog id="my_modal_2<?php echo $subjectList['id']; ?>" class="modal text-gray-50">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="document.getElementById('my_modal_<?php echo $subjectList['id']; ?>').close()">✕</button>
        </form>
        <h3 class="font-bold text-lg">Approve request?</h3>
        <form action="../../../php/request/approve.php" method="post">
            <p class="py-7 font-semibold text-base">Are you sure you want to approve this course?</p>
            <input hidden type="" name="id" value="<?php echo $subjectList['id']; ?>" /> <!-- Corrected 'nane' to 'name' -->

            <!-- Submit Button -->
            <button type="submit" class="btn btn-block btn-success text-gray-50 font-semibold text-base">Approve request</button>
        </form>
    </div>
</dialog>