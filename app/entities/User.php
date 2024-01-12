<?php
namespace   App\entities;
class User
{
    private $id_user;
    private $nom;
    private $email;
    private $password;
    private $id_role;

  
    public function __construct($nom, $email, $password, $id_role)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->id_role = $id_role;
    }

    
    public function getIdUser()
    {
        return $this->id_user;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getIdRole()
    {
        return $this->id_role;
    }

   
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;
    }
}
