<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    var rowsPerPage = 5;
    var currentPage = 1;

    function refreshContent1() {
        $.ajax({
            url: window.location.href,
            type: 'GET',
            success: function(data) {
                $('#todaySched').html($(data).find('#todaySched').html());
                generatePaginationControls1(); // Update function name
                showPage1(currentPage); // Update function name
            },
            error: function() {
                console.error("Failed to refresh content");
            }
        });
    }

    function refreshContent2() {
        $.ajax({
            url: window.location.href,
            type: 'GET',
            success: function(data) {
                $('#upcomingSched').html($(data).find('#upcomingSched').html());
                generatePaginationControls2(); // Update function name
                showPage2(currentPage); // Update function name
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
                //add appointment
                date: $("#date").val(),
                name: $("#name").val(),
                petname1: $("#petname1").val(),
                petname2: $("#petname2").val(),
                petname3: $("#petname3").val(),
                petname4: $("#petname4").val(),
                petname5: $("#petname5").val(),
                type: $("#type").val(),
                service1: $("#service1").val(),
                service2: $("#service2").val(),
                service3: $("#service3").val(),
                number: $("#number").val(),

                //delete schedule
                id: $("#rowId").val(),

                //status id
                statusId: $("#statusId").val(),

                //SMS info
                smsDate: $("#smsDate").val(),
                smsNumber: $("#smsNumber").val(),
                smsName: $("#smsName").val(),
                smsPetname: $("#smsPetname").val(),
                smsMessage: $("#smsMessage").val(),

                //update appointment info
                updateId: $("#ownerIdUpdate").val(),
                updatedate: $("#dateUpdate").val(),
                updatename: $("#nameUpdate").val(),
                //default
                updatepetname1: $("#petname1Update").val(),
                updatepetname2: $("#petname2Update").val(),
                updatepetname3: $("#petname3Update").val(),
                updatepetname4: $("#petname4Update").val(),
                updatepetname5: $("#petname5Update").val(),
                //modified
                updatepetname12: $("#petname1Update2").val(),
                updatepetname22: $("#petname2Update2").val(),
                updatepetname32: $("#petname3Update2").val(),
                updatepetname42: $("#petname4Update2").val(),
                updatepetname52: $("#petname5Update2").val(),

                updatetype: $("#typeUpdate").val(),
                updateservice1: $("#service1Update").val(),
                updateservice2: $("#service2Update").val(),
                updateservice3: $("#service3Update").val(),
                updatenumber: $("#numberUpdate").val(),

                //details data
                ownername: $("#ownerName").val(),
                detailID: $("#appointmentID").val(),
            }

            $.ajax({
                url: 'schedule-function.php',
                type: 'post',
                data: data,

                success: function(response) {

                    $("#petname1Update2, #petname2Update2, #petname3Update2, #petname4Update2, #petname5Update2").html(response);

                    // Check if the response is not empty before proceeding
                    if (response != "") {
                        if (response == "CustomerDidntExist") {
                            errorAlert("Customer did not exist");

                        }
                        if (response == "ScheduleAddedSuccessfully") {
                            // Reset input values
                            $("#date, #name, #numPet, #numServices, #number").val("");

                            // Reset petname and service dropdowns
                            $("#petname1, #petname2, #petname3, #petname4, #petname5, #service1, #service2, #service3").prop("selectedIndex", 0);

                            // Hide pet and service sections
                            $("#pet1, #pet2, #pet3, #pet4, #pet5, #s1, #s2, #s3, #myForm").hide();

                            successAlert("Schedule added successfully");

                            refreshContent1();
                            refreshContent2();
                        }

                        if (response == "ScheduleUpdatedSuccessfully") {
                            successAlert("Schedule updated successfully");

                            count = 0;
                            document.getElementById("viewBtn").value = "View Petnames";
                            document.getElementById("pet1U").style.display = "none";
                            document.getElementById("pet2U").style.display = "none";
                            document.getElementById("pet3U").style.display = "none";
                            document.getElementById("pet4U").style.display = "none";
                            document.getElementById("pet5U").style.display = "none";

                            document.getElementById("updateForm").style.display = "none";

                            refreshContent1();
                            refreshContent2();
                        }

                        if (response == "ScheduleDeletedSuccessfully") {
                            errorAlert("Schedule deleted successfully");
                            document.getElementById("myForm-delete").style.display = "none";

                            refreshContent1();
                            refreshContent2();
                        }

                        if (response == "Please fill in all the fields") {
                            errorAlert("Please fill in all the fields");
                        }
                        if (response == "Contact must be 11 digit") {
                            errorAlert("Contact must be 11 digit");
                        }

                    } else {
                        // Handle the case when the response is empty
                        console.error("Empty response received");
                    }

                }
            });
        });
    }

    function showPage1(pageNumber) {
        var startIndex = (pageNumber - 1) * rowsPerPage1;
        var endIndex = startIndex + rowsPerPage1;

        var rows = document.getElementById('todaySched').rows;

        for (var i = 1; i < rows.length; i++) {
            rows[i].style.display = (i > startIndex && i <= endIndex) ? '' : 'none';
        }

        updatePaginationButtons1(pageNumber);
        currentPage1 = pageNumber;
    }

    function updatePaginationButtons1(activePage) {
        var buttons = document.getElementsByClassName('pagination-button');

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('active');
        }

        var activeButton = document.getElementById('pageBtn1' + activePage);

        if (activeButton) {
            activeButton.classList.add('active');
        }
    }

    function generatePaginationControls1() {
        var paginationContainer = document.getElementById('pagination-container1');
        var pageCount = Math.ceil((document.getElementById('todaySched').rows.length - 1) / rowsPerPage1);

        var paginationHtml = '<button class="pagination-button" onclick="previousPage1()">Previous</button>';

        for (var i = 1; i <= pageCount; i++) {
            paginationHtml += '<button id="pageBtn1' + i + '" class="pagination-button ' + (i === currentPage1 ? 'active' : '') + '" onclick="showPage1(' + i + ')">' + i + '</button>';
        }

        paginationHtml += '<button class="pagination-button" onclick="nextPage1()">Next</button>';

        paginationContainer.innerHTML = paginationHtml;
    }

    function previousPage1() {
        if (currentPage1 > 1) {
            showPage1(currentPage1 - 1);
        }
    }

    function nextPage1() {
        var pageCount = Math.ceil((document.getElementById('todaySched').rows.length - 1) / rowsPerPage1);
        if (currentPage1 < pageCount) {
            showPage1(currentPage1 + 1);
        }
    }

    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search1");
        filter = input.value.toUpperCase();
        table = document.getElementById("todaySched");
        tr = table.getElementsByTagName("tr");

        if (filter === "") {
            showPage1(1);
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

    generatePaginationControls1();
    showPage1(1);

    function showPage2(pageNumber) {
        var startIndex = (pageNumber - 1) * rowsPerPage2;
        var endIndex = startIndex + rowsPerPage2;

        var rows = document.getElementById('upcomingSched').rows;

        for (var i = 1; i < rows.length; i++) {
            rows[i].style.display = (i > startIndex && i <= endIndex) ? '' : 'none';
        }

        updatePaginationButtons2(pageNumber);
        currentPage2 = pageNumber;
    }

    function updatePaginationButtons2(activePage) {
        var buttons = document.getElementsByClassName('pagination-button');

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('active');
        }

        var activeButton = document.getElementById('pageBtn2' + activePage);

        if (activeButton) {
            activeButton.classList.add('active');
        }
    }

    function generatePaginationControls2() {
        var paginationContainer = document.getElementById('pagination-container2');
        var pageCount = Math.ceil((document.getElementById('upcomingSched').rows.length - 1) / rowsPerPage2);

        var paginationHtml = '<button class="pagination-button" onclick="previousPage2()">Previous</button>';

        for (var i = 1; i <= pageCount; i++) {
            paginationHtml += '<button id="pageBtn2' + i + '" class="pagination-button ' + (i === currentPage2 ? 'active' : '') + '" onclick="showPage2(' + i + ')">' + i + '</button>';
        }

        paginationHtml += '<button class="pagination-button" onclick="nextPage2()">Next</button>';

        paginationContainer.innerHTML = paginationHtml;
    }

    function previousPage2() {
        if (currentPage2 > 1) {
            showPage2(currentPage2 - 1);
        }
    }

    function nextPage2() {
        var pageCount = Math.ceil((document.getElementById('upcomingSched').rows.length - 1) / rowsPerPage2);
        if (currentPage2 < pageCount) {
            showPage2(currentPage2 + 1);
        }
    }

    function onSelect() {
        const dateVal = document.getElementById("sortDate").value;
        if (dateVal === "") {
            document.getElementById("search2").value = "";
            showPage2(1);
        } else {
            document.getElementById("search2").value = dateVal;
            filterTable2();
        }
    }

    function filterTable2() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search2");
        filter = input.value.toUpperCase();
        table = document.getElementById("upcomingSched");
        tr = table.getElementsByTagName("tr");

        if (filter === "") {
            showPage2(1);
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


    generatePaginationControls2();
    showPage2(1);
</script>