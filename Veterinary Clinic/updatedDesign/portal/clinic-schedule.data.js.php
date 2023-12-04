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
                    if (response == 'success') {
                        console.log(response);

                        successAlert("Clinic weekly schedule updated successfully");

                        document.getElementById("divConfirm").style.display = "none";
                        document.getElementById("divUpdate").style.display = "block";

                        document.getElementById("mts").disabled = true;
                        document.getElementById("mte").disabled = true;
                        document.getElementById("mc").disabled = true;

                        document.getElementById("tts").disabled = true;
                        document.getElementById("tte").disabled = true;
                        document.getElementById("tc").disabled = true;

                        document.getElementById("wts").disabled = true;
                        document.getElementById("wte").disabled = true;
                        document.getElementById("wc").disabled = true;

                        document.getElementById("thts").disabled = true;
                        document.getElementById("thte").disabled = true;
                        document.getElementById("thc").disabled = true;

                        document.getElementById("fts").disabled = true;
                        document.getElementById("fte").disabled = true;
                        document.getElementById("fc").disabled = true;

                        document.getElementById("sts").disabled = true;
                        document.getElementById("ste").disabled = true;
                        document.getElementById("sc").disabled = true;

                        document.getElementById("suts").disabled = true;
                        document.getElementById("sute").disabled = true;
                        document.getElementById("suc").disabled = true;
                    } else {

                        errorAlert(response);

                    }
                }
            });
        });
    }
</script>