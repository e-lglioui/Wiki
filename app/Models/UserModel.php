<?php

class UserModel{
private $nom;
private $email;
private $password;
private Connexion $conn;

public function __construct()
{
    $this->conn = new Connexion();
}



}