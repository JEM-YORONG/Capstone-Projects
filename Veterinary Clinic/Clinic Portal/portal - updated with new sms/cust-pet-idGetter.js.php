<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function id(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                addId: $("#addId").val()
            }

            $.ajax({
                url: 'cust-and-pet-id-getter.php',
                type: 'post',
                data: data,

                success: function(response) {
                    alert("success!");
                }
            });
        });
    }
</script>