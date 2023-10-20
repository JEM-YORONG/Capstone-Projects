<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = new FormData();
            data.append('action', action);

            //informations data
            data.append('changeImage', $('#changeImage')[0].files[0]);
            data.append('title', $("#edit-title").val());
            data.append('num1', $("#num1").val());
            data.append('num2', $("#num2").val());
            data.append('email', $("#email").val());
            data.append('social', $("#social").val());
            data.append('address', $("#address").val());
            data.append('intro', $("#intro").val());
            data.append('about', $("#about").val());

            //weekly schedules data
            data.append('monday', $("#monday").val());
            data.append('mondayStart', $("#mondayStart").val());
            data.append('mondayEnd', $("#mondayEnd").val());
            data.append('', $("#").val());

            data.append('tuesday', $("#tuesday").val());
            data.append('tuesdayStart', $("#tuesdayStart").val());
            data.append('tuesdayEnd', $("#tuesdayEnd").val());
            data.append('', $("#").val());

            data.append('wednesday', $("#wednesday").val());
            data.append('wednesdayStart', $("#wednesdayStart").val());
            data.append('wednesdayEnd', $("#wednesdayEnd").val());
            data.append('', $("#").val());

            data.append('thursday', $("#thursday").val());
            data.append('thursdayStart', $("#thursdayStart").val());
            data.append('thursdayEnd', $("#thursdayEnd").val());
            data.append('', $("#").val());

            data.append('friday', $("#friday").val());
            data.append('fridayStart', $("#fridayStart").val());
            data.append('fridayEnd', $("#fridayEnd").val());
            data.append('', $("#").val());

            data.append('saturday', $("#saturday").val());
            data.append('saturdayStart', $("#saturdayStart").val());
            data.append('saturdayEnd', $("#saturdayEnd").val());
            data.append('', $("#").val());

            data.append('sunday', $("#sunday").val());
            data.append('sundayStart', $("#sundayStart").val());
            data.append('sundayEnd', $("#sundayEnd").val());
            data.append('', $("#").val());

            $.ajax({
                url: 'information-function.php',
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response === "") {
                        alert("No response");
                    }
                    else{
                        alert(response);
                    }
                }
            });
        });
    }
</script>