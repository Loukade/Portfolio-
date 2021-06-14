<!-- L'Affichage des produits de la boutique -->



<?php require_once chemins::VUES_PERMANENTES . "v_menu_categories.inc.php"; ?>
<section>

    <?php
    foreach (VariablesGlobales::$lesProduits as $unProduit) {
        ?>
        <div class="Bordure">
            <article>

                <aside>

                    <h1><?php echo $unProduit->nom; ?> </h1> <!-- Affichage du nom du produit -->
                    <h3><?php echo $unProduit->description; ?></h3> <!-- Affichage de la description du produit -->

                    <!--<p>(<?php echo VariablesGlobales::$libelleCategorie; ?>"")</p>-->
                    <img src="<?php echo Chemins::IMAGES_PRODUIT . "" . VariablesGlobales::$libelleCategorie . "" . $unProduit->image; ?>"
                         alt="photo" height="250" width="300"/>
                    <h3><?php echo $unProduit->prix; ?>&euro;</h3>



                    <form method="post">
                        <input type="hidden" name="productId" value="<?php echo $unProduit->id; ?>">
                        <input type="number" min="1" name="quantite">
                        <input type="submit" name="addToBasket" value ="Ajouter Panier">
                    </form>

                </aside>


            </article>
        </div>
        <br>
        <?php
    }
    ?>
</section>