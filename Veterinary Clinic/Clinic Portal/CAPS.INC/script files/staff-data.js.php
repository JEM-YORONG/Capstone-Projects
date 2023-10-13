<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                id: $("#id").val(),
                name: $("#name").val(),
                role: $("#role").val(),
                contact: $("#contact").val(),
                email: $("#email").val(),
                password: $("#password").val(),

                editId: $("#editId").val(),
                editName: $("#editName").val(),
                editRole: $("#editRole").val(),
                editContact: $("#editContact").val(),
                editEmail: $("#editEmail").val(),
                editPassword: $("#editPassword").val()
            }

            $.ajax({
                url: 'staff-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    /*
                    alert(response);
                    clearForm();
                    closeForm();
                    */

                    if (response == "Staff Added Successfully.") {
                        //alert(response);
                        closeForm();
                        clearForm();
                    } else if (response == "Empty Fields Detected.") {
                        alert(response);
                    } else if (response == "Email is already used.") {
                        alert(response);
                    } else if (response == "Staff Updated Successfully.") {
                        //alert(response);
                    } else {
                        alert(response);
                    }
                }
            });
        });
    }
</script>