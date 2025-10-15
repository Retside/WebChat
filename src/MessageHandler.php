<?php
class MessageHandler {
    private $messagesFile = 'messages.txt';
    private $maxMessages = 75;

    //Конструктор

    public function __construct(string $messageFile = 'messages.txt', int $maxMessages = 75) {
        $this->messagesFile = $messageFile;
        $this->maxMessages = $maxMessages;

        if (!file_exists($this->messagesFile)) {
            file_put_contents($this->messagesFile, '');
        }
    }

    // Відправка повідомлення (на основі send_message.php)

    public function sendMessage(string $username, string $message) : bool {

        $username = trim($username);
        $message = trim($message);

        if (empty($username) || empty($message)) {
            return false;
        }

        $timestamp = date('H:i:s');

        $message_line = "[$timestamp] $username: $message\n";

        $result = file_put_contents($this->messagesFile, $message_line, FILE_APPEND | LOCK_EX);
        return $result !== false;

    }


    // Отримання повідомлень (на основі get_messages.php)
    public function getMessages() : string{
        if (!file_exists($this->messagesFile)) {
            return "<div>Поки що немає повідомлень...</div>";
        }

        $messages = file_get_contents($this->messagesFile);

        if (empty($messages)) {
            return "<div>Поки що немає повідомлень...</div>";
        }

        $lines = explode("\n", trim($messages));
        $lines = array_slice($lines, -$this->maxMessages);

        $html = '';
        foreach ($lines as $line) {
            if (!empty($line)) {
                $html .= "<div class='message'>" . htmlspecialchars($line) . "</div>";
            }
        }
        return $html;
    }

}