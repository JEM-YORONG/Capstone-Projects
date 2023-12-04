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
                    if (response === "") {
                        console.log(response);
                    } else {
                        if (response === "Staff added successfully") {
                            successAlert("Staff added successfully");
                            // Clear input values
                            $("#name, #role, #contact, #email, #password").val("");

                            // Reset selected index for the role dropdown
                            $("#role")[0].selectedIndex = 0;

                            // Show specific elements
                            $("#emailTxt, #passTxt, #email, #password").show();

                            document.getElementById("myForm").style.display = "none";
                        }
                        if (response === "Empty Fields Detected") {
                            successAlert("Empty Fields Detected");
                        }
                        if (response === "Contact must be 11 digit") {
                            successAlert("Contact must be 11 digit");
                        }
                        if (response === "Password must be at least 8 characters") {
                            successAlert("Password must be at least 8 characters");
                        }
                        if (response === "Invalid Email") {
                            successAlert("Invalid Email");
                        }
                        if (response === "Staff updated successfully") {
                            successAlert("Staff updated successfully");
                            document.getElementById("myForm-edit").style.display = "none";
                        }
                        if (response === "Staff deleted successfully") {
                            successAlert("Staff deleted successfully");
                        }
                        if (response === "Email is already used.") {
                            successAlert("Email is already used.");
                        }
                        if(response === "Contact is already used."){
                            successAlert("Contact is already used.");
                        }
                    }
                    //alert(response);
                }
            });
        });
    }
</script>