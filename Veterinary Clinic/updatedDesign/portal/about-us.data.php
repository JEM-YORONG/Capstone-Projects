<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = new FormData();
            data.append('action', action);
            data.append('addImage', $('#uploadimg')[0].files[0]);
            data.append('title', $("#title").text());
            data.append('address', $("#address").text());
            data.append('intro', $("#intro").text());
            data.append('about', $("#about").text());

            $.ajax({
                url: 'page-maintenance-function.php',
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == 'success') {
                        console.log(response);

                        successAlert("Information updated successfully");

                        document.getElementById("divConfirm").style.display = "none";
                        document.getElementById("divUpdate").style.display = "block";

                        document.getElementById('upload').style.display = "none";

                        document.getElementById("title").contentEditable = false;
                        document.getElementById("address").contentEditable = false;
                        document.getElementById("intro").contentEditable = false;
                        document.getElementById("about").contentEditable = false;

                    } else {

                        errorAlert(response);

                    }
                }
            });
        });
    }
</script>