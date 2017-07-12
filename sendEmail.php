<?php

switch($_SERVER['REQUEST_METHOD']){
    case("OPTIONS"): //Allow preflighting to take place.
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: content-type");
        exit;
    case("POST"): //Send the email;
        header("Access-Control-Allow-Origin: *");

        $json = file_get_contents('php://input');

        $params = json_decode($json);

        $email = $params->email;
        $name = $params->name;
        $phone = $params->phone;
        $message = $params->message;

        $mail_message = "U heeft volgend bericht ontvangen van " . $name . "\n \n";
        $mail_message .= $message . "\n \n";
        $mail_message .= "Gegevens afzender: \n";
        $mail_message .= "Naam: " . $name . "\n" . "E-mail: " . $email . "\n" . "Telefoonnummer: " . $phone ;

        $recipient = 'miagijbels@hotmail.com';
        $subject = 'Zicht op Bilzen: reservatie';
        $headers = "From: $name <$email>";

        mail($recipient, $subject, $mail_message, $headers);
        break;
    default: //Reject any non POST or OPTIONS requests.
        header("Allow: POST", true, 405);
        exit;
}
