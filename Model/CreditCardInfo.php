<?php

namespace Model;
class CreditCardInfo
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $cardNumber;

    /**
     * @var string
     */
    public $expirationDate;

    /**
     * @var string
     */
    public $cvv;

    /**
     * @var string
     */
    public $cardholderName;

    public function __construct($cardNumber, $expirationDate, $cvv, $cardholderName)
    {
        $this->cardNumber = $cardNumber;
        $this->expirationDate = $expirationDate;
        $this->cvv = $cvv;
        $this->cardholderName = $cardholderName;
    }
}