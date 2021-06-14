
<link href ="<?php echo chemins::STYLES . 'styleCategorie.css'; ?>" rel ="stylesheet" type ="text/css" />

<div id ='Cadre'>
    <div id="container">

<div id='left-admin'>
<form action="index.php?Controleur=Admin&action=InsertCategorie" method="POST" enctype="multipart/form-data">

    <h1>
        Categorie
    </h1>

            <h3>
               Ajouter Categorie
            </h3>
            <label for="libelle">Libelle Categorie : </label>  <input type='text' name='libelle' id='libelle' /><span></span><br />



            <input type='submit' name='valider' id='valider' value='VALIDER'/>

    </form>
</div>
<div id='right-admin'>
<form action="index.php?Controleur=Admin&action=DeleteCategorie" method="POST" enctype="multipart/form-data">

    <h3>
        Supprimer Categorie
    </h3>
    <?php
    VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
?>
   <select name="idCategorie" id="idCategorie">

                    <?php
                    foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
                        ?>
                        <option value=<?php echo $uneCategorie->id; ?>><?php echo $uneCategorie->libelle; ?></option>
                    <?php
                    }
                    ?>

   </select>
    <br>
    <input type='submit' name='valider' id='valider' value='VALIDER'/>
</form>


    <form action="index.php?Controleur=Admin&action=UpdateCategorie" method="POST" enctype="multipart/form-data">

        <h3>
            Sélectionner la catégorie a modifier
        </h3>
        <?php
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
        ?>
        <label for="LibelleCategorie">Libelle Categorie : </label>
        <select name="idCategorie" id="idCategorie">



            <?php
            foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
                ?>
                <option value=<?php echo $uneCategorie->id; ?>><?php echo $uneCategorie->libelle; ?></option>
                <?php
            }
            ?>

        </select>
        <br>
        <h3>
            Nouveau Libelle Catégorie :
        </h3>
        <label for ="LibelleCategorie">Libelle Catégorie : </label> <input type="text" name="ModifCategorie" id="ModifCategorie" value=""/> <br> <br>
        <input type='submit' name='valider' id='valider' value='VALIDER'/>
    </form>




</div>

    </div>
</div>


