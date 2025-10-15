<?php

// Те саме було б і MessageHandler робити але хай буде окремий клас для роботи з файлом для діаграми
class FileStorage{
    private string $filename;

    public function __construct(string $filename = 'messages.txt') {
        $this->filename = $filename;

        if (!file_exists($this->filename)) {
            file_put_contents($this->filename, '');
        }
    }

    public function saveMessage(string $message): bool {
        $result = file_put_contents($this->filename, $message, FILE_APPEND | LOCK_EX);
        return $result !== false;
    }

    public function getMessages(int $maxMessages = 75): array {
        if (!file_exists($this->filename)) {
            return [];
        }

        $content = file_get_contents($this->filename);

        if (empty($content)) {
            return [];
        }

        $lines = explode("\n", trim($content));
        return array_slice($lines, -$maxMessages);
    }
}