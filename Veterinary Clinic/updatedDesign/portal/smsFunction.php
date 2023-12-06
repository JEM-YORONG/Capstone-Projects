<script>
// today and upcoming SMS
        function smsSend() {
            const accountSid = 'AC68cb6727c28048ac5888969757c82353';
            const authToken = '7d8fab558404da713ecb0a6a092f8714';

            const url = 'https://api.twilio.com/2010-04-01/Accounts/' + accountSid + '/Messages.json';

            const message = document.getElementById("smsMessage").value;

            const filtered = "-------------------------------------------------------------------------------------------------------------------" + message;

            const body = new URLSearchParams();
            body.append('To', '+639217214912');
            body.append('From', '+12674332907');
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