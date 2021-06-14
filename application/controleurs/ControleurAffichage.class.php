<!-- ControleurAffichage -->
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAffichage
 *
 * @author lucas.jenvrain
 */
class ControleurAffichage {
    public function afficherCV() { 
        
        require Chemins::VUES . 'page_cv.php'; // affichage de la page cv 
    }
    public function afficherContact() { 
        
        require Chemins::VUES . 'page_contact.php'; // affichage de la page contact 
    }
     public function afficherLettre() { 
        
        require Chemins::VUES . 'page_lettre_de_motiv.php'; // affichage de la page lettre de motivation 
    }
    public function afficherPropos() { 
        
        require Chemins::VUES . 'page_a_propos_de_moi.php'; // affichage de la page a propos de moi 
    }
     public function afficherSISR() { 
        
        require Chemins::VUES . 'page_sisr.php'; // affichage de la page sisr 
    }
    public function afficherSLAM() {

        require Chemins::VUES . 'page_slam.php'; // affichage de la page slam 
    }
   
    public function afficherAccueil() { 
        
        require Chemins::VUES . 'page_accueil.php'; // affichage de la page accueil 
    }
}
