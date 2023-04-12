<?php

namespace MVC\Controllers;

class Tea extends \MVC\Core\Controller
{
    function Show()
    {
        $this->view('template', [
            'page' => 'TeaPage'
        ]);
    }
}