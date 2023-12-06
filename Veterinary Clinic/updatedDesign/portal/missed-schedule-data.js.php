<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    var rowsPerPage = 6;
    var currentPage = 1;

    function refreshContent() {
        $.ajax({
            url: window.location.href,
            type: 'GET',
            success: function(data) {
                $('#missed').html($(data).find('#missed').html());
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
            var data = {
                action: action,
                id: $("#schedID").val(),
                name: $("#name").val(),
                date: $("#date").val(),
                rowId: $("#rowId").val(),
            }

            $.ajax({
                url: 'missed-schedule-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    if (response != "") {
                        switch (response) {
                            case "Rescheduledsuccessfully":
                                successAlert("Rescheduled successfully");

                                refreshContent();
                                break;
                            case "ScheduleDeletedSuccessfully":
                                successAlert("Deleted successfully");

                                refreshContent();
                                break;
                            default:
                                errorAlert(response);
                        }
                    }
                }
            });
        });
    }

    function showPage(pageNumber) {
        var startIndex = (pageNumber - 1) * rowsPerPage;
        var endIndex = startIndex + rowsPerPage;

        var rows = document.getElementById('missed').rows;

        for (var i = 1; i < rows.length; i++) {
            rows[i].style.display = (i > startIndex && i <= endIndex) ? '' : 'none';
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
        var pageCount = Math.ceil((document.getElementById('missed').rows.length - 1) / rowsPerPage);

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
        var pageCount = Math.ceil((document.getElementById('missed').rows.length - 1) / rowsPerPage);
        if (currentPage < pageCount) {
            showPage(currentPage + 1);
        }
    }

    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("missed");
        tr = table.getElementsByTagName("tr");

        if (filter === "") {
            showPage(1);
            return;
        }

        for (i = 1; i < tr.length; i++) {
            var visible = false;
            for (var j = 0; j < tr[i].cells.length; j++) {
                td = tr[i].cells[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        visible = true;
                        break;
                    }
                }
            }
            tr[i].style.display = visible ? "" : "none";
        }
    }

    generatePaginationControls();
    showPage(1);
</script>