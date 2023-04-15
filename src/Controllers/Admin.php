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
        if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image'])) {
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

            $target_dir = '../public/images/Uploads/';

            $filename_with_ext = $_FILES["image"]["name"]; // Tên tệp tin có phần mở rộng
            $filename_without_ext = pathinfo($filename_with_ext, PATHINFO_FILENAME); // Tên tệp tin không có phần mở rộng
            $file_extension = pathinfo($filename_with_ext, PATHINFO_EXTENSION); // Phần mở rộng của tệp tin
            $new_filename = $filename_without_ext . '_' . date("Y-m-d_H-i-s") . '.' . $file_extension; // Tạo tên tệp tin mới

            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $new_filename);
            $image_path = '/images/Uploads/' . $new_filename;
            // Add new product to database
            $this->addProduct($name, $type, $price, $image_path, $description);
            header('Location: ' . '/Admin/ShowF/AddProduct');
        }

    }

}