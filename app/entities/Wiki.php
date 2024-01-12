<?php
namespace   App\entities;
class Wiki
{
    private $id_wiki;
    private $titre;
    private $contenu;
    private $datecreation;
    private $id_categorie;
    private $id_users;
    private $statue;
    private $imgData;

    // Constructor
    public function __construct($titre, $contenu, $datecreation, $id_categorie, $id_users, $imgData)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->datecreation = $datecreation;
        $this->id_categorie = $id_categorie;
        $this->id_users = $id_users;
        $this->imgData = $imgData;
    }

    // Getters
    public function getIdWiki()
    {
        return $this->id_wiki;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getDateCreation()
    {
        return $this->datecreation;
    }

    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    public function getIdUsers()
    {
        return $this->id_users;
    }
    public function getImgData()
    {
        return $this->imgData;
    }

    // Setters
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function setDateCreation($datecreation)
    {
        $this->datecreation = $datecreation;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    public function setIdUsers($id_users)
    {
        $this->id_users = $id_users;
    }
}
