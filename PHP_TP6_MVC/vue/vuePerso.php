<?php
    require_once("modele/client.php");
    $titre = "Tuteurs profil";
    $clients = $this->modeleClient->getutilisateur();
    $contenu = "<div>";
    $contenu .= "<article>";
    $contenu .= "<h2>Votre profil</h2>";
    $contenu .= "<article>";
    $contenu .= "<table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>rang</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($clients as $cle => $ligne)
    {
        $client = new Client($ligne);
        $contenu .="<td>".$client->getId()."</td>";
        $contenu .="<td>".$client->getPseudo()."</td>";
        $contenu .="<td>".$client->getRang()."</td>";
        $contenu .="<td> 
                        <a title='Modifier' href='?action=modifierPerso&val=".$client->getId()."'>&#128271;</a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .="<a title='Modifier' href='../connexion/'>Retour au compte &#9884;</a> <br>";
    $contenu .="<br><br>";
    $contenu .= "</article>";
    $contenu .= "</div>";
    include "template.php";

?>