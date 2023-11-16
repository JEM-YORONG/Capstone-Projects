<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,

                // monday
                mts: $("#mts").val(),
                mte: $("#mte").val(),
                mm: $("#statusM").val(),

                // tuesday
                tts: $("#tts").val(),
                tte: $("#tte").val(),
                tm: $("#statusT").val(),

                // wednesday
                wts: $("#wts").val(),
                wte: $("#wte").val(),
                wm: $("#statusW").val(),

                // thursday
                thts: $("#thts").val(),
                thte: $("#thte").val(),
                thm: $("#statusTh").val(),

                // friday
                fts: $("#fts").val(),
                fte: $("#fte").val(),
                fm: $("#statusF").val(),

                // saturday
                sts: $("#sts").val(),
                ste: $("#ste").val(),
                sm: $("#statusS").val(),

                // sunday
                suts: $("#suts").val(),
                sute: $("#sute").val(),
                sum: $("#statusSu").val(),
            }

            $.ajax({
                url: 'page-maintenance-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    alert(response);
                }
            });
        });
    }
</script>