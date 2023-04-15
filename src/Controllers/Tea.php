<?php

namespace MVC\Controllers;

class Tea extends \MVC\Core\Controller
{
    function Show()
    {
        $model = $this->model('Product');
        $products = $model->getAllProducts();
        var_dump($products);
        foreach ($model->getAllProducts() as $product) {
            if ($product['type'] === 'tea') {
                $products[] = $product;
            }
        }
        $this->view('template', [
            'page' => 'Tea',
            'products' => $products
        ]);
    }
}