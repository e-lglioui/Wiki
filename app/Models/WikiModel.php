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
            GROUP BY wiki.id_wiki";

    $conn = $this->conn->getConnection();
    $stmt = $conn->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//update statue wiki
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


}
  

