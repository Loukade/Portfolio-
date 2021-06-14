<section id="Panier">

    <h1>Panier</h1>

    <?php foreach($_SESSION['produits'] as $id => $quantite){
        $produit = GestionBoutique::getProduitById($id);

        ?>
    <div class="Bordure">
        <article>

            <aside>

                <h1><?php echo $produit->nom; ?> </h1> <!-- Affichage du nom du produit -->
                <h3><?php echo $produit->description; ?></h3> <!-- Affichage de la description du produit -->

                <!--<p>(<?php echo VariablesGlobales::$libelleCategorie; ?>"")</p>-->
                <img src="<?php echo Chemins::IMAGES_PRODUIT . "" . VariablesGlobales::$libelleCategorie . "" . $produit->image; ?>"
                     alt="photo" height="250" width="300"/>
                <h3><?php echo $produit->prix; ?>&euro;</h3>
                <br>
                <form method="post">
                    <input type="hidden" name="productId" value="<?php echo $produit->id; ?>">
                    <input type="submit" name="DelToBasket" value ="Supprimer">
                </form>

                <h3> Quantite = <?= $quantite ?> <br> </h3>
                <h3>  Prix = <?= $quantite * $produit->prix ?> </h3>
            </aside>

        </article>
    </div>
        <br>
    <?php } ?>

</section>