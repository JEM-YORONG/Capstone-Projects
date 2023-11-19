<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
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
                                break;
                            case "ScheduleDeletedSuccessfully":
                                successAlert("Deleted successfully");
                                break;
                            default:
                            errorAlert(response);
                        }
                    }
                }
            });
        });
    }
</script>