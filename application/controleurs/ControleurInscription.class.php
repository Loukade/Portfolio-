<!-- ControleurInscription -->

<?php


 
class ControleurInscription {
    
    public function __construct(){
        require_once chemins::MODELES."gestion_boutique.class.php"; // chemin vers gestion_boutique.class.php
    }
        
    
     public function afficher() { 
        
        require Chemins::VUES_ADMIN . 'v_Inscription.inc.php'; // chemin vers l'affichage de l'inscription client 
       
    }
    
    public function AjouterClient() {
        (GestionBoutique::InsertClient(ModelePDO::genererClePrimaire("client", "id"),$_POST['pseudo'],$_POST['pass1'],$_POST['mail'],$_POST['nom'],$_POST['prenom'],$_POST['cp'],$_POST['ville'])); // ajout des client dans la base de donnée
       
        require Chemins::VUES_ADMIN . 'v_Inscription.inc.php';
        VariablesGlobales::$message = '<a class="couleur_texte">le compte a bien été crée</p>';
                echo VariablesGlobales::$message;
       
    }
   
}
