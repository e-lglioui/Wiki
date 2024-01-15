<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\entities\User;
use App\Database\Connexion;
use App\Controllers\AdminController;
use App\Controllers\AuteurController;
use Core\View;
use Exception;

class UserController
{
    use View;

    private $connexion;
    private $userModel;

    public function __construct()
    {
        $this->connexion = new Connexion();
        $this->userModel = new UserModel($this->connexion);
    }

    public function register()
    {
        try {
            $view = 'register';
            $params = [
            ];
            $this->render($view, $params);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function login()
    {
        try {
            $view = 'login';
            $params = [
            ];
            $this->render($view, $params);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function registerUser()
    {  
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nom = $this->validation($_POST['nom']);
        $email = $this->validation($_POST['email']);
        $mot_pass = $this->validation($_POST['password']); 
        $mot_pass = password_hash($mot_pass, PASSWORD_DEFAULT);
        $id_rol="1"; 
        $user = new User($nom, $email, $mot_pass,$id_rol);
        $row=$this->userModel->createAccount($user);
        }
        if($row){
            /*rederect vere login*/
             $this->login();
        }
    }

    public function loginUser()
    {
        $email = $this->validation($_POST['email']);
        $password = $this->validation($_POST['password']); 
        $user = $this->userModel->findAccount($email, $password);

        if ($user) {
            $_SESSION['userId'] = $user['id_user'];
            $_SESSION['loggedIn'] = true;
            $_SESSION['role_id'] =$user['id_role'];
             var_dump($user['id_role']);
            die();
            if($user['id_role']=== "2"){
                $admin=new AdminController();
                $admin->admin();
            }else{
                $auteur=new AuteurController();
                $auteur->auteur(); 
            } 
            
        } else {
            echo"nooooooooooooooooooooooooooooooooo";
            header("Location: /register/");
            exit();
        }
    }

    private function validation($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
        return $data;
    }
}
