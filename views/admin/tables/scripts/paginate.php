
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showEntriesSelect = document.getElementById('show-entries');
        const searchInput = document.getElementById('search-table');
        const tableBody = document.querySelector('table tbody');
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        // Update the table whenever the number of entries or search query changes
        showEntriesSelect.addEventListener('change', paginateTable);
        searchInput.addEventListener('keyup', paginateTable);

        function paginateTable() {
            const searchQuery = searchInput.value.toLowerCase();
            const entriesToShow = parseInt(showEntriesSelect.value);
            let filteredRows = rows;

            // Filter rows based on the search query
            if (searchQuery) {
                filteredRows = rows.filter(row => {
                    return Array.from(row.cells).some(cell =>
                        cell.textContent.toLowerCase().includes(searchQuery)
                    );
                });
            }

            // Clear the table body and add the filtered rows up to the limit of entriesToShow
            tableBody.innerHTML = '';
            filteredRows.slice(0, entriesToShow).forEach(row => {
                tableBody.appendChild(row);
            });
        }

        // Initial pagination setup
        paginateTable();
    });
</script>