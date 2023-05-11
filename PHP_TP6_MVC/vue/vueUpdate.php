<?php

    $titre = "Stage Modifier";
    $element = $this->modeleClient->getClient($_REQUEST['val']);
    $client = new Client($element);

    $contenu = '<form action="?action=ValideModifier" method="post">';
    $contenu .= '<h3>Modifier :</h3><br>';
    $contenu .= '<label for="nom">Nom: </label>';
    $contenu .= '<input type="text" name="nom" id="nom" value="' . $client->getNom() . '"> <br><br>';
    $contenu .= '<label for="prenom">Prénom: </label>';
    $contenu .= '<input type="text" name="prenom" id="prenom" value="' . $client->getPrenom() . '"> <br><br>';
    $contenu .= '<label for="telephone">Telephone: </label>';
    $contenu .= '<input type="text" name="telephone" id="telephone" value="' . $client->getTelephone() . '"> <br><br>';
    $contenu .= '<label for="email">Email: </label>';
    $contenu .= '<input type="text" name="email" id="email" value="' . $client->getEmail() . '"> <br><br>';
    $contenu .= '<label for="etablissement">Etablissement: </label>';
    $contenu .= '<input type="text" name="etablissement" id="etablissement" value="'. $client->getEtablissement() . '"> <br><br>';
    $contenu .= '<label for="niveau">Niveau: </label>';
    $contenu .= '<input type="text" name="niveau" id="niveau" value="'. $client->getNiveau() . '"> <br><br>';
    $contenu .= '<input type="hidden" name="id" id="id" value="' . $client->getId() . '">';
    $contenu .= '<label for ="debut"> Date de début de stage: </label>';
    $contenu .= '<input type= "date" id= "debut" name= "debut" value="'. $client->getDebut() .'" min="" max="">  <br><br>';
    $contenu .= '<label for ="fin"> Date de fin du stage : </label>';
    $contenu .= '<input type="date" name ="fin" id="fin" value ="'. $client->getFin() .'"<br><br>';
    $contenu .='<label for ="section">Section : </label>';
    $contenu .='<input type="text" name = "section" id = "section" value = "'.$client->getSection().'"<br><br>';
    $contenu .= '<input type="submit" name="modifier" id="modifier" value="Modifier"> <br><br>';
    $contenu .="<a title='Accueil' href='../PHP_TP6_MVC/'>Retour affichage &#9884;</a> <br>";
    $contenu .= '</form>';

    include "template.php";

?>
