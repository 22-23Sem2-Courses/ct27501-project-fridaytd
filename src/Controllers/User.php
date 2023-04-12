<?php
namespace MVC\Controllers;

class User extends \MVC\Core\Controller
{
    public function Profile()
    {
        $this->view('dashboard', []);
    }
}