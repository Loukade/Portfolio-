
<?php

require_once chemins::CONFIGS . "mysql_config.class.php";
// Récupération du codepostal posté
$recherche = strtolower($_GET["q"]);
if (!$recherche)
    return;
// Recherche du CP dans la base
$requete = "select distinct CP,Ville from codespostaux where CP like'$recherche%' or ville like '$recherche%' order by CP";
$pdoStResults = $pdoCnxBase->prepare($requete);
$pdoStResults->execute();
$pdoStResults->setFetchMode(PDO::FETCH_OBJ);
//parcours et affichage des resultats
while ($ligne = $pdoStResults->fetch()) {
    $cp = $ligne->CP;
    $ville = $ligne->Ville;
    echo "$cp - $ville|$cp|$ville\n";
}
// Fermeture de la base
$pdoStResults->closeCursor();
//Affichage du résultat (traité par le code du formulaire
echo $resultat->nbResultats;
?> 