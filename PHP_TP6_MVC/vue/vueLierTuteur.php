<?php
    require_once("modele/client.php");
    $titre = "Stage Lister";
    $clients = $this->modeleClient->getClients();
    $contenu = "<div>";
    $contenu .= "<article>";
    $contenu .= "<h2>Liste des Stages</h2>";
    $idtuteur = $id;
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

    foreach ($clients as $cle => $ligne)
    {
        $client = new Client($ligne);
        $contenu .="<td>".$client->getId()."</td>";
        $contenu .="<td>".$client->getNom()."</td>";
        $contenu .="<td>".$client->getPrenom()."</td>";
        $contenu .="<td>".$client->getEmail()."</td>";
        $contenu .="<td>".$client->getTelephone()."</td>";
        $contenu .="<td>".$client->getEtablissement()."</td>";
        $contenu .="<td>".$client->getNiveau()."</td>";
        $contenu .="<td>".$client->getDebut(). "</td>";
        $contenu .="<td>".$client->getFin(). "</td>"; 
        $contenu .="<td>".$client->getSection(). "</td>";  
        $contenu .="<td>
                        <a title='Lier' href='?action=Lier2&val=".$client->getId()."'>&#127471;</a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .="<br><a title='Ajouter' href='?action=ajouter&val=".$client->getId()."'>Ajouter &#8862;</a>";
    $contenu .="<br><br>";
    $contenu .="<a title='Modifier' href='../connexion/'>Retour au compte &#9884;</a> <br>";
    $contenu .="<input type = 'hidden' id = 'lien' name = 'lien' value='".$client->getId()."'>";
    $_SESSION['idtuteur'] = $idtuteur;
   // $contenu .="<br><a title='Personalisé' href='?action=perso&val=".$client->getId()."'>Requète personalisé &#8862;</a>";
    $contenu .="<br><br>";
    $contenu .="<a title='AjouterTuteurs'href='?action=affichertuteurs&val='>Afficher Tuteurs </a>";
    $contenu .= "</article>";
    $contenu .= "</div>";
    include "template.php";

?>

