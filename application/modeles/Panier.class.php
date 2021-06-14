<?php

//Classe statique, peut aussi être géré avec un singleton

class Panier {

// <editor-fold defaultstate="collapsed" desc="région INITS DE PANIER">

    public static function initialiser() {
        if (!isset($_SESSION['produits'])) {
            $_SESSION['produits'] = array(); 
        }
    }
    
    public static function vider() {
        $_SESSION['produits'] = array();
    }

    public static function detruire() {
        unset($_SESSION['produits']);
    }
    

// </editor-fold>
    
// <editor-fold defaultstate="collapsed" desc="région AJOUTS / MODIFS / SUPRESSION">

    public static function ajouterProduit($idProduit,$qte) {
          if (Panier::contains($idProduit))
              $_SESSION['produits'][$idProduit] += $qte;  
          else
              $_SESSION['produits'][$idProduit] = $qte;
    }

     public static function modifierQteProduit($idProduit,$qte) {
       if (array_key_exists($idProduit, self::getProduits()))
                $_SESSION['produits'][$idProduit] = $qte;
    }
        
    public static function retirerProduit($idProduit) {
        if (array_key_exists($idProduit, self::getProduits()))
             unset ($_SESSION['produits'][$idProduit]);
    }    
    
// </editor-fold>
    
// <editor-fold defaultstate="collapsed" desc="région FONCTIONS GET">

     public static function getProduits() {
        return $_SESSION['produits'];
    }
    
    public static function getNbProduits() {
        $nb = 0;
        if (isset($_SESSION['produits'])) {
            $nb = array_sum($_SESSION['produits']);
        }
        return $nb;
        // ou en 1 ligne : 
         //return isset($_SESSION['produits'])?count($_SESSION['produits']):0;
    }
    public static function getQteByProduit($idProduit) {
        $nb = 0;
        if (array_key_exists($idProduit, self::getProduits()))
                $nb=$_SESSION['produits'][$idProduit];
        
        return $nb;
    }
    

// </editor-fold>    

// <editor-fold defaultstate="collapsed" desc="région FONCTIONS BOOLEENNES">
    public static function isVide() {
        return (self::getNbProduits() == 0);
    }

    public static function contains($idProduit) {
        return (array_key_exists($idProduit, self::getProduits()));
    }

// </editor-fold> 
   
}

/**
Panier::initialiser();
Panier::ajouterProduit(4, 2);
Panier::ajouterProduit(11, 6);

var_dump($_SESSION['produits']);

Panier::retirerProduit(1);
Panier::retirerProduit(4);
Panier::retirerProduit(11);
var_dump(Panier::isVide());

//var_dump($_SESSION['produits']);
//echo PanierTestQte::getQteByProduit(8);

//TODO ADAPTER LES CAS ET LA VUE DU PANIER...
 */

?>
