<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
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
                    $("#petname1Update2").html(response);
                    $("#petname2Update2").html(response);
                    $("#petname3Update2").html(response);
                    $("#petname4Update2").html(response);
                    $("#petname5Update2").html(response);
                }
            });
        });
    }
</script>