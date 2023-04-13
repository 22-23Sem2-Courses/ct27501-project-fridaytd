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

    function addProduct() {
        $this->product = new Product();
        $this->product->addProduct('O Long', 'tea', 'mot loai tra ngon', 50, 'olong.png');
        echo(1);
    }

	
}
