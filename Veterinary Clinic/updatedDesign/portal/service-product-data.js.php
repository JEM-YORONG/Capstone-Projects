<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = new FormData();
            data.append('action', action);
            data.append('addImage', $('#addImage')[0].files[0]);
            data.append('title', $("#addTitle").val());
            data.append('categories', $("#addCategories").val());
            data.append('description', $("#addDescription").val());

            data.append('action', action);
            data.append('AddImage', $('#editImage')[0].files[0]);
            data.append('Id', $("#id").val());
            data.append('Title', $("#editTitle").val());
            data.append('Categories', $("#editCategories").val());
            data.append('Description', $("#editDescription").val());

            $.ajax({
                url: 'service-product-function.php',
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response !== "") {
                        switch (response) {
                            case "AddedSuccessfully":
                                $('#preview').prop('src', '.vscode/Images/didunkow.jpg');
                                $('#addTitle').val("");
                                $('#addCategories').val("SELECT");
                                $('#addDescription').val("");
                                var newFileInput = $("<input type='file' id='addImage' accept='image/*' value='Upload Image'>");
                                $('#addImage').replaceWith(newFileInput);
                                successAlert("Added successfully");

                                document.getElementById("myForm-servprod").style.display = "none";
                                break;
                            case "UpdatedSuccessfully":
                                successAlert("Updated successfully");
                                document.getElementById("myForm-Editservprod").style.display = "none";
                                break;
                            case "DeletedSuccessfully":
                                successAlert("Deleted successfully");
                                document.getElementById("myForm-delete").style.display = "none";
                                break;
                            default:
                                errorAlert(response);
                        }
                    } else {
                        errorAlert("No response");
                    }

                }
            });
        });
    }
</script>