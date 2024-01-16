<?php

namespace App\Controllers;
use App\Models\CategorieModel;
use  App\Models\TagModel;
use  App\Models\WikiModel;
use  App\entities\Categorie;
use  App\entities\Tag;
use  App\entities\Wiki;

use Core\View; 

class HomeController
{
    use View; 

    public function test()
    {
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->selectCategorie();

        $tagModel = new TagModel();
        $tags = $tagModel->selectTag();
        $wikiModel = new WikiModel();
        $wikis = $wikiModel->selectWikiByStatue(1);
       
       
        try {
            $view = 'home'; 
            $params = [
                'categories' => $categories,
                'tags' => $tags,
                'wikis' => $wikis
            ];

            $this->render($view, $params);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function search()
    {
        if(isset($_GET['q'])){
            $titre = $_GET['q'];
            $wikisearch=$wikiModel->searchWiki($titre);
            echo json_encode($wikisearch);
        }
    }

    

}

