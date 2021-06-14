<!-- Affichage de l'administation du site -->

<?php require_once chemins::VUES . "page_accueil.php"; ?>
<section>
    <div class="titre">
        Administration du site (Accès réservé)
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>
    <a href ="index.php?Controleur=Admin&action=CategorieAdmin"> Gestion des catégories </a> </br>
    <a href =""> Gestion des produits </a> </br>
    <p>
        <a href="index.php?Controleur=Admin&action=SeDeconnecter">Déconnexion (<?php echo $_SESSION['login_admin']; ?>)</a>
    </p>
</section>
