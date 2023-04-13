<?php

namespace MVC\Models;

use PDO;
use MVC\Core\PDOFactory;

class Order
{
    private $pdo;
    private $id;
    private $user_id;

    public function __construct()
    {
        $this->pdo = PDOFactory::create();
    }

    function getOrderById($id)
    {
        
    }

	public function getId() {
		return $this->id;
	}
	
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	public function getUser_id() {
		return $this->user_id;
	}
	
	public function setUser_id($user_id): self {
		$this->user_id = $user_id;
		return $this;
	}
}