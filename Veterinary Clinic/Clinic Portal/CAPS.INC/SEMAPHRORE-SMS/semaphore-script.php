<script>
    const form = document.getQuerySelector('#messageForm');

    function sendMessage(event) {
        event.preventDefault();

        const apikey = document.getQuerySelector("#apiKey").value;
        const number = document.getQuerySelector("#number").value;
        const message = document.getQuerySelector("#message").value;
        const sendername = "DocLenonVetClinic";

        const parameters = {
            apikey: apikey,
            number: number,
            message: message,
            sendername: sendername,
        }

        fetch(
            'https://api.semaphore.co/api/v4/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(parameters)
            }
        ).then(
            response => response.text()
        ).then(
            output => console.log(output)
        ).catch(error => {
            console.log(error);
        });

        form.reset();
    }
</script>