<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function refreshTable() {
        var data = {
            action: 'getId',
            custId: $("#id").val(),
        };

        $.ajax({
            url: 'customer-pet-table-fetch-data.php',
            type: 'post',
            data: data,

            success: function(response) {
                $("#refresh").html(response);
            }
        });
    }

    // Call refreshTable immediately when the page loads
    $(document).ready(function() {
        refreshTable();
    });

    // Refresh the table every 1 second
    setInterval(refreshTable, 1000);
</script>
