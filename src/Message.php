<?php

// Це типу для діагрми з класами... +- так треба щоб було але він звісно ніде не використовується але пофіг
class Message {
    private $username;
    private $message;
    private $timestamp;

    public function __construct($username, $message) {
        $this->username = $username;
        $this->message = $message;
        $this->timestamp = time();
    }

    public function getUsername() {
        return $this->username;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }
}
?>