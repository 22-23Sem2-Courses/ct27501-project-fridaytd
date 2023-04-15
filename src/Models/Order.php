<?php

namespace MVC\Models;

use PDO;
use MVC\Core\PDOFactory;

class Order
{
	private $pdo;
	private $order_id;
	private $customer_id;
	private $status;
	private $address;


	public function __construct()
	{
		$this->pdo = PDOFactory::create();
	}

	function getOrderById($id)
	{

	}

	public function getId()
	{
		return $this->order_id;
	}

	public function setId($id): self
	{
		$this->order_id = $id;
		return $this;
	}

	public function getUser_id()
	{
		return $this->customer_id;
	}

	public function setUser_id($user_id): self
	{
		$this->customer_id = $user_id;
		return $this;
	}

	public function getOrderInfor()
	{
		return [
			'order_id' => $this->order_id,
			'customer_id' => $this->customer_id,
			'status' => $this->status,
			'address' => $this->address
		];
	}

	public function fill($order)
	{
		[
			'customer_id' => $this->customer_id,
			'address' => $this->address
		] = $order;

		return $this;
	}

	public function fillFromDB($order)
	{
		[
			'order_id' => $this->order_id,
			'customer_id' => $this->customer_id,
			'status' => $this->status,
			'address' => $this->address
		] = $order;

		return $this;
	}

	public function save()
	{
		$statement = $this->pdo->prepare("INSERT INTO orders(customer_id, address) VALUES(:customer_id, :address)");
		$statement->execute([
			'customer_id' => $this->customer_id,
			'address' => $this->address
		]);
		$this->order_id = $this->pdo->lastInsertId();
		return $this;
	}

}