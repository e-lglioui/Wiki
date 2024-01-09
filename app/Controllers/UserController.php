<?php
namespace App\Controllers;

use App\database\Connexion;

class UserController {
    public static function test() {
        echo "working";
        $conn = new Connexion();
        $pdo = $conn->getConnection();
    }
}
