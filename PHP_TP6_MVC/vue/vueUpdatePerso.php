<?php

    $titre = "Mon Profil";
    $element = $this->modeleClient->getTuteur($_REQUEST['val']);
    $client = new Client($element);

    $contenu = '<form action="?action=ValideModifierTuteur" method="post">';
    $contenu .= '<h3>Modifier :</h3><br>';
    $contenu .= '<label for="nom">Nom: </label>';
    $contenu .= '<input type="text" name="nom" id="nom" value="' . $client->getNomtuteur() . '"> <br><br>';
    $contenu .= '<label for="prenom">Prénom: </label>';
    $contenu .= '<input type="text" name="prenom" id="prenom" value="' . $client->getPrenomtuteur() . '"> <br><br>';
    $contenu .= '<label for="telephone">Telephone: </label>';
    $contenu .= '<input type="text" name="telephone" id="telephone" value="' . $client->getTelephonetuteur() . '"> <br><br>';
    $contenu .= '<label for="email">Email: </label>';
    $contenu .= '<input type="text" name="email" id="email" value="' . $client->getEmailtuteur() . '"> <br><br>';
    $contenu .= '<input type="hidden" name="idtuteur" id="idtuteur" value="' . $client->getIdtuteur() . '">';
    $contenu .='<label for ="section">Section : </label>';
    $contenu .='<input type="text" name = "section" id = "section" value = "'.$client->getSectiontuteur().'"<br><br>';
    $contenu .= '<input type="submit" name="modifier" id="modifier" value="Modifier"> <br><br>';
    $contenu .="<a title='Accueil' href='../connexion/'>Retour Compte &#9884;</a> <br>";
    $contenu .= '</form>';

    include "template.php";

?>
