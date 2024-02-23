<?php

namespace Model\Product;

class ProductPrice
{
    /**
     * @var int
     */
    public $productId;

    /**
     * @var float
     */
    public $price;

    public function __construct(int $productId, float $price)
    {
        $this->productId = $productId;
        $this->price = $price;
    }
}