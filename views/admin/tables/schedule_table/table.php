<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Schedule</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-5">Schedule</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../../admin/schedules/modal/add_modal.php'; ?>
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">No.</th>
                    <th class="border-b border-gray-200">Subject no.</th>
                    <th class="border-b border-gray-200">Subject name</th>
                    <th class="border-b border-gray-200">Time</th>
                    <th class="border-b border-gray-200">Days</th>
                    <th class="border-b border-gray-200">Strand</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <?php if (!empty($schedules)) : ?>
                    <?php foreach ($schedules as $schedule) : ?>
                        <tr class="hover:bg-slate-200">
                            <th class="border-b text-sm border-gray-200"><?php echo $schedule['id']; ?></th>
                            <th class="border-b text-sm border-gray-200"><?php echo $schedule['subject_id']; ?></th>
                            <td class="border-b text-sm border-gray-200"><?php echo $schedule['schedule_subject_name']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $schedule['schedule_time']; ?></td>
                            <td class="border-b text-sm border-gray-200"><?php echo $schedule['schedule_day']; ?></td>
                            <td class=" border-b text-sm border-gray-200"><?php echo $schedule['schedule_strand_name']; ?></td>
                            <!-- Use data attributes to store schedule data -->
                            <td class=" border-b text-sm border-gray-200">
                                <?php include '../../admin/schedules/modal/delete_modal.php'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="border-b text-sm border-gray-200 text-center">No strands found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php include '../tables/pagination/pagination.php'; ?>
    </div>
</div>

<?php include '../tables/scripts/paginate.php'; ?>

<script>
    function showModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.showModal();
        }
    }
</script>