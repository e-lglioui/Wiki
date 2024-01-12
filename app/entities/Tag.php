<?php
namespace   App\entities;
class Tag
{
    private $id;
    private $titre;

    // Constructor
    public function __construct($titre)
    {
        $this->titre = $titre;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    // Setters
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
}
