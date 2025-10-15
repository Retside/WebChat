<?php
session_start();

$messages_file = 'messages.txt';
if (!file_exists($messages_file)) {
    file_put_contents($messages_file, '');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WebChat</title>
<style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #e0e0e0ff;
        }

        h1 {
            text-align: center;
            color: #2b2b2bff;
        }

        #messages {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
        }

        #username {
            max-width: 150px;
        }

        .message {
            background-color: #e9e9e9ff;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 10px;
            max-width: 70%;
            box-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        #chatForm {
            display: flex;
            padding: 10px;
            background-color: #d8d8d8ff;
        }

        input {
            margin-right: 10px;
            margin-left: 10px;
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            margin-left: 10px;
            padding: 10px 15px;
            border: none;
            background-color: #a7a7a7ff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #858585ff;
        }
    </style>
</head>
<body>
    <h1>WebChat</h1>
    
    <div id="messages">
    </div> 

    <form id="chatForm"> 
        <input type="text" id="username" placeholder="Ваше ім'я" required>
        <input type="text" id="message" placeholder="Повідомлення" required>
        <button type="submit">Надіслати</button>
    </form>

    <script src="src/webchat.js"></script>
</body>
</html>