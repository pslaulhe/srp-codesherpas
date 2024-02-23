<?php

namespace Model;
class Order
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $customerId;

    /**
     * @var array
     */
    public $productQuantities;

    /**
     * @var Address
     */
    public $shippingAddress;

    public function __construct($customerId, array $productQuantities, Address $shippingAddress)
    {
        $this->customerId = $customerId;
        $this->productQuantities = $productQuantities;
        $this->shippingAddress = $shippingAddress;
    }

    public function addProducts(array $productQuantities)
    {
        $this->productQuantities = $productQuantities;
    }
}