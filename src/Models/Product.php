<?php

namespace MVC\Models;

use PDO;
use MVC\Core\PDOFactory;

class Product
{
    private $pdo;
    private $table_name = 'products';
    private $id;
    private $name;
    private $type;
    private $des;
    private $price;
    private $image_path;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDes()
    {
        return $this->des;
    }

    public function setDes($des): self
    {
        $this->des = $des;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getImage_path()
    {
        return $this->image_path;
    }

    public function setImage_path($image_path): self
    {
        $this->image_path = $image_path;
        return $this;
    }

    public function __construct()
    {
        $this->pdo = PDOFactory::create();
    }

    public function fillFromDB($product)
    {
        [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->des,
            'price' => $this->price,
            'image_path' => $this->image_path
        ] = $product;

        return $this;
    }

    public function getAllProducts()
    {
        $products = [];

        $statement = PDOFactory::create()->prepare('select * from products');
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product();
            $product->fillFromDB($row);
            $products[] = $product;
        }
        return $products;
    }

    public function getProductById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table_name} WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = new Product();
        $product->fillFromDB($stmt->fetch(PDO::FETCH_ASSOC));
        return $product;
    }

    public function addProduct($name, $type, $description, $price, $image_path)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table_name} (name,type, description, price, image_path) VALUES (:name,:type, :description, :price, :image_path)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_path', $image_path);
        return $stmt->execute();
    }

    public function addSelfProduct()
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table_name} (name,type, description, price, image_path) VALUES (:name,:type, :description, :price, :image_path)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':type', $this->name);
        $stmt->bindParam(':description', $this->des);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':image_path', $this->image_path);
        return $stmt->execute();
    }

    public function updateProduct($id, $name, $type, $description, $price, $image_path)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->table_name} SET name=:name, type=:type , description=:description, price=:price, image_path=:image_path WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_path', $image_path);
        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table_name} WHERE id=:id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


}