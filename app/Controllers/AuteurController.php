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
        session_start(); // Start the session

        $categorieModel = new CategorieModel();
        $categories = $categorieModel->selectCategorie();

        $tagModel = new TagModel();
        $tags = $tagModel->selectTag();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['ajouterwiki'])) {
                $this->ajouterWiki();
            }
        }

        try {
            $view = 'auteur'; 
            $params = [
                'categories' => $categories,
                'tags' => $tags,
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
    
            // Check if the file was uploaded successfully
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $imgData = file_get_contents($_FILES['image']['tmp_name']);
    
                $WikiModel = new WikiModel();
                $Wiki = new Wiki($titre, $contenu, $dat, $id_categorie, $id_user, $imgData);
                $WikiModel->addWiki($Wiki, $tagIds);
            } else {
                // Handle the file upload error
                echo "Error uploading file: " . $_FILES['image']['error'];
            }
        }
    }
    

    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
