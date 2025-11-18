<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('send_telegram')) {
    function send_telegram($message) {
        $token = '7595407434:AAFuYn_jsbcvwcfQVniyetRZ1PHZCg-Ha3g'; // Ganti dengan token bot Anda
        $chat_id = '-4823774358'; // Ganti dengan chat ID Anda

        $text = urlencode($message);
        $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$text}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        curl_close($ch);
    }
}
