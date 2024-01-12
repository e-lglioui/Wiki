<?php

class Rol
{
    private $id;
    private $rol;

    // Constructor
    public function __construct($rol)
    {
        $this->rol = $rol;
    }

   
    public function getId()
    {
        return $this->id;
    }

    public function getRol()
    {
        return $this->rol;
    }

    // Setters
    public function setRol($rol)
    {
        $this->rol = $rol;
    }
}
