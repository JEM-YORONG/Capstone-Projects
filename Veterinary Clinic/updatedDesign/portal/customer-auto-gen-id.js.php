<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
function generateAndDisplayId() {
    // AJAX request to execute the PHP code
    $.ajax({
        url: 'customer-auto-gen-id.php',
        type: 'POST',
        success: function(response) {
            // Display the generated ID
            //alert(response);
            document.getElementById("addId").value = response;
        }
    });
}
</script>