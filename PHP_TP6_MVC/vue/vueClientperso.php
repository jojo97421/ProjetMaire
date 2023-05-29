<?php
require_once("modele/client.php");
$titre = "Liste des demandes";
$clients = $this->modeleClient->getClientperso();
$contenu = "<div>";
$contenu .= "<article>";
$contenu .= "<h2>Vos demandes</h2>";
$contenu .= "<article>";
$contenu .= "<table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Courriel</th>
                        <th>Téléphone</th>
                        <th>Etablissement</th>
                        <th>Niveau d'étude</th>
                        <th>Date de début de stage</th>
                        <th>Date de fin de stage</th>
                        <th>Section</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

foreach ($clients as $cle => $ligne) {
    $client = new Client($ligne);
    $contenu .= "<td>" . $client->getId() . "</td>";
    $contenu .= "<td>" . $client->getNom() . "</td>";
    $contenu .= "<td>" . $client->getPrenom() . "</td>";
    $contenu .= "<td>" . $client->getEmail() . "</td>";
    $contenu .= "<td>" . $client->getTelephone() . "</td>";
    $contenu .= "<td>" . $client->getEtablissement() . "</td>";
    $contenu .= "<td>" . $client->getNiveau() . "</td>";
    $contenu .= "<td>" . $client->getDebut() . "</td>";
    $contenu .= "<td>" . $client->getFin() . "</td>";
    $contenu .= "<td>" . $client->getSection() . "</td>";
    $contenu .= "<td>
                        <a title='Détails' href='?action=accepter&val=" . $client->getId() . "'>&#x2705;</a> 
                        <a title='Supprimer' href='?action=supprimer&val=" . $client->getId() . "'>&#10060;</a>
                    </td></tr>";
}
$contenu .= "</tbody></table>";

$contenu .= "<br><br>";
$contenu .= "<a title='Modifier' href='../connexion/'>Retour au compte &#9884;</a> <br>";
// $contenu .="<br><a title='Personalisé' href='?action=perso&val=".$client->getId()."'>Requète personalisé &#8862;</a>";
$contenu .= "<br><br>";
$contenu .= "</article>";
include "template.php";

?>
