<?php


class Payment
{
    /**
     * @var Gateway
     */
    private $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function credit()
    {
        return $this->gateway->pay();
    }

}