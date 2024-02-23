<?php

namespace Model;
class Address
{
    /**
     * @var mixed
     */
    public $country;

    /**
     * @var mixed
     */
    public $zipCode;

    /**
     * @var mixed
     */
    public $street;

    /**
     * @var mixed
     */
    public $number;

    public function __construct($country, $zipCode, $street, $number)
    {
        $this->country = $country;
        $this->zipCode = $zipCode;
        $this->street = $street;
        $this->number = $number;
    }
}