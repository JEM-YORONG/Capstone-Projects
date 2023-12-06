<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Alert</title>
    <link rel="stylesheet" href="zztest.css">
</head>

<body>
    <div class="alertSuccess" style="display: none;" id="alert">
    </div>
    <div class="alertError" style="display: none;" id="error">
    </div>

    <div style="padding: 20%;">
        <form>
            <input type="text" id="firstname">
            <br><br>
            <input type="text" id="lastname">
            <br><br>
            <button type="button" onclick="submitData('display');">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        function submitData(action) {
            var data = {
                action: action,
                fname: $("#firstname").val(),
                lname: $("#lastname").val(),
            };

            $.ajax({
                url: 'zzTest-function.php',
                type: 'post',
                data: data,
                success: function(response) {
                    //alert(response);
                    if (response === "success") {
                        var alertMessage = `
                        <h2 class="alert-title">Success</h2>
                        <p class="alert-message">Submitted Successfully.</p>
                    `;

                        $("#alert").html(alertMessage);
                        displaySuccess();
                    }
                    if (response === "Empty fields detected.") {
                        var alertMessage = `
                        <h2 class="alert-title">Error</h2>
                        <p class="alert-message">Empty fields detected.</p>
                    `;

                        $("#error").html(alertMessage);
                        displayError();
                    }
                }
            });
        }

        function displaySuccess() {
            document.getElementById("alert").style.display = "block";

            // Auto close alert message
            setTimeout(() => {
                document.getElementById("alert").style.display = "none";
                document.getElementById("firstname").value = "";
                document.getElementById("lastname").value = "";
            }, 3500);
        }

        function displayError() {
            document.getElementById("error").style.display = "block";

            // Auto close alert message
            setTimeout(() => {
                document.getElementById("error").style.display = "none";
            }, 3000);
        }
    </script>
</body>

</html>