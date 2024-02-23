<?php

namespace Model\Product;

class ProductStock
{
    /**
     * @var int
     */
    public $productId;

    /**
     * @var int
     */
    public $stock;

    public function __construct(int $productId, int $stock)
    {
        $this->productId = $productId;
        $this->stock = $stock;
    }
}