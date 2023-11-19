<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                id: $("#addId").val(),
                name: $("#addName").val(),
                maxquantity: $("#addMaxQuantity").val(),
                minquantity: $("#addMinQuantity").val(),
                type: $("#addType").val(),

                editId: $("#editId").val(),
                editName: $("#editName").val(),
                editMaxQuantity: $("#editMaxQuantity").val(),
                editMinQuantity: $("#editMinQuantity").val(),
                editType: $("#editType").val()
            }

            $.ajax({
                url: 'inventory-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    alert(response);
                }
            });
        });
    }
</script>