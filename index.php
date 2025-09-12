<?php
    $messages_file = "messages.json";
    $messages_size = 50;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebChat</title>
</head>
<body>
    <h1>WebChat</h1>
    <h2>Messages</h2>
    <?php
    echo "$messages_size"; 
    ?>
    <div class="chatbox">
        <p>Повідомлення</p>
        <ul>
            <li>...</li>
            <li>...</li>
            <li>...</li>
        </ul>
    </div>

    <form method=post action=>
        <input type=text name=message placeholder="Повідомлення" value="">
        <button>Надіслати</button>    
    </form>

</html>