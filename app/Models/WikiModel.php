<?php
namespace App\Models;

use App\database\Connexion;
use App\entities\Wiki;
use PDO;
use PDOException;

class WikiModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Connexion();
    }
    public function addWiki(Wiki $wiki, $tagIds)
    {
        $sql = "INSERT INTO `wiki`(`titre`, `contenu`, `datecreation`, `id_categorie`, `id_users`, `img_data`) VALUES (:titre, :contenu, :datecreation, :id_categorie, :id_users, :img_data)";
        $conn = $this->conn->getConnection();

        try {
            $conn->beginTransaction();

            $stmt = $conn->prepare($sql);
            $titre = $wiki->getTitre();
            $contenu = $wiki->getContenu();
            $datecreation = $wiki->getDateCreation();
            $id_categorie = $wiki->getIdCategorie();
            $id_users = $wiki->getIdUsers();
    
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':datecreation', $datecreation);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->bindParam(':id_users', $id_users);
            $imgData = $wiki->getImgData();
            $stmt->bindParam(':img_data', $imgData, PDO::PARAM_LOB);
            $stmt->execute();
            $wikiId = $conn->lastInsertId();
    
            $this->insertTags($wikiId, $tagIds);
    
            $conn->commit();
        } catch (PDOException $e) {
            $conn->rollBack();
            throw new Exception("Error adding Wiki: " . $e->getMessage());
        }
    }
    
    private function insertTags($wikiId, $tagIds)
    {
        $sql = "INSERT INTO `tagwiki`(`id_wiki`, `id_tag`) VALUES (:id_wiki, :id_tag)";
        $conn = $this->conn->getConnection();

        try {
            $stmt = $conn->prepare($sql);

            foreach ($tagIds as $tagId) {
                $stmt->bindParam(':id_wiki', $wikiId);
                $stmt->bindParam(':id_tag', $tagId);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

  

    public function selectWikiByStatue($statue)
    {
        $sql = "SELECT wiki.id_wiki, wiki.titre, wiki.contenu, wiki.datecreation, wiki.img_data, wiki.id_categorie, wiki.id_users, wiki.statue, categorie.nom AS categorie, users.nom AS user_name, GROUP_CONCAT(tag.titre) AS tags
                FROM wiki
                  LEFT JOIN categorie ON wiki.id_categorie = categorie.id
                LEFT JOIN users ON wiki.id_users = users.id_user
                LEFT JOIN tagwiki ON wiki.id_wiki = tagwiki.id_wiki
                   LEFT JOIN tag ON tagwiki.id_tag = tag.id
                WHERE wiki.statue = $statue
                       GROUP BY wiki.id_wiki
                ORDER BY wiki.id_wiki DESC"; 
    
        $conn = $this->conn->getConnection();
        $stmt = $conn->query($sql);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

// Select wiki by user id
public function selectWikiByuser($id_users) {
    $sql = "SELECT wiki.id_wiki, wiki.titre, wiki.contenu, wiki.datecreation, wiki.img_data, wiki.id_categorie, wiki.id_users, wiki.statue, categorie.nom AS categorie, users.nom AS user_name, GROUP_CONCAT(tag.titre) AS tags
    FROM wiki
     LEFT JOIN categorie ON wiki.id_categorie = categorie.id
    LEFT JOIN users ON wiki.id_users = users.id_user
      LEFT JOIN tagwiki ON wiki.id_wiki = tagwiki.id_wiki
    LEFT JOIN tag ON tagwiki.id_tag = tag.id
    WHERE wiki.id_users = :id_users
    GROUP BY wiki.id_wiki
    ORDER BY wiki.id_wiki DESC"; 

    $conn = $this->conn->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_users', $id_users, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//update statue wiki archiver
public function updateWikiStatue($wikiId, $statue)
{
    $sql = "UPDATE `wiki` SET `statue` = :statue WHERE `id_wiki` = :wikiId";
    $conn = $this->conn->getConnection();

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':wikiId', $wikiId);
        $stmt->bindParam(':statue', $statue, PDO::PARAM_BOOL);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
// search wiki by titre
public function searchWiki($titre){
    
    $sql = "SELECT * FROM `wiki` WHERE `titre`=:titre AND `statue`=1";
    $conn = $this->conn->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//suprimmer tagwik
public function deleteTagwikiRecords($wikiId)
{
    $sql = "DELETE FROM `tagwiki` WHERE `id_wiki` = :wikiId";
    $conn = $this->conn->getConnection();

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':wikiId', $wikiId, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error deleting tagwiki records: " . $e->getMessage();
    } finally {
        $stmt->closeCursor();
        $conn = null;
    }
}

//supprimer wiki
public function deleteWiki($wikiId)
{
    $sql = "DELETE FROM `wiki` WHERE `id_wiki` = :wikiId";
    $conn = $this->conn->getConnection();

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':wikiId', $wikiId, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt->closeCursor();
        $conn = null;
    }
}

public function updateWiki($wikiId, $updatedTitre)
{
    $sql = "UPDATE `wiki` SET `titre` = :updatedTitre WHERE `id_wiki` = :wikiId";
    $conn = $this->conn->getConnection();
  
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':wikiId', $wikiId, PDO::PARAM_INT);
        $stmt->bindParam(':updatedTitre', $updatedTitre);
        //var_dump($stmt);
        //die();
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating wiki: " . $e->getMessage();
    } finally {
        $stmt->closeCursor();
        $conn = null;
    }
}

  //statistiques
  public function countWiki()
  {
      $sql = "SELECT COUNT(*) as wiki_count FROM wiki";
      $conn = $this->conn->getConnection();

      try {
          $stmt = $conn->query($sql);
          $result = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($result) {
              return $result['wiki_count'];
          } else {
              return 0;
          }
      } catch (PDOException $e) {
          throw new \Exception("Error counting wikis: " . $e->getMessage());
      } finally {
          $stmt->closeCursor();
          $conn = null;
      }
  }

}
 

