<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<script>
    //session_start();

    function login(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                id: $("#id").val(),
                username: $("#username").val(),
                password: $("#password").val()
            }

            $.ajax({
                url: 'login-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    //alert(response);
                    //let username = $_SESSION['username'];
                    if (response == "admin") {
                        successAlert("Welcome Admin");
                        location.replace("zHTML_dashboard.php");
                    } else if(response == "secretary" || response == "veterinarian") {
                        successAlert("Welcome Staff");
                        location.replace("zStaff_dashboard.php");
                    }
                    else{
                        successAlert(response);
                    }
                }
            });
        });
    }
</script>