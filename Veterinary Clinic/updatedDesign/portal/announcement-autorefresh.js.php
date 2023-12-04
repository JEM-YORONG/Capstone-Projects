<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function refreshTable() {
        var searchInput = document.getElementById('id').value;
        fetch('announcement-fetch-data.php?id=' + searchInput)
            .then(response => response.text())
            .then(data => {
                document.getElementById('refresh').innerHTML = data;
            });
    }

    // Call the refreshTable function initially and every 1 seconds
    refreshTable();
    setInterval(refreshTable, 1000);
</script>