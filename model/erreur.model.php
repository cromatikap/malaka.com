<?php

namespace Model;

class Erreur{

   private $erreur;

   function __construct($err){
      $this->erreur = $err;
   }

   public function get(){
      switch($this->erreur)
      {
         case '400':
            return 'Échec de l\'analyse HTTP.';
            break;
         case '401':
            return 'Le pseudo ou le mot de passe n\'est pas correct !';
            break;
         case '402':
            return 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
            break;
         case '403':
            return 'Requête interdite !';
            break;
         case '404':
            return 'Cette page n\'existe pas.';
            break;
         case '405':
            return 'Méthode non autorisée.';
            break;
         case '500':
            return 'Erreur interne au serveur ou serveur saturé.';
            break;
         case '501':
            return 'Le serveur ne supporte pas le service demandé.';
            break;
         case '502':
            return 'Mauvaise passerelle.';
            break;
         case '503':
            return 'Service indisponible.';
            break;
         case '504':
            return 'Trop de temps à la réponse.';
            break;
         case '505':
            return 'Version HTTP non supportée.';
            break;
         default:
            return 'Ouups, vous n\'avez rien à faire là ;)';
      }
   }  
}
?>