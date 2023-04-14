<?php

namespace MVC\Controllers;

use MVC\Models\Product;

class Admin extends \MVC\Core\Controller
{
    private $product;
    private $user;
    private $other;

    function Show()
    {
        $this->view('dashboard', []);
    }

    function ShowF($page)
    {
        $this->view('dashboard', [
            'page' => $page
        ]);
    }


    function addProduct($name, $type, $price, $des, $image_path)
    {
        $this->product = new Product();
        $this->product->addProduct($name, $type, $price, $des, $image_path);
        echo (1);
    }

    public function fillFromForm()
    {
        if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image'])) {
            // Get user input and upload image file
            $name = $_POST['name'];
            echo $_POST['name'];
            echo $_POST['type'];
            echo $_POST['description'];
            echo $_POST['price'];
            echo $_POST['image_path'];
            var_dump(1);
            die();
            $type = $_POST['type'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image_path = uploadImage($_FILES['image']);
            // Add new product to database
            $this->product = new Product();
            $this->product->addProduct($name, $type, $price, $des, $image_path);
        }
        
    }

}