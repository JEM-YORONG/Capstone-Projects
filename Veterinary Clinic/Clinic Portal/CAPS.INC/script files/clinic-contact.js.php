<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                //customer
                c1: $("#contact1").val(),
                c2: $("#contact2").val(),
                e: $("#email").val(),
                s1: $("#social1").val(),
                s2: $("#social2").val(),
                s3: $("#social3").val(),
            }

            $.ajax({
                url: 'page-maintenance-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    if (response == 'success') {
                        console.log(response);

                        successAlert("Contact updated successfully");

                    } else {

                        errorAlert(response);

                    }
                }
            });
        });
    }
</script>