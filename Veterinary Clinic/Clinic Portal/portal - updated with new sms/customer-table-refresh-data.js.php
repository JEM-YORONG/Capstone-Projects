<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function refreshTable() {
        // Send an AJAX request to fetch the latest data from fetchData.php with the search input value
        var searchInput = document.getElementById('search').value;
        fetch('customer-fetch-data.php?search=' + searchInput)
            .then(response => response.text())
            .then(data => {
                // Replace the contents of the table body with the updated data
                document.getElementById('table-body').innerHTML = data;
            });
    }

    // Call the refreshTable function initially and every 1 seconds
    refreshTable();
    setInterval(refreshTable, 1000);
</script>