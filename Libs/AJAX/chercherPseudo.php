<!-- ControleurAdmin -->
<?php

require_once "../../configs/mysql_config.class.php";
require_once "../../application/modeles/ModelePDO.class.php";
require_once "../../application/modeles/gestion_boutique.class.php";

echo GestionBoutique::getExistClientByPseudo($_POST['pseudo']);

