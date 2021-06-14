<!-- ControleurAdmin -->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAdmin
 *
 * @author lucas.jenvrain
 */
class ControleurAdmin {

    public function __construct() {

        require_once chemins::MODELES . 'gestion_boutique.class.php'; // chemin vers gestion_boutique.class.php
    }

    public function afficher() {

        require Chemins::VUES_ADMIN . 'v_connexion.inc.php'; // affichage de la connexion admin 
    }

    public function verifierConnexion() { // verifie la connexion et aussi les cookies 
        if (GestionBoutique::isAdminOk($_POST['login'], $_POST['passe'])) { // si le login et le passe est dans la base de donnée alors c'est bon 

            $_SESSION['login_admin'] = $_POST['login'];
            if (isset($_POST['connexion_auto']))
                setcookie('login_admin', $_POST['login'], time() + 7243600, null, null, false, true); // cookie permettant de rester connecter pendant un temps si on ne s'est pas deconnecter
            require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
        } else if (GestionBoutique::Connexion($_POST['login'], $_POST['passe'])) {

            $_SESSION['user'] = $_POST['login'];

           ?> <a href="index.php?Controleur=Produits&action=afficherTous"> Commmander des articles </a> <br> <?php
           
        } else {


            
            VariablesGlobales::$message = '<p class="couleur_texte">Identifiant ou mots de passe invalide</p>';
            echo VariablesGlobales::$message;

            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
        }
    }

    public function afficherIndex() { // affiche la session de l'admin 
        if (isset($_SESSION['login_admin']))
            require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
        else
            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
    }

    public function SeDeconnecter() { // permet de se deconnecter de la partie admin 
        $_SESSION = array();
        session_destroy();
        setcookie('login_admin', '');
        header("Location:index.php");
    }

    public function CategorieAdmin() {
        if ($_SESSION['login_admin'] != NULL) {
            require chemins::VUES_ADMIN . 'v_categorie_admin.inc.php';
        } else {
            VariablesGlobales::$message = '<p class="couleur_texte">Vous êtes déconnecté , reconnectez-vous pour pouvoir continuer</p>';
            echo VariablesGlobales::$message;
            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
            }
        }


    public function InsertCategorie() {
        if ($_SESSION['login_admin'] != NULL) {
        (GestionBoutique::InsertCategorie(ModelePDO::genererClePrimaire("categorie", "id") , $_POST['libelle']));
        VariablesGlobales::$message = '<a class="couleur_texte">la categorie est ajoutée </p>';
        echo VariablesGlobales::$message;
        require chemins::VUES_ADMIN . 'v_categorie_admin.inc.php';
        } else {
            VariablesGlobales::$message = '<p class="couleur_texte">Vous êtes déconnecté , reconnectez-vous pour pouvoir continuer</p>';
            echo VariablesGlobales::$message;
            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
            }
        }


    public function DeleteCategorie() {
        if ($_SESSION['login_admin'] != NULL) {
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
        (GestionBoutique::DeleteCategorie($_POST['idCategorie']));
        VariablesGlobales::$message = '<a class="couleur_texte">la categorie est supprimée </p>';
        echo VariablesGlobales::$message;
        require chemins::VUES_ADMIN . 'v_categorie_admin.inc.php';
} else {
            VariablesGlobales::$message = '<p class="couleur_texte">Vous êtes déconnecté , reconnectez-vous pour pouvoir continuer</p>';
            echo VariablesGlobales::$message;
            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
            }
        }

    public function UpdateCategorie() {
        if ($_SESSION['login_admin'] != NULL) {
            VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
            (GestionBoutique::UpdateCategorie($_POST['idCategorie'],$_POST['ModifCategorie']));
            VariablesGlobales::$message = '<a class="couleur_texte">la categorie est modifiée </p>';
            echo VariablesGlobales::$message;
            require chemins::VUES_ADMIN . 'v_categorie_admin.inc.php';
        } else {
            VariablesGlobales::$message = '<p class="couleur_texte">Vous êtes déconnecté , reconnectez-vous pour pouvoir continuer</p>';
            echo VariablesGlobales::$message;
            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
        }
    }






}
