<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData() {
        $(document).ready(function() {
            var data = {
                m: $("#monthHolder").val(),
            }

            $.ajax({
                url: 'analytics-filter-monthly.php',
                type: 'post',
                data: data,

                success: function(response) {
                    alert(response);
                }
            });
        });
    }
</script>