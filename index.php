<?php //
//require_once 'configs/chemins.class.php';
//require_once chemins::VUES_PERMANENTES."entete.inc.php";
//require_once chemins::VUES_PERMANENTES."menu_categories.inc.php";
//require_once chemins::CONFIGS."mysql_config.class.php";
//require_once chemins::CONFIGS."variables_globales.class.php";
//require_once chemins::CONTROLEURS."controleur_categories.class.php";
//require_once chemins::CONTROLEURS."controleur_produits.class.php";
//require_once Chemins::CONFIGS."Panier.class.php";
//
//panier::initialiser();
//
//if (!isset($_REQUEST['cas'])){
//    $cas ='afficherAccueil';
//}else{
//    $cas=$_REQUEST['cas'];
//    
//if (isset($_REQUEST['categorie'])){
//    $categorie = $_REQUEST['categorie'];
//}
//if(isset($_COOKIE['login_admin']))
//    $_SESSION['login_admin']= $_COOKIE['login_admin'];
//}
//$cas = (!isset($_REQUEST['cas'])) ? 'afficherAccueil' : $_REQUEST['cas'];
//switch ($cas) {
//    case 'afficherAccueil': {
//            require chemins::VUES."page_accueil.php";
//            break;
//        }
//        case 'afficherboutique': {
//                VariablesGlobales::$lesProduits = GestionBoutique::getLesProduits();
//                VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
//                require chemins::VUES.'v_produits.inc.php';
//            break;
//        
//        
//        }
//        case 'afficherProduits': {
//               require_once Chemins::CONTROLEURS.'controleur_produits.class.php';
//                $controleurProduits = new ControleurProduits();
//                $controleurProduits ->afficher($categorie);
//            break;
//        }
//    case 'afficherCv':{
//        require chemins::VUES."page_cv.php";
//        break;
//    }
//    case 'afficherPropos':{
//        require chemins::VUES."page_a_propos_de_moi.php";
//        break;
//    }
//    case 'afficherContact':{
//        require chemins::VUES."page_contact.php";
//        break;
//    }
//    case 'afficherLettre':{
//        require chemins::VUES."page_lettre_de_motiv.php";
//        break;
//    }
//    case 'afficherSisr':{
//        require chemins::VUES."page_sisr.php";
//        break;
//    }
//    case 'afficherSlam':{
//        require chemins::VUES."page_slam.php";
//        break;
//    }
//
//case 'verifierConnexion': {
// if (GestionBoutique::isAdminOK($_POST['login'], $_POST['passe']))
// {
// $_SESSION['login_admin'] = $_POST['login'];
// if (isset($_POST['connexion_auto']))
// setcookie('login_admin', $_POST['login'], time() + 7*24*3600, null, null, false, true);
// // Le cookie sera valable dans ce cas 1 semaine (7 jours)
//    require Chemins::VUES_ADMIN. 'v_index_admin.inc.php';
// }
// else
// require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php';
// break;
// } 
//    
//    case 'afficherIndexAdmin':
//    {
//        if(isset($_SESSION['login_admin']))
//            require Chemins::VUES_ADMIN.'v_index_admin.inc.php';
//        else
//            require Chemins::VUES_ADMIN.'v_connexion.inc.php';
//        break;
//    }
//    
//    case 'afficherInscription':
//    {
// 
//            require Chemins::VUES_ADMIN.'v_Inscription.inc.php';
//    
//           
//        break;
//    }
//    case 'SeDeconnecter':
//    {
//        $_SESSION = array();
//        session_destroy();
//        setcookie('login_admin','');
//        header("Location:index.php");
//        
//        break;
//    }
//    default :{
//            require Chemins::VUES.'page_accueil.php';
//            break;
//    }
//}
//
//
//
//require_once chemins::VUES_PERMANENTES."pied.inc.php";



//indentation auto du code sous Netbeans : ALT+MAJ+F

session_start();

require_once 'configs/chemins.class.php';


require_once chemins::CONFIGS."mysql_config.class.php"; // chemins vers mysql_config.class.php
require_once chemins::CONFIGS."variables_globales.class.php"; // chemins vers variables_globales.class.php
require_once Chemins::MODELES."Panier.class.php"; // chemins vers Panier.class.php
require_once chemins::MODELES."ModelePDO.class.php"; // chemins vers ModelePDO.class.php
//Rmq : si les modèles étaient "découpés", ils seraient inclus dans chaque controleur associé et non dans le controleur principal



//Affichage des catégories (menu de gauche)

require_once chemins::VUES_PERMANENTES."menu_categories.inc.php";

// Affichage de l'entête de la page 

require_once chemins::VUES_PERMANENTES."entete.inc.php";



//ControleurCategories::afficher();//en version classe statique

if (!isset($_REQUEST['Controleur']))
{
   require_once (Chemins::VUES . "page_accueil.php");
    Panier::initialiser();
}    
else {

    $classeControleur = 'Controleur' . $_REQUEST['Controleur']; //ex : ControleurProduits
    $fichierControleur = $classeControleur . ".class.php"; //ex : ControleurProduits.class.php
    require_once(Chemins::CONTROLEURS . $fichierControleur);

    $objetControleur = new $classeControleur(); //ex : $objetControleur = new ControleurProduits();
    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];
        $objetControleur->$action();
//ex : $objetControleur->afficher();
    }
    //version avec classe statique
    // $classeStatiqueControleur = 'Controleur' . $_REQUEST['controleur'];
    // $classeStatiqueControleur::$action();
}



//require_once(Chemins::VUES_PERMANENTES . "v_resumePanier.php");

//Affichage du pied de page 

require_once(Chemins::VUES_PERMANENTES . "pied.inc.php");

