<?php

namespace MVC\Controllers;

class Cafe extends \MVC\Core\Controller
{
    function Show()
    {
        $this->view('template', [
            'page' => 'CafePage'
        ]);
    }
}