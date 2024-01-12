<?php
namespace App\database;
use PDO;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); // Adjust the path as needed
$dotenv->load();

class Connexion{

private $pdo;


public function __construct()
    {
         $host = $_ENV['DB_HOST'];
         $dbname = $_ENV['DB_NAME'];
         $username = $_ENV['DB_USER'];
         $mot_pass = $_ENV['DB_PASSWORD'];
    
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $mot_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    
    public function getConnection()
    {
        return $this->pdo;
    }
}
//$conn=new Connexion();
//$conn->getConnection();
