<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function successAlert(t1) {
        $("#alertDiv").css("display", "flex");
        $("#message").text(t1);

        setTimeout(function() {
            $("#alertDiv").css("display", "none");
        }, 2000);
    }

    function errorAlert(t1) {
        $("#alertDivError").css("display", "flex");
        $("#messageErr").text(t1);

        setTimeout(function() {
            $("#alertDivError").css("display", "none");
        }, 2000);
    }
</script>