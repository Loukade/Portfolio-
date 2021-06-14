<!-- Connexion Admin --> 
<link href=<?php echo Chemins::STYLES . 'styleform.css'; ?> rel="stylesheet" type="text/css">
<?php require_once chemins::VUES . "page_accueil.php"; ?>
<section>
    <h1> Connexion </h1>
    <form method="post" action="index.php?Controleur=Admin&action=verifierConnexion">
        <fieldset>
            <legend> Identification</legend>
            <label for="pseudo"> Login : </label>
            <input type="text" name="login" id="login"/>
            </br>
            <label for = "pass"> Mot de passe :</label>
            <input type ="password" name ="passe" id="passe"/>
            </br>
            <input type="checkbox" name="connexion_auto" id="connexion_auto"/>
            <label for="connexion_auto" class="enligne">Connexion automatique</label> </br>
            <input type='submit' value="Connexion" action="index.php?Controleur=Admin&action=afficherIndex"/>
            </br>

    </form>

</section>
