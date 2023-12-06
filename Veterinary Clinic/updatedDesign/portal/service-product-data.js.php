<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    var rowsPerPage = 12;
    var currentPage = 1;

    function refreshContent() {
        $.ajax({
            url: window.location.href,
            type: 'GET',
            success: function(data) {
                $('#refresh').html($(data).find('#refresh').html());
                generatePaginationControls();
                showPage(currentPage);
            },
            error: function() {
                console.error("Failed to refresh content");
            }
        });
    }

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
                                refreshContent();
                                break;
                            case "UpdatedSuccessfully":
                                successAlert("Updated successfully");
                                document.getElementById("myForm-Editservprod").style.display = "none";
                                refreshContent();
                                break;
                            case "DeletedSuccessfully":
                                successAlert("Deleted successfully");
                                document.getElementById("myForm-delete").style.display = "none";
                                refreshContent();
                                break;
                            case "Invalid image extension":
                                successAlert("Invalid image extension");
                                break;
                            case "Image size is too large":
                                successAlert("Image size is too large");
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

    function showPage(pageNumber) {
        var startIndex = (pageNumber - 1) * rowsPerPage;
        var endIndex = startIndex + rowsPerPage;

        var rows = document.getElementById('refresh').querySelectorAll('.box');

        for (var i = 0; i < rows.length; i++) {
            rows[i].style.display = (i >= startIndex && i < endIndex) ? '' : 'none';
        }

        updatePaginationButtons(pageNumber);
        currentPage = pageNumber;
    }

    function updatePaginationButtons(activePage) {
        var buttons = document.getElementsByClassName('pagination-button');

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('active');
        }

        var activeButton = document.getElementById('pageBtn' + activePage);

        if (activeButton) {
            activeButton.classList.add('active');
        }
    }

    function generatePaginationControls() {
        var paginationContainer = document.getElementById('pagination-container');
        var rowCount = document.getElementById('refresh').querySelectorAll('.box').length;
        var pageCount = Math.ceil(rowCount / rowsPerPage);

        var paginationHtml = '<button class="pagination-button" onclick="previousPage()">Previous</button>';

        for (var i = 1; i <= pageCount; i++) {
            paginationHtml += '<button id="pageBtn' + i + '" class="pagination-button ' + (i === currentPage ? 'active' : '') + '" onclick="showPage(' + i + ')">' + i + '</button>';
        }

        paginationHtml += '<button class="pagination-button" onclick="nextPage()">Next</button>';

        paginationContainer.innerHTML = paginationHtml;
    }

    function previousPage() {
        if (currentPage > 1) {
            showPage(currentPage - 1);
        }
    }

    function nextPage() {
        var rowCount = document.getElementById('refresh').querySelectorAll('.box').length;
        var pageCount = Math.ceil(rowCount / rowsPerPage);

        if (currentPage < pageCount) {
            showPage(currentPage + 1);
        }
    }

    function filterContent(filterCategory) {
        handleFilter(filterCategory);
    }

    function handleFilter(filterCategory) {
        var container = document.getElementById("refresh");
        var boxes = container.querySelectorAll('.box');

        if (!filterCategory) {
            generatePaginationControls();
            showPage(1);
            return;
        }

        boxes.forEach(function(box) {
            var category = box.querySelector('h6').innerText.trim();
            var isVisible = category.toUpperCase().includes(filterCategory.toUpperCase());

            box.style.display = isVisible ? 'block' : 'none';
        });
    }


    generatePaginationControls();
    showPage(1);
</script>