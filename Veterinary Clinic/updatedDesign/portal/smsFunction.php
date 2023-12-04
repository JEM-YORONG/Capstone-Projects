<script>
// today and upcoming SMS
        function smsSend() {
            const accountSid = 'AC20c0069aebe8d5850e8ca0d0c4898f5e';
            const authToken = '385012cf27dde80e524389e5381ad5f4';

            const url = 'https://api.twilio.com/2010-04-01/Accounts/' + accountSid + '/Messages.json';

            const message = document.getElementById("smsMessage").value;

            const filtered = "-------------------------------------------------------------------------------------------------------------------" + message;

            const body = new URLSearchParams();
            body.append('To', '+639217214912');
            body.append('From', '+12059007971');
            body.append('Body', filtered);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': 'Basic ' + btoa(accountSid + ':' + authToken)
                    },
                    body: body
                })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        }
</script>