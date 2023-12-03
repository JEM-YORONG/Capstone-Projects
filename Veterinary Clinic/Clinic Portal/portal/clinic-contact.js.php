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

                        document.getElementById("divConfirm").style.display = "none";
                        document.getElementById("divUpdate").style.display = "block";

                        document.getElementById("contact1").disabled = true;
                        document.getElementById("contact2").disabled = true;
                        document.getElementById("email").disabled = true;
                        document.getElementById("social1").disabled = true;
                        document.getElementById("social2").disabled = true;
                        document.getElementById("social3").disabled = true;

                    } else {

                        errorAlert(response);

                    }
                }
            });
        });
    }
</script>