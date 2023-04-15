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
        
        // die();
        if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image_path'])) {
            // var_dump($_POST['name']);
            // var_dump($_POST['type']);
            // var_dump($_POST['description']);
            // var_dump($_POST['price']);
            // var_dump($_POST['image_path']);
            // Get user input and upload image file
            $name = $_POST['name'];
            $type = $_POST['type'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image_path = $_POST['image_path'];
            // Add new product to database
            $this->addProduct($name, $type, $price, $image_path, $description);
            header('Location: ' . '/Admin/ShowF/AddProduct');
        }

    }

}