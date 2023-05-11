<?php
    $titre = "Vue Tuteur";
    $element = $this->modeleClient->getTuteur($_REQUEST['val']);
    $client = new Client($element);
    $contenu = "<div class='content'>";
    $contenu .= "<h2> Fiche Tuteur :</h2>";
    $contenu .= "<article >
                    <!-- Nom du Tuteur -->
                    <h3>".$client->getNomtuteur()."</h3>";

    $contenu .= "<strong>Id : </strong>" .       $client->getIdtuteur()    . " <br> ";
    $contenu .= "<strong>Nom : </strong>" .      $client->getNomtuteur()  . " <br> "; 
    $contenu .= "<strong>Prénom : </strong>" .   $client->getPrenomtuteur(). " <br>";   
    $contenu .= "<strong>Courriel : </strong>" . $client->getEmailtuteur() . " <br> ";
    $contenu .= "<strong>Téléphone :</strong>" . $client->getTelephonetuteur() . " <br> ";
    $contenu .= "<strong>Section : </strong>" . $client->getSectiontuteur() . " <br>";
    $contenu .= "<a title='Modifier' href='?action=modifierTuteur&val=".$client->getIdtuteur()."'>&#128271;</a>";
    $contenu .= "</article>";
    
    include "template.php";
    
?>