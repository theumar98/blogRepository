<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{

    protected $modal;

    public function __construct()
    {
        $this->modal = new Order();
    }

    public function getAllOrders()
    {
        return $this->modal->all();
    }

    public function getOrderById($orderId)
    {
        return $this->modal->findOrFail($orderId);
    }

    public function deleteOrder($orderId)
    {
        $this->modal->destroy($orderId);
    }

    public function createOrder(array $orderDetails)
    {
        return $this->modal->create($orderDetails);
    }

    public function updateOrder($orderId, array $newDetails)
    {
        return $this->modal->whereId($orderId)->update($newDetails);
    }

    public function getFulfilledOrders()
    {
        return $this->modal->where('is_fulfilled', 1);
    }
    public function getDrOrders()
    {
        return $this->modal->where('client', 'like','%Dr%');
    }
}
