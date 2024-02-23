<?php

use Model\Address;
use Model\CreditCardInfo;
use Model\Order;
use Model\Product\ProductPrice;
use Model\Product\ProductStock;

class confirmCheckout
{
    public function confirmCheckout($customerId, $customerEmailAddress, Address $shippingAddress, CreditCardInfo $creditCardInfo, array $productQuantities)
    {
        $order = new Order($customerId, $productQuantities, $shippingAddress);

        $totalPrice = $this->getTotalPrice($productQuantities);

        $this->paymentProvider->charge($creditCardInfo, $totalPrice);
        $this->invoicingProvider->purchaseCompleted($order->id, $customerEmailAddress, 'Your order has been placed');
        $this->shippingProvider->ship($order);

        $this->orderRepository->save($order);
    }

    /**
     * @param array $productQuantities
     * @return void
     * @throws Exception
     */
    public function getTotalPrice(array $productQuantities) : float
    {
        $totalPrice = 0;
        foreach ($productQuantities as $productQuantity) {
            /* @var $productPrice ProductPrice */
            $productPrice = $this->pricingService->getProductPrice($productQuantity['productId']);

            $this->checkProductStock($productQuantity);

            $totalPrice += $productPrice * $productQuantity['quantity'];
        }

        return $totalPrice;
    }

    /**
     * @param $productQuantity
     * @return void
     * @throws Exception
     */
    public function checkProductStock($productQuantity)
    {
        /* @var $productPrice ProductStock */
        $productStock = $this->stockService->getProductStock($productQuantity['productId']);
        if ($productStock->stock < $productQuantity['quantity']) {
            throw new \Exception('Not enough stock for product ' . $productQuantity['productId']);
        }
    }
}