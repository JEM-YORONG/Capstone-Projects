<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function refreshTable() {
        fetch('dashboard-schedule.php')
            .then(response => response.text())
            .then(data => {
                // Replace the contents of the table body with the updated data
                document.getElementById('table-body1').innerHTML = data;
            });
    }

    // Call the refreshTable function initially and every 1 second
    refreshTable();
    setInterval(refreshTable, 1000);
</script>
