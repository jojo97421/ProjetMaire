<?php
    require_once("modele/client.php");
    $titre = "Tuteurs Lister";
    $clients = $this->modeleClient->getTuteurs();
    $contenu = "<div>";
    $contenu .= "<article>";
    $contenu .= "<h2>Liste des Tuteurs</h2>";
    $contenu .= "<article>";
    $contenu .= "<table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Courriel</th>
                        <th>Téléphone</th>
                        <th>Secteur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($clients as $cle => $ligne)
    {
        $client = new Client($ligne);
        $contenu .="<td>".$client->getIdtuteur()."</td>";
        $contenu .="<td>".$client->getNomtuteur()."</td>";
        $contenu .="<td>".$client->getPrenomtuteur()."</td>";
        $contenu .="<td>".$client->getEmailtuteur()."</td>";
        $contenu .="<td>".$client->getTelephonetuteur()."</td>";
        $contenu .="<td>".$client->getSectiontuteur(). "</td>";  
        $contenu .="<td>
                        <a title='Détails' href='?action=editerTuteurs&val=".$client->getIdtuteur()."'>&#128270</a>
                        | 
                        <a title='Supprimer' href='?action=supprimerTuteurs&val=".$client->getIdtuteur()."'>&#128465;</a>
                        | 
                        <a title='Modifier' href='?action=modifierTuteur&val=".$client->getIdtuteur()."'>&#128271;</a>
                        |
                        <a title='Lier' href='?action=Lier&val=".$client->getIdtuteur()."'>&#127471;</a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .="<a title='AjouterTuteurs'href='?action=ajoutertuteurs&val=".$client->getIdtuteur()."'>Ajouter Tuteurs &#8862;</a>";
    $contenu .="<br><br>";
    $contenu .="<a title='Modifier' href='../connexion/'>Retour au compte &#9884;</a> <br>";
    $contenu .="<br><a title='Info' href='?action=TuteurInfo&val='>Info Perso &#8862;</a>";
    $contenu .="<br><br>";
    $contenu .= "</article>";
    $contenu .= "</div>";
    $contenu .="<form name='perso' method = 'post' action=''>";
    $contenu .="<input type ='submit' name='Rechercher' value='Recherhcer'/>";
    include "template.php";

?>