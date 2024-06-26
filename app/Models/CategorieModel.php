<?php

namespace App\Models;

use App\database\Connexion;
use App\entities\Categorie;
use PDO;
use PDOException;

class CategorieModel
{
    private Connexion $conn;

    public function __construct()
    {
        $this->conn = new Connexion();
    }

    /* Add category */
    public function addCategorie(Categorie $categorie)
    {
        $sql = "INSERT INTO `categorie`(`nom`, `discription`, `dat`) VALUES (:nom, :discription, :dat)";
        $conn = $this->conn->getConnection();
    
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nom', $categorie->getName());
            $stmt->bindValue(':discription', $categorie->getDiscription());
            $stmt->bindValue(':dat', $categorie->getDat());
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    /* Select all categories */
    public function selectCategorie()
    {
        $sql = "SELECT * FROM `categorie`";
        $conn = $this->conn->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Select category by id */
    public function idCategorie($id)
    {
        $sql = "SELECT * FROM `categorie` WHERE `id`=?";
        $conn = $this->conn->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Select categories by recent creation date */
    public function dateCategorie()
    {
        $sql = "SELECT * FROM `categorie` ORDER BY `dat` DESC";
        $conn = $this->conn->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Update category */
    public function updCategorie(Categorie $categorie)
    {
        $sql = "UPDATE `categorie` SET `nom`=?, `discription`=?, `dat`=? WHERE `id`=?";
        $conn = $this->conn->getConnection();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nom', $categorie->getName());
            $stmt->bindValue(':discription', $categorie->getDiscription());
            $stmt->bindValue(':dat', $categorie->getDat());
     
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    //statistique
    public function countCategorie()
    {
        $sql = "SELECT COUNT(*) as categorie_count FROM `categorie`";
        $conn = $this->conn->getConnection();

        try {
            $stmt = $conn->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['categorie_count'];
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            throw new \Exception("Error counting categories: " . $e->getMessage());
        } finally {
            $stmt->closeCursor();
            $conn = null;
        }
    }



    /*Supprimer categorie*/
    public function deleteCategorie($categoryId)
    {
        $sql = "DELETE FROM `categorie` WHERE `id` = :categoryId";
        $conn = $this->conn->getConnection();
    
        try {
            //echo"deleted";
            //die();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            //echo"deleted";
            //die();
            $stmt->execute();
           // echo"deleted";
            die();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $stmt->closeCursor();
            $conn = null;
        }
    }
    

}

