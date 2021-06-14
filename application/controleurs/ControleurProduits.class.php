<!-- ControleurProduits -->
<?php

class ControleurProduits {

    public function __construct() {
        require_once chemins::MODELES.'gestion_boutique.class.php'; //chemin vers gestion_boutique.class.php
        $this->ADDBASKET();
    }

    public function afficher() {

          VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsByCategorie($_REQUEST["categorie"]); // permet d'afficher les produits pour chaque catégorie
             require Chemins::VUES . 'v_produits.inc.php';
         // chemin vers la boutique
    }
    
    
     public function afficherTous() {


        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduits(); // affiche tout les produits de la base 
        require Chemins::VUES . 'v_produits.inc.php'; // chemin vers la boutique  
    }

    private function ADDBASKET(){

            if (isset($_POST['addToBasket'])) {
                require_once Chemins::MODELES . "Panier.class.php";


                if (isset($_POST['productId']) && isset($_POST['quantite'])) {
                    $product = GestionBoutique::getProduitById($_POST['productId']);
                    if ($product && $_POST['quantite'] <= $product->quantite) {

                        Panier::ajouterProduit($_POST['productId'], $_POST['quantite']);
                        VariablesGlobales::$message = '<a class="couleur_texte">le produit est ajouté au panier</a>';
                        echo VariablesGlobales::$message;
                    }
                }


            }



    }
    
}

?>