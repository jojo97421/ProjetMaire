<?php
require_once("modele/modele.php");
session_start();
/* Accès à la table client de la base de données *************************/
class modeleClient extends Database
{

    // Colonne
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $etablissement;
    public $niveau;
    public $debut;
    public $fin;
    public $section;
    public $perso;
    public $idtuteur;
    public $nomtuteur;
    public $prenomtuteur;
    public $emailtuteur;
    public $telephonetuteur;
    public $sectiontuteur;

    // Connexion à la base de données
    public function __construct()
    {
        parent::__construct();
    }

    // Extraction des données des clients depuis la base de données.
    public function getClients()
    {
        $sql = "SELECT * FROM demande;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor(); // Achève le traitement de la requête
        return $clients;
    }

    // Récupère les données d'un client déterminé par son id
    public function getClient($id)
    {
        $sql = "SELECT * FROM demande WHERE id = ?;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
        $client = $rqt->fetch();
        $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée z
        return $client;
    }

    public function deleteClient($id)
    {
        if ($_SESSION['username'] == "Mairie") {
            // Supprime les données d'un client déterminé par son id
            $sql = "DELETE FROM demande WHERE id = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            header('Location: ../PHP_TP6_MVC/');
            exit();
        } else {
            ?>
            <script>
                alert("Vous n'avez pas acces à cette fonctionnalité "); window.location.href = "../connexion/"    
            </script>

            <?php

        }
    }

    public function addClient(array $client)
    {
        if ($_SESSION['username'] == "Mairie") {
            // Ajoute un client
            $sql = "INSERT INTO demande (nom,prenom,telephone,email,etablissement,niveau,debut,fin,section)
            VALUES (?,?,?,?,?,?,?,?,?);";

            if (empty($client['sections'])) {
                $spé = $client['section'];
            } else {
                $spé = $client['section'] . " : " . $client['sections'];
            }
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($client['nom'], $client['prenom'], $client['telephone'], $client['email'], $client['etablissement'], $client['niveau'], $client['debut'], $client['fin'], $spé));
            $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            header('Location:../PHP_TP6_MVC/');
            exit();
        } else {
            ?>
            <script>
                alert("Vous n'avez pas acces à cette fonctionnalité "); window.location.href = "../connexion/"    
            </script>

            <?php
        }
    }

    public function updateClient($client)
    {
        // Modifie un client
        if ($_SESSION['username'] == 'Mairie') {
            $sql = "UPDATE demande 
                    SET nom = ?,prenom = ?, telephone = ?, email = ?,etablissement = ?, niveau = ?, debut = ?, fin = ?,section = ?,id = ?
                    WHERE id = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($client['nom'], $client['prenom'], $client['telephone'], $client['email'], $client['etablissement'], $client['niveau'], $client['debut'], $client['fin'], $client['section'], (int) $client['id'], (int) $client['id']));
            $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            header('Location: ../PHP_TP6_MVC/');
            exit();
        } else {
            ?>
            <script>
                alert("Vous n'avez pas acces à cette fonctionnalité "); window.location.href = "../connexion/"    
            </script>

            <?php
        }
    }

    /* public function persorequete($client){
    $sql ="$client['perso']";
    $rqt->execute(array($client['perso']));
    $rqt->closeCursor();
    header('Location: ../PHP_TP6_MVC');
    exit();
    }*/

    public function getTuteurs()
    {
        $sql = "SELECT * FROM tuteurs;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor(); // Achève le traitement de la requête
        return $clients;
    }

    public function getTuteur($idtuteur)
    {
        $sql = "SELECT * FROM tuteurs WHERE idtuteur = ?;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($idtuteur));
        $client = $rqt->fetch();
        $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée z
        return $client;
    }


    public function addTuteurs(array $client)
    {
        if ($_SESSION['username'] == "Mairie") {
            // Ajoute un client
            $sql = "INSERT INTO tuteurs (nomtuteur,prenomtuteur,telephonetuteur,emailtuteur,sectiontuteur)
            VALUES (?,?,?,?,?);";

            if (empty($client['sections'])) {
                $spé = $client['section'];
            } else {
                $spé = $client['section'] . " : " . $client['sections'];
            }
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($client['nom'], $client['prenom'], $client['telephone'], $client['email'], $spé));
            $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            header('Location: ../PHP_TP6_MVC/?action=affichertuteurs&val=');
            exit();
        } else {
            ?>
            <script>
                alert("Vous n'avez pas acces à cette fonctionnalité "); window.location.href = "../connexion/"    
            </script>

            <?php

        }
    }


    public function updateTuteur($client)
    {
        // Modifie un Tuteur
        if ($_SESSION['username'] == 'Mairie' or $_SESSION['username'] == $client['nom']) {
            $sql = "UPDATE tuteurs 
                    SET nomtuteur = ?,prenomtuteur = ?, telephonetuteur = ?, emailtuteur = ?,sectiontuteur = ?,idtuteur = ?
                    WHERE idtuteur = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($client['nom'], $client['prenom'], $client['telephone'], $client['email'], $client['section'], (int) $client['idtuteur'], (int) $client['idtuteur']));
            $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            header('Location: ../PHP_TP6_MVC/?action=affichertuteurs&val=');
            exit();
        } else {
            ?>
            <script>
                alert("Vous n'avez pas acces à cette fonctionnalité "); window.location.href = "../connexion/"    
            </script>

            <?php
        }
    }

    public function deleteTuteur($id)
    {
        if ($_SESSION['username'] == "Mairie") {
            // Supprime les données d'un client déterminé par son id
            $sql = "DELETE FROM tuteurs WHERE idtuteur = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            header('Location: ../PHP_TP6_MVC/?action=affichertuteurs&val=');
            exit();
        } else {
            ?>
            <script>
                alert("Vous n'avez pas acces à cette fonctionnalité "); window.location.href = "../connexion/"    
            </script>

            <?php

        }
    }

    public function updateLien($client)
    {
        if ($_SESSION['username'] == "Mairie") {
            $sql = "UPDATE demande,tuteurs SET lien = ?,lientuteur = ? 
            WHERE id = ? and idtuteur = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($client['lientuteur'], $client['id'], (int) $client['id'], (int) $client['lientuteur']));
            $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            header('Location: ../PHP_TP6_MVC/');
            exit();
        } else {
            ?>
            <script>
                alert("Vous n'avez pas acces à cette fonctionnalité "); window.location.href = "../connexion/"    
            </script>

            <?php

        }
    }



    public function getTuteurperso($id)
    {
        // Modifie un Tuteur
        $sql = "SELECT * FROM utilisateurs WHERE pseudo = " . $_SESSION['username'] . ";";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
        $client = $rqt->fetch();
        $rqt->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée z
        return $client;

    }

    public function getutilisateur()
    {
        $sql = "SELECT * FROM utilisateurs WHERE pseudo = '" . $_SESSION['username'] . "';";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor(); // Achève le traitement de la requête
        return $clients;
    }

    public function getClientPerso()
    {
        $sql = "SELECT * FROM demande WHERE lien = 2;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor(); // Achève le traitement de la requête
        return $clients;

    }
}
?>