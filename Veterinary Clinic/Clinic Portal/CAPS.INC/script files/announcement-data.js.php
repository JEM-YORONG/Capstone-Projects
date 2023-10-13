<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = new FormData();
            data.append('action', action);
            data.append('addImage', $('#addImage')[0].files[0]);
            data.append('title', $("#addTitle").val());
            data.append('description', $("#addDescription").val());

            data.append('action', action);
            data.append('AddImage', $('#editImage')[0].files[0]);
            data.append('Id', $("#id").val());
            data.append('Title', $("#editTitle").val());
            data.append('Description', $("#editDescription").val());

            $.ajax({
                url: 'announcement-function.php',
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