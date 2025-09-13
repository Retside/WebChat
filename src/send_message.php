<?php
if ($_POST) {
    $username = trim($_POST['username']);
    $message = trim($_POST['message']);
    
    if (!empty($username) && !empty($message)) {
        
        $timestamp = date('H:i:s');
        $message_line = "[$timestamp] $username: $message\n";
        
        file_put_contents('messages.txt', $message_line, FILE_APPEND | LOCK_EX);
        
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>