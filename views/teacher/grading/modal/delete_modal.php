<!-- Delete Button -->
<button class="btn btn-sm bg-red-500 border-none hover:bg-red-600" onclick="showModal('my_modal_3<?php echo $grade['id']; ?>')">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
    </svg>
</button>

<!-- Delete Modal -->
<dialog id="my_modal_3<?php echo $grade['id']; ?>" class="modal text-gray-50">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="document.getElementById('my_modal_<?php echo $grade['id']; ?>').close()">✕</button>
        </form>
        <h3 class="font-bold text-lg">Delete grade record?</h3>
        <form action="../../../php/grading/delete.php" method="post">
            <p class="py-7 font-semibold text-base">Are you sure you want to delete this student?</p>
            <input type="hidden" name="id" value="<?php echo $grade['id']; ?>" /> <!-- Corrected 'nane' to 'name' -->

            <!-- Submit Button -->
            <button type="submit" class="btn btn-block btn-error text-gray-50 font-semibold text-base">Delete grade record</button>
        </form>
    </div>
</dialog>