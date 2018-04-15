<?php

namespace Lib;

use Lib\Configuration;
use DateTime;

abstract class Secure
{
    /**
     * Renvoie une donnée sous forme int
     * Si la donnée reçu n'est pas convertissable, alors
     * elle prend la valeur min (0 par défaut)
     */
    public static function forceInt($data, $min = NULL, $max = NULL)
    {
        (int) $data = intval($data);

        //Si il y a des bornes, on force $data à rester dedans
        if($min != NULL && $data < $min)
            $data = $min;
        if($max != NULL && $data > $max)
            $data = $max;
         
        return $data;
    }

    /**
     *  Converti "123,32" ou "123.32" en float de prix pour la bdd
     */
    public static function forcePrice($data){
        return preg_replace("#,#", ".", $data);
    }

    /**
     *  Converti un string en un string valide pour le nom d'un 
     *  fichier (genre enlever les espaces, les caractères
     *  spéciaux et tout)
     */
    public static function forceFileName($data){
        
        //conversion des accents et autres caractères spéciaux
        $data = htmlentities($data);
        $data = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $data);
        $data = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $data); // pour les ligatures e.g. '&oelig;'
        $data = preg_replace('#&[^;]+;#', '', $data); // supprime les autres caractères

        //suppression de toutes les merdes
        $data = preg_replace("#[,\\\^\?\!/\.\*\(\)'\"]#", "", $data);
        $data = preg_replace("#[_-]#", " ", $data);

        //remplacement des espaces
        $data = preg_replace("#(\s)+#", "-", trim($data));
        
        return $data;
    }

    /**
     *  Sécurise n'importe quelle donnée textuelle pour éviter
     *  les failles xss, injections SQL etc...
     */
    public static function text($data){
        $data = htmlentities($data);

        return $data;
    }

    /**
     *  Retourne la page actuelle sur laquelle on est
     *  /!\ PAS ENCORE SECURISE
     */
    public static function getCurrentURI(){
        foreach($currentURI = explode("/", $_SERVER['REQUEST_URI']) as $i => $current_section)
            foreach (explode("/", Configuration::$rootURL) as $root_section)
                if($current_section == $root_section)
                    unset($currentURI[$i]);
        
        $finalURI = "";
        $slash = "";
        $islash = 0;
        foreach ($currentURI as $section) {
            $finalURI .= $slash . $section;
            if(++$islash >= 2)
                $slash = "/";
        }

        return $finalURI;
    }

    /**
     *  /!\ A APPELER AU DEBUT DE CHAQUE FICHIER .ajax.php !
     *
     *  Securise les scripts php devant être appelés 
     *  uniquement par AJAX.
     *  Vérifie si il est utilisé de manière normale
     *  Sinon il fait une redirection vers l'index
     */
    public static function ajaxController(){
        if(empty($_POST) && empty($_FILES)){
            //je fake une erreur 404 pour perdre le fils de pute qui voudrait s'attaquer à notre site
            header('Location: erreur.php?erreur=404');
            die;
        }
    }
    public static function adminController(){
        if($_SESSION['id'] == NULL){
            header('Location: http://'.Configuration::$rootURL);
            die;
        }
    }

    /////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////
    //////////// /!\ FONCTIONS DE TESTS AVEC RETOUR BOOLEEN /!\ /////////////
    /////////////////////////////////////////////////////////////////////////
                               /////////////////
                                      //
                                      //
                                      //
                                      //
                                    //////
                                      //

    /**
     *  Test si la variable est un nombre entier
     *  Option : test si il est compris entre 2 nombres
     */
    public static function isInt($n, $from = NULL, $to = NULL){
        if(is_numeric($n) && is_int(intval($n)))
            if(!is_null($from) && !is_null($to))
                return ($n >= $from && $n <= $to) ? true : false;
            else
                return true;
        else
            false;    
    }

    /**
     *  Les fonctions suivantes servent à vérifier la validité de
     *  champs de formulaires en fonction des données qu'ils sont
     *  censés accueillir
     *  Elles retournent uniquement des booléens
     */
    public static function isValidName($name, $min = 3, $max = 30){
        if(strlen(trim($name)) >= $min && strlen(trim($name)) <= $max)
            return true;
        else
            return false;
    }

    public static function isValidFrenchPhone($phone){
        if(preg_match("/^0[1-68][0-9]{8}$/",trim($phone)))
            return true;
        else
            return false;
    }

    public static function isValidMail($mail){
        if(!filter_var(trim($mail), FILTER_VALIDATE_EMAIL))
            return false;
        else
            return true;
    }

    public static function isValidYear($year){
        if(self::isInt(trim($year), 0, 3000))
            return true;
        else
            return false;
    }

    public static function isValidDate($date, $format = 'd/m/Y'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public static function isValidPrice($price){
        $price = preg_replace("#,#", ".", $price);
        if(is_numeric(trim($price)) && preg_match("#^([0-9]+)(\.[0-9]{2})?$#", $price))
            return true;
        else
            return false;
    }

    public static function isValidPostalCode($cp){
        if(is_numeric(trim($cp)) && strlen(trim($cp)) == 5)
            return true;
        else
            return false;
    }




    //////// Compte administrateur ///////

    public static function isConnected(){
        if($_SESSION['id'] != NULL)
            return true;
        else 
            return false;
    }
}