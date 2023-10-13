<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$sid    = "AC49fba0b65605b2a656902f4b634a0c20";
$token  = "011d22c217b509434e35ca95cc5021d5";
$twilioNumber = "+12566935328";
$verifiedNumber = "+639217214912";

function send($number, $message)
{
    $sid    = "AC49fba0b65605b2a656902f4b634a0c20";
    $token  = "011d22c217b509434e35ca95cc5021d5";
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
        //echo "Error: " . $e->getMessage();
    }
}

function sendinventory($message)
{
    global $sid;
    global $token;
    global $twilioNumber;
    global $verifiedNumber;

    $twilio = new Client($sid, $token);

    // Send an SMS message
    try {
        $message = $twilio->messages->create(
            $verifiedNumber, // Recipient phone number
            array(
                "from" => $twilioNumber, // Your Twilio phone number
                "body" => $message
            )
        );

        //echo "Message sent successfully";
    } catch (Exception $e) {
        //echo "Error: " . $e->getMessage();
    }
}
