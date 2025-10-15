<?php

require_once 'MessageHandler.php';

$messageHandler = new MessageHandler('messages.txt', 75);

if ($_POST) {
    $username = trim($_POST['username']);
    $message = trim($_POST['message']);

    if ($messageHandler->sendMessage($username, $message)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>