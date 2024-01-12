<?php

namespace App\Controllers;

use Core\View; 
use App\Models\CategorieModel;
use  App\Models\TagModel;
use  App\Models\WikiModel;
use  App\entities\Categorie;
use  App\entities\Tag;
use  App\entities\Wiki;
class AdminController
{

    use View; 
    private TagModel $Tag;
    private CategorieModel $Categorie;
    public function admin()
    {
       
        try {

            $categorieModel = new CategorieModel();
            $categories = $categorieModel->selectCategorie();

            $tagModel = new TagModel();
            $tags = $tagModel->selectTag();
            $wikiModel = new WikiModel();
            $wikis = $wikiModel->selectWikiByStatue(0);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['submitCategorie'])) {
                    $this-> addCategorie();
                }else if(isset($_POST['submitTag'])){
                    $this-> addTag();
                }
            }

            $view = 'admin'; 
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


    public function addCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $this->validation($_POST['titre']);
            $discription = $this->validation($_POST['description']);
            $dat = date('Y-m-d'); 
    
            $CategorieModel = new CategorieModel();
            $categorie = new Categorie($name, $discription, $dat);
            $CategorieModel->addCategorie($categorie);
        }
    }
    
    public function addTag(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $this->validation($_POST['titre']);
            $TagModel = new TagModel();
            $Tag = new Tag($titre);
            $TagModel->addTag($Tag);
        }
    }
    
    


    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

}