

<h1> Categories </h1>

<?php
VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
    ?>
    <h2>
        <a href=index.php?Controleur=Produits&action=afficher&categorie=<?php echo $uneCategorie->libelle;?>> <?php echo $uneCategorie->libelle; ?></a>
    </h2>
    <?php
}
?>   
</br>



