<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function refreshTable() {
        var searchInput = document.getElementById('searchInput').value;
        var id = document.getElementById('id').value;
        var pet = document.getElementById('Petname').value;

        fetch('pet-record-fetch-data.php?searchInput=' + searchInput + '&id=' + id + '&Petname=' + pet)
            .then(response => response.text())
            .then(data => {
                document.getElementById('pRecordt').innerHTML = data;
            });
    }

    // Call the refreshTable function initially and every 1 second
    refreshTable();
    setInterval(refreshTable, 1000);
</script>
