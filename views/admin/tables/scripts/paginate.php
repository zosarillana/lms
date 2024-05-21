<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showEntriesSelect = document.getElementById('show-entries');
        const searchInput = document.getElementById('search-table');
        const tableBody = document.querySelector('table tbody');
        const paginationContainer = document.getElementById('pagination');
        const prevPageBtn = document.getElementById('prev-page');
        const nextPageBtn = document.getElementById('next-page');
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        let currentPage = 1;
        let totalPages = 1;
        let filteredRows = rows;

        showEntriesSelect.addEventListener('change', updateTable);
        searchInput.addEventListener('keyup', updateTable);
        prevPageBtn.addEventListener('click', goToPrevPage);
        nextPageBtn.addEventListener('click', goToNextPage);

        function updateTable() {
            const searchQuery = searchInput.value.toLowerCase();
            const entriesToShow = parseInt(showEntriesSelect.value);
            filteredRows = rows;

            if (searchQuery) {
                filteredRows = rows.filter(row => {
                    return Array.from(row.cells).some(cell =>
                        cell.textContent.toLowerCase().includes(searchQuery)
                    );
                });
            }

            totalPages = Math.ceil(filteredRows.length / entriesToShow);
            currentPage = 1;
            renderTable();
            renderPaginationControls();
        }

        function renderTable() {
            const entriesToShow = parseInt(showEntriesSelect.value);
            const startIdx = (currentPage - 1) * entriesToShow;
            const endIdx = startIdx + entriesToShow;

            tableBody.innerHTML = '';
            filteredRows.slice(startIdx, endIdx).forEach(row => {
                tableBody.appendChild(row);
            });
        }

        function renderPaginationControls() {
            paginationContainer.innerHTML = '';
            if (totalPages > 1) {
                const prevBtn = document.createElement('li');
                prevBtn.innerHTML = `<a href="#" id="prev-page" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>`;
                paginationContainer.appendChild(prevBtn);

                for (let i = 1; i <= totalPages; i++) {
                    const pageBtn = document.createElement('li');
                    pageBtn.innerHTML = `<a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">${i}</a>`;
                    pageBtn.addEventListener('click', () => goToPage(i));
                    paginationContainer.appendChild(pageBtn);
                }

                const nextBtn = document.createElement('li');
                nextBtn.innerHTML = `<a href="#" id="next-page" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Next</a>`;
                paginationContainer.appendChild(nextBtn);
            }
        }

        function goToPage(page) {
            currentPage = page;
            renderTable();
        }

        function goToPrevPage(event) {
            event.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        }

        function goToNextPage(event) {
            event.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                renderTable();
            }
        }

        // Initial setup
        updateTable();
    });
</script>