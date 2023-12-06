<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function refreshTable() {
        fetch('inventory-stock-checker.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('table-body').innerHTML = data;
            });
    }

    refreshTable();
    setInterval(refreshTable, 24 * 60 * 60 * 1000); // 24 hours in milliseconds
</script>