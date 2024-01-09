<?php
namespace App\Controllers;

use App\database\Connexion;

class UserController {
    public function regester(){
        $nom=$this->validation($nom);
        $prenom=$this->validation($prenom);
        $email=$this->validation($email);
        $mot_pass = password_hash($mot_pass, PASSWORD_DEFAULT);
        $connexion = new Connexion();
        $user = new User($nom,$prenom,$email,$mot_pass);
        $user->creatAcount();
    }
    
    public function login(){
        $email=$this->validation($email);
        $password=$this->validation($password);
        $connexion = new Connexion();
        $user = new UserModal;
        $user->findAcount($email,$password);
    
    }
    
    public function validation($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data); 
        $data = addslashes($data); 
        return $data;
    }
}
