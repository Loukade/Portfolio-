<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelePDO
 *
 * @author lucas.jenvrain
 */
class ModelePDO
{
    //Attributs utiles pour la connexion
    protected static $serveur = MySqlConfig::SERVEUR;
    protected static $base = MySqlConfig::BASE;
    protected static $utilisateur = MySqlConfig::UTILISATEUR;
    protected static $passe = MySqlConfig::MOT_DE_PASSE;
//Attributs utiles pour la manipulation PDO de la BD
    protected static $pdoCnxBase = null;
    protected static $pdoStResults = null;
    protected static $requete = "";
    protected static $resultat = null;

    public static function getNbTuples($Table)
    {
        self::seConnecter();
        self::$requete = "SELECT COUNT(*) AS nbMembre FROM $Table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
    }

    public static function genererClePrimaire($table, $nomChamp)
    {
        $idMax = self::getMaxTupleByChamp($table, $nomChamp);
        if ($idMax != null) {
            return $idMax + 1;
        } else {
            return 1;
        }
    }

    public static function getMaxTupleByChamp($table, $nomChamp)
    {
        self::seConnecter();
        self::$requete = "SELECT MAX($nomChamp) AS nb FROM " . $table;
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::seDeconnecter();
        self::$resultat = self::$pdoStResults->fetch(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat->nb;
    }

    protected static function seDeconnecter()
    {
        self::$pdoCnxBase = null;
// Si on n'appelle pas la méthode, la déconnexion a lieu en fin de script
    }

    protected static function getLesTuples($table)
    {
        self::seConnecter();
        self::$requete = "SELECT * FROM " . $table;
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    protected static function seConnecter()
    {
        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . self::$serveur . ';dbname=' . self::$base, self::$utilisateur,
                    self::$passe);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$pdoCnxBase->query("SET CHARACTER SET utf8"); //méthode de la classe PDO
            } catch (Exception $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }

    protected static function getPremierTupleByChamp($table, $nomChamp, $valeurChamp)
    {
        self::seConnecter();
        self::$requete = "SELECT * FROM " . $table . " WHERE " . $nomChamp . " = :valeurChamp";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':valeurChamp', $valeurChamp);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat; //un seul tuple retourné : utilisation de fetch()
    }

    protected static function getLeTupleTableById($table, $id)
    {
        self::seConnecter();
        self::$requete = "select * from $table where id=:idTable";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idTable', $id);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    protected static function getLeTupleTableByLogin($table, $login)
    {
        self::seConnecter();

        self::$requete = "select * from $table where login=:login";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    protected static function getLeTupleTableByVille($table, $Ville)
    {
        self::seConnecter();

        self::$requete = "select * from $table where Ville=:Ville";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('Ville', $Ville);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    protected static function getLesTuplesByTable($table)
    {
        self::seConnecter();

        self::$requete = "select * from $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    protected static function SupprimerTupleByChamp($table, $nomchamp, $valeurChamp)
    {

        self::seConnecter();

        self::$requete = "delete from $table where $nomchamp=$valeurChamp";

        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
    }

    protected static function getLesTupleByProcedure($procedure)
    {
        self::seConnecter();
        self::$requete = "CALL $procedure ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    protected static function getLeTupleByProcedure($procedure)
    {
        self::seConnecter();
        self::$requete = "CALL $procedure ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    protected static function getLeCountByProcedure($procedure)
    {
        self::seConnecter();
        self::$requete = "CALL $procedure ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat;


        if (self::$resultat != 0)
            return true;
        else {
            return FALSE;
        }
    }

    protected static function AjouterSuprModifByProcedure($procedure)
    {
        self::seConnecter();
        self::$requete = "CALL $procedure ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
    }

}