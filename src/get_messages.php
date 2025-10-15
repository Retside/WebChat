<?php

require_once 'MessageHandler.php';

$messageHandler = new MessageHandler('messages.txt', 75);

echo $messageHandler->getMessages();
?>