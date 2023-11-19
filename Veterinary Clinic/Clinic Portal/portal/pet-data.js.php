<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                id: $("#search").val()
            }

            $.ajax({
                url: 'pet-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    alert(response);
                }
            });
        });
    }
</script>