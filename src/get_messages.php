<?php
$messages_file = 'messages.txt';

if (file_exists($messages_file)) {
    $messages = file_get_contents($messages_file);
    
    if (!empty($messages)) {
        // Розбиваємо на рядки та виводимо кожне повідомлення в окремому div
        $lines = explode("\n", trim($messages));
        
        // Показуємо тільки останні 50 повідомлень
        $lines = array_slice($lines, -50);
        
        foreach ($lines as $line) {
            if (!empty($line)) {
                echo "<div>" . htmlspecialchars($line) . "</div>";
            }
        }
    } else {
        echo "<div>Поки що немає повідомлень...</div>";
    }
} else {
    echo "<div>Поки що немає повідомлень...</div>";
}
?>