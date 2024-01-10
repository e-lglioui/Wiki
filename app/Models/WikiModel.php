<?php
namespace App\Models;
use App\database\Connexion;
use PDO;
use PDOException;
class Wiki{
    private $titre;
    private $contenu;
    private $datecreation;
    private $id_categorie;
    private $id_users;
}