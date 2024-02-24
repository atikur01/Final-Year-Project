<?php

class MailSender {
    # private static $apiUrl ="http://localhost:3000/send-email";

    private static $apiUrl ="http://atikapps.com:3000/send-email";

    public static function sendMail($subject, $message, $to) {
        $data = [
            'subject' => $subject,
            'plainText' => $message,
            'toAddress' => $to,
        ];

        $jsonData = json_encode($data);

        $ch = curl_init(self::$apiUrl); //Client URL Library.

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}



?>
