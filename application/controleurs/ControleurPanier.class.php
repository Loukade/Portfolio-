<?php
require_once chemins::MODELES."gestion_boutique.class.php"; // chemin vers gestion_boutique.class.php
class ControleurPanier{

    public function __construct(){
        require_once chemins::MODELES.'gestion_boutique.class.php'; //chemin vers gestion_boutique.class.php
        $this->DeleteProduit();
    }

    public function Afficher(){
        require Chemins::VUES."v_Panier.php";
    }


    private function DeleteProduit() {

        if (isset($_POST['DelToBasket'])) {
            if (isset($_POST['productId'])) {
                require_once Chemins::MODELES . "Panier.class.php";
                Panier::retirerProduit($_POST['productId']);
                VariablesGlobales::$message = '<a class="couleur_texte">le produit est retiré du panier</a>';
                echo VariablesGlobales::$message;
            }

                }
            }


        }




