<div class=" w-full">
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="../dashboard/index.php">Dashboard</a></li>
            <li><a class="font-bold">Credentials</a></li>
        </ul>
    </div>
    <p class="text-lg font-bold mb-10">Credentials</p>
    <!-- <button class="btn px-12 border-none text-gray-50 bg-blue-500 hover:bg-blue-600 mb-4">Add users</button> -->
    <?php include '../tables/entries_search/entries_search.php'; ?>
    <div class="overflow-x-auto rounded-md">
        <table class="table table-lg border-none">
            <!-- head -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border-b border-gray-200">No.</th>
                    <th class="border-b border-gray-200">Student Name.</th>
                    <th class="border-b border-gray-200">Type of Credential</th>
                    <th class="border-b border-gray-200">Message</th>
                    <th class="border-b border-gray-200">Status</th>
                    <th class="border-b border-gray-200">Date submitted</th>
                    <th class="border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50 text-black ">
                <!-- row 1 -->
                <tr class="hover:bg-slate-200">
                    <th class="border-b text-sm border-gray-200">1</th>
                    <th class="border-b text-sm border-gray-200">13312f</th>
                    <th class="border-b text-sm border-gray-200">13312f</th>
                    <td class="border-b text-sm border-gray-200">BSIT</td>
                    <td class="border-b text-sm border-gray-200">
                        <p class="text-white text-xs font-semibold bg-green-600 rounded-full px-3 py-1 inline-block">Approved</p>
                    </td>
                    <td class="border-b text-sm border-gray-200">2024-05-18 16:37:56</td>
                    <td class="border-b text-sm border-gray-200">
                        <div class="grid grid-cols-2">
                            <div>
                                <button class="btn w-[100px] btn-xs border-none text-white bg-green-500 hover:bg-green-900">Approve</button>
                            </div>
                            <?php include '../../admin/credentials/modal/view_modal.php'; ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <?php include '../tables/pagination/pagination.php'; ?>
    </div>
</div>

<?php include '../tables/scripts/paginate.php'; ?>