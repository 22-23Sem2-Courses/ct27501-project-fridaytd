<?php

namespace MVC\Models;

use \MVC\Core\PDOFactory;

class Order_Items
{
    private $pdo;
    private $id;
    private $order_id;
    private $product_id;
    private $quantity;

    public function __construct()
    {
        $this->pdo = PDOFactory::create();
    }

    public function getOrderItemsInfor()
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ];
    }

    public function fill($data)
    {
        [
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ] = $data;

        return $this;
    }

    public function fillFormDB($order_items)
    {
        [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ] = $order_items;

        return $this;
    }

    public function save()
    {
        $statement = $this->pdo->prepare("INSERT INTO order_items(order_id, product_id, quantity) VALUES(:order_id, :product_id, :quantity)");
        $statement->execute([
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ]);
        return $this;
    }
}