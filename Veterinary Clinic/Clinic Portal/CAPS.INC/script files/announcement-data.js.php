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
                    if (response !== "") {
                        switch (response) {
                            case "AddedSuccessfully":
                                successAlert("Announcement added successfully");
                                $('#preview').prop('src', '.vscode/Images/didunkow.jpg');
                                $('#addTitle').val("");
                                $('#addDescription').val("");
                                var newFileInput = $("<input type='file' id='addImage' accept='image/*' value='Upload Image'>");
                                $('#addImage').replaceWith(newFileInput);
                                break;
                            case "UpdatedSuccessfully":
                                successAlert("Announcement updated successfully");
                                break;
                            case "DeletedSuccessfully":
                                successAlert("Announcement deleted successfully");
                                break;
                            default:
                                errorAlert(response);
                        }
                    } else {
                        errorAlert(response);
                    }
                }
            });
        });
    }
</script>