<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/MessageHandler.php';

class MessageHandlerTest extends TestCase
{
    private string $testFile = 'test_messages.txt';
    private MessageHandler $handler;

    protected function setUp(): void
    {
        if (file_exists($this->testFile)) {
            unlink($this->testFile);
        }
        $this->handler = new MessageHandler($this->testFile, 75);
    }

    protected function tearDown(): void
    {
        if (file_exists($this->testFile)) {
            unlink($this->testFile);
        }
    }

    // ТЕСТ 1: Валідне повідомлення
    public function testSendValidMessage(): void
    {
        $result = $this->handler->sendMessage('Діма', 'Привіт!');
        
        $this->assertTrue($result);
        
        $content = file_get_contents($this->testFile);
        $this->assertStringContainsString('Діма', $content);
        $this->assertStringContainsString('Привіт!', $content);
    }

    // ТЕСТ 2: Порожні дані
    public function testRejectEmptyMessage(): void
    {
        $result1 = $this->handler->sendMessage('', 'Текст');
        $this->assertFalse($result1);
        
        $result2 = $this->handler->sendMessage('Софія', '');
        $this->assertFalse($result2);
    }
}