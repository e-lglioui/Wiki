<?php
namespace App\Models;
use App\database\Connexion;
use PDO;
use PDOException;

class TagModel{
private $titre;
private Connexion $conn;
public function __construct(){
    $conn = new Connexion();
}
/*ajouter Tag*/
public function addTag(){
$sql= "INSERT INTO `tag`(`titre`) VALUES ('?')";
$conn = $this->connect->getConnection();

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $this->titre, PDO::PARAM_STR);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
 /*select Tag*/
public function selectTag(){
    $sql="SELECT * FROM `tag`";
    $conn = $this->connect->getConnection(); 
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
/*select tag by id */
public function idTag(){
    $sql="SELECT * FROM `tag` where `id`='?'";
    $conn = $this->connect->getConnection(); 
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
/*apdate tag*/
public function updCategorie(){
    $sql= "UPDATE `tag` SET `titre`='?'";
    $conn = $this->connect->getConnection();
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->titre, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    }

}