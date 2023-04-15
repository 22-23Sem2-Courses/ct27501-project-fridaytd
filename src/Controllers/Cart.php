<?php

namespace MVC\Controllers;

class Cart extends \MVC\Core\Controller
{

    public function Show()
    {
        $this->view('template', [
            'page' => 'Cart'
        ]);
    }
}