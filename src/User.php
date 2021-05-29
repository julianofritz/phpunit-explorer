<?php


class User
{
    public $name;

    public $email;

    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(string $email, string $message)
    {
        return $this->mailer->sendMessage($email, $message);
    }
}