<?php

require_once 'FileStorage.php';

class MessageHandler
{
    private FileStorage $storage;
    private int $maxMessages;
    

    // Конструктор
    public function __construct(string $messagesFile = 'messages.txt', int $maxMessages = 75)
    {
        $this->storage = new FileStorage($messagesFile);
        $this->maxMessages = $maxMessages;
    }
    
    // Відправка повідомлення
    public function sendMessage(string $username, string $message): bool
    {
        $username = trim($username);
        $message = trim($message);
        
        if (empty($username) || empty($message)) {
            return false;
        }
        
        $timestamp = date('H:i:s');
        $messageLine = "[$timestamp] $username: $message\n";
        
        return $this->storage->saveMessage($messageLine);
    }
    
    // Отримання повідомлень
    public function getMessages(): string
    {
        $lines = $this->storage->getMessages($this->maxMessages);
        
        if (empty($lines)) {
            return "<div>Поки що немає повідомлень...</div>";
        }
        
        $html = '';
        foreach ($lines as $line) {
            if (!empty($line)) {
                $html .= "<div class='message'>" . htmlspecialchars($line) . "</div>";
            }
        }
        
        return $html ?: "<div>Поки що немає повідомлень...</div>";
    }
}
?>