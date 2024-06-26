<?php

namespace App\Controllers;

use Core\View; 
use App\Models\CategorieModel;
use App\Models\TagModel;
use App\Models\WikiModel;
use App\entities\Wiki;
use App\Controllers\UserController;

class AuteurController
{
    use View;
    private WikiModel $wik;

    public function auteur()
    {
       

        $categorieModel = new CategorieModel();
        $categories = $categorieModel->selectCategorie();

        $tagModel = new TagModel();
        $tags = $tagModel->selectTag();
        $wikiModel = new WikiModel();
        $wikis = $wikiModel->selectWikiByuser($_SESSION['userId']);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['ajouterwiki'])) {
                $this->ajouterWiki();
            } else if (isset($_POST['deleteWiki'])) {
                $wikiId = $_POST['wikiId'];
                $this->deleteWiki($wikiId);
        }
        else if (isset($_POST['updateWiki'])) {
            $wikiId = $_POST['wikiId']; 
            $this->updateWiki($wikiId);
        }}

        try {
            $view = 'auteur'; 
            $params = [
                'categories' => $categories,
                'tags' => $tags,
                'wikis' => $wikis,
            ];

            $this->render($view, $params);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function ajouterWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $this->validation($_POST['titre']);
            $contenu = $this->validation($_POST['contenu']);
            $id_categorie = $this->validation($_POST['categorie']);
            $dat = date('Y-m-d');
            $id_user = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
            $tagIds = isset($_POST['tags']) ? $_POST['tags'] : [];
    
            
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $imgData = file_get_contents($_FILES['image']['tmp_name']);
    
                $WikiModel = new WikiModel();
                $Wiki = new Wiki($titre, $contenu, $dat, $id_categorie, $id_user, $imgData);
                $WikiModel->addWiki($Wiki, $tagIds);
            } else {
                
                echo "Error uploading file: " . $_FILES['image']['error'];
            }
        }
    }
    
    public function deleteWiki($wikiId)
    {
        $wikiModel = new WikiModel();
        $wikiModel->deleteTagwikiRecords($wikiId); 
        $wikiModel->deleteWiki($wikiId);
    }
    
    public function updateWiki($wikiId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedTitre = $this->validation($_POST['updateTitre']);
            $wikiModel = new WikiModel();
            $wikiModel->updateWiki($wikiId, $updatedTitre);
        }
    }




    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
