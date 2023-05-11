<?php

    $titre = "Vue Stage";
    $element = $this->modeleClient->getClient($_REQUEST['val']);
    $client = new Client($element);
    $contenu = "<div class='content'>";
    $contenu .= "<h2> Fiche Stagière :</h2>";
    $contenu .= "<article >
                    <!-- Nom du Stagière -->
                    <h3>".$client->getNom()."</h3>";

    $contenu .= "<strong>Id : </strong>" .       $client->getId()    . " <br> ";
    $contenu .= "<strong>Nom : </strong>" .      $client->getNom()  . " <br> "; 
    $contenu .= "<strong>Prénom : </strong>" .   $client->getPrenom(). " <br>";   
    $contenu .= "<strong>Courriel : </strong>" . $client->getEmail() . " <br> ";
    $contenu .= "<strong>Téléphone :</strong>" . $client->getTelephone() . " <br> ";
    $contenu .= "<strong>Etablissement : </strong>" . $client->getEtablissement() . " <br> ";
    $contenu .= "<strong>Niveau d'étude : </strong>" . $client->getNiveau() . " <br> ";
    $contenu .= "<strong>Date de début de stage : </strong>" . $client->getDebut() . " <br>";
    $contenu .= "<strong>Date de fin de stage : </strong>" . $client->getFin() . " <br>";
    $contenu .= "<strong>Section : </strong>" . $client->getSection() . " <br>";
    $contenu .= "<a title='Modifier' href='?action=modifier&val=".$client->getId()."'>&#128271;</a>";
    $contenu .= "</article>";
    
    include "template.php";
    
?>