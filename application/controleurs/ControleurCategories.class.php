<!-- ControleurCategories -->
<?php
require_once chemins::MODELES."gestion_boutique.class.php"; // chemin vers gestion_boutique.class.php

class ControleurCategories {

    public function __construct() {
        // si on séparait les modèles, le constructeur donnerait son chemin
        // require_once Chemins::MODELES.'gestion_categories.class.php';    
    }

    public function afficher() {
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories(); // affichage des catégories 
            
    }

}

?>