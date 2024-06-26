<?php

namespace App\Controllers;

use Core\View; 
use App\Models\CategorieModel;
use  App\Models\TagModel;
use  App\Models\WikiModel;
use  App\Models\UserModel;
use  App\entities\Categorie;
use  App\entities\Tag;
use  App\entities\Wiki;

class AdminController
{
    use View; 
    private TagModel $Tag;
    private CategorieModel $Categorie;
    private UserModel $userModel;
    
    public function admin()
    {
       
        try {

            $categorieModel = new CategorieModel();
            $categories = $categorieModel->selectCategorie();
            $catsta=$categorieModel->countCategorie(); 
        
            $tagModel = new TagModel();
            $tags = $tagModel->selectTag();
            $tagsta=$tagModel->countTag(); 

            $wikiModel = new WikiModel();
            $wikis = $wikiModel->selectWikiByStatue(0);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['submitCategorie'])) {
                    $this-> addCategorie();
                }else if(isset($_POST['submitTag'])){
                    $this-> addTag();
                }else if(isset($_POST['Disarchiver'])){
                    $this->disarchiverWiki();
                }else if(isset($_POST['supteTag'])){
                    $this-> deleteTag();
                } else if (isset($_POST['deleteCategorie'])) {
                    $this->deleteCategorie();
                }
            }

            $view = 'admin'; 
            $params = [
                'categories' => $categories,
                'tags' => $tags,
                'wikis' => $wikis,
                'catsta' =>$catsta,
                'tagsta' =>$tagsta,

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
    
    public function disarchiverWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Disarchiver'])) {
           $wikiId = $_SESSION['wiki_id'];
    
            try {
                $wikiModel = new WikiModel();
                $wikiModel->updateWikiStatue($wikiId, 1); 
            } catch (\Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
  //delet tag
  public function deleteTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supteTag'])) {
            $tagId = $_POST['tagId'];

            try {
                $tagModel = new TagModel();
                $tagModel->deleteTag($tagId);
                //echo"delted";
                //die();
                header("Location: /admin/"); 
                exit();
            } catch (\Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

  
    public function deleteCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteCategorie'])) {
            $categoryId = $_POST['categoryId'];
      
            try {
                $categorieModel = new CategorieModel();
                $categorieModel->deleteCategorie($categoryId);
                header("Location: /admin/");
                echo"delted";
                die();
                exit();
            } catch (\Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

}
}