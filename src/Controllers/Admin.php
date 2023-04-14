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


}