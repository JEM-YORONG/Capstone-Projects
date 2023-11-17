<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

function send($number, $message)
{
    $sid    = "AC49fba0b65605b2a656902f4b634a0c20";
    $token  = "82d26e7488f5f139e2e229d937ebf64a";
    $twilioNumber = "+12566935328";

    $twilio = new Client($sid, $token);

    // Send an SMS message
    try {
        $message = $twilio->messages->create(
            $number, // Recipient phone number
            array(
                "from" => $twilioNumber, // Your Twilio phone number
                "body" => $message
            )
        );

        echo "Message sent successfully";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
