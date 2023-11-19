<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sms sender</title>
</head>

<body>
    <form id="messageForm">
        <label for="apiKey">API Key</label>
        <input type="text" id="apiKey" require>
        <label for="number">Number</label>
        <input type="number" id="number">
        <label for="sender">Sender Name</label>
        <input type="text" id="sender">
        <label for="message"></label>
        <textarea id="message" cols="30" rows="5"></textarea>
        <button type="submit">Send Message</button>
    </form>

    <?php require 'semaphore-script.php'; ?>
</body>

</html>