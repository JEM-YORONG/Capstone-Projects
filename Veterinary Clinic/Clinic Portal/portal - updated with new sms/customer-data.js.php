<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                //customer
                addId: $("#addId").val(),
                addLastName: $("#addLastName").val(),
                addFirstName: $("#addFirstName").val(),
                addContact: $("#addContact").val(),
                addEmail: $("#addEmail").val(),
                addAddress: $("#addAddress").val(),
            }

            $.ajax({
                url: 'customer-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    if (response != "") {
                        if (response == "CustomerAddedSuccessfully") {
                            $("#addFirstName").val("");
                            $("#addLastName").val("");
                            $("#addContact").val("");
                            $("#addEmail").val("");
                            $("#addAddress").val("");

                            successAlert("Customer added successfully");
                        } else if (response == "CustomerDeletedSuccessfully") {
                            successAlert("Customer deleted successfully");
                        } else {
                            errorAlert(response);
                        }
                    } else {
                        console.log(response);
                    }
                }
            });
        });
    }
</script>