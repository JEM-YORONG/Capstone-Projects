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
                updateId: $("#updateId").val(),
                updateDate: $("#updateDate").val(),
                updateName: $("#updateName").val(),
                updatePetname: $("#updatePetname").val(),
                updateType: $("#updateType").val(),
                updateService: $("#updateService").val(),
                updateNumber: $("#updateNumber").val(),

                //details data
                ownername: $("#ownerName").val(),
                detailID: $("#appointmentID").val(),
            }

            $.ajax({
                url: 'schedule-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    if(response == ""){
                        //alert(response);
                    }
                    else{
                        alert(response);
                    }
                }
            });
        });
    }
</script>