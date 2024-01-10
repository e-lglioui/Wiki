<?php
namespace Core;

trait Router
{
    private static $map;

    public static function get($url, $class, $method)
    {
        $url = self::cleanUrl($url);
        self::$map['get'][$url] = [
            'class' => $class,
            'method' => $method
        ];
    }
    
    public static function post($url, $class, $method)
    {
        $url = self::cleanUrl($url);
        self::$map['post'][$url] = [
            'class' => $class,
            'method' => $method
        ];
    }
    
    private static function cleanUrl($url)
    {
        // Exemple de nettoyage simple : supprimer les caractères non autorisés
        return preg_replace('/[^a-zA-Z0-9\/]/', '', $url);
    }

    public static function getMap()
    {
        return self::$map;
    }
}
