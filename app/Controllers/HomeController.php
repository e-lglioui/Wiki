<?php

namespace App\Controllers;

use Core\View; // Import the View trait

class HomeController
{
    use View; 

    public function test()
    {
       
        try {
            $view = 'login'; 
            $params = [
                
            ];

            $this->render($view, $params);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
