<?php
namespace App\Controllers;

class HomeController{

    public function showHome(){
        require __DIR__ . '/../Views/homePage.php';
    }
}