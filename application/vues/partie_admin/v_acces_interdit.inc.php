<!-- L'accès reservé aux administateurs -->

<?php require_once chemins::VUES . "page_accueil.php"; ?>
<section>
    Accès réservé aux administrateurs du site... </br>
    <a href="index.php?Controleur=Affichage&action=afficherAccueil">
        <img src="<?php echo Chemins::IMAGES . 'interdit.png' ?>" width="200" />
    </a>
</section>