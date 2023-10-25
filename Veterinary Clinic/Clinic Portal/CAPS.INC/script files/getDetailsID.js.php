<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitID(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                id: $("#appointmentID").val(),
            }

            $.ajax({
                url: 'details-fetch-data.php',
                type: 'post',
                data: data,

                success: function(response) {
                    $("#table-details").html(response);
                }
            });
        });
    }
</script>