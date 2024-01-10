<?php
namespace App\Models;
use App\database\Connexion;
use PDO;
use PDOException;

class CategorieModel{
private $nom;
private $discription;
private $dat;
private Connexion $conn;
public function __construct(){
    $conn = new Connexion();
}
/*ajouter categorie*/
public function addCategorie(){
$sql= "INSERT INTO `categorie`(`nom`, `discription`, `dat`) VALUES ('?','?','?')";
$conn = $this->connect->getConnection();

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $this->nom, PDO::PARAM_STR);
    $stmt->bindParam(2, $this->discription, PDO::PARAM_STR);
    $stmt->bindParam(3, $this->dat, PDO::PARAM_STR);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
 /*select categorie*/
public function selectCategorie(){
    $sql="SELECT * FROM `categorie`";
    $conn = $this->connect->getConnection(); 
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
/*select categorie by id */
public function idCategorie(){
    $sql="SELECT * FROM `categorie` where `id`='?'";
    $conn = $this->connect->getConnection(); 
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    /*select categorie by date de creation recente*/
    public function dateCategorie()
    {
        $sql = "SELECT * FROM `categorie` ORDER BY `dat` DESC"; // Added ORDER BY for recent dates
        $conn = $this->connect->getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
/*apdate categorie*/
   public function updCategorie(){
    $sql= "UPDATE `categorie` SET `nom`='?',`discription`='?',`dat`='?'";
    $conn = $this->connect->getConnection();
   
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->nom, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->discription, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->dat, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    }

}