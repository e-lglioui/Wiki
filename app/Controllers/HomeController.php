<?php

namespace App\Controllers;
use App\entities\Wiki;
use App\Models\WikiModel;
use Core\View; 

class HomeController
{
    use View; 

    public function test()
    {
        $wikiModel = new WikiModel();
        $wikis = $wikiModel->selectWikiByStatue(1);
       
        try {
            $view = 'home'; 
            $params = [
                'wikis' => $wikis,  
            ];

            $this->render($view, $params);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

}

