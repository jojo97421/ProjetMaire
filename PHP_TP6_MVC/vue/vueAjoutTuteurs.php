<?php

    $titre = "Ajouter Tuteur";
    $element = $this->modeleClient->getTuteurs($_REQUEST['val']);
    $client = new Client($element);

    $contenu = '<form action="?action=ValideAjoutertuteurs" method="post">';
    $contenu .= '<h3>Ajouter Tuteurs :</h3><br>';
    $contenu .= '<label for="nom">Nom: </label>';
    $contenu .= '<input type="text" name="nom" id="nom" required> <br><br>';
    $contenu .= '<label for="prenom">Prénom: </label>';
    $contenu .= '<input type="text" name ="prenom" id = "prenom" required> <br><br>';
    $contenu .= '<label for="telephone">Telephone: </label>';
    $contenu .= '<input type="text" name="telephone" id="telephone" required> <br><br>';
    $contenu .= '<label for="email">Email: </label>';
    $contenu .= '<input type="mail" name="email" id="email" required> <br><br>';

    $contenu .= '
    <h4>Spécialité :</h4>

        <input type = "radio" id="AEPE" name = "section" value = "AEPE" onchange = "gethidden()" required>AEPE 
        <input type = "radio" id="APH" name = "section" value = "APH" onchange ="gethidden()" required>APH 
        <input type = "radio" id="ASSP" name = "section" value = "ASSP" onchange ="gethidden()" required>ASSP
        <input type = "radio" id="découverte" name = "section" value = "Découverte de métier" onchange = "getinfo()"
         required">Découverte de métier 
        <input type = "radio" id="Autreradiospé" name = "section" value = "Autre" onchange = "getinfo()" required">Autre

        <input type = "hidden" id = "Autrespé" name = "sections" placeholder = "Precisez" value="" required>

<hr Align= Center width = "835">';
    $contenu .= '<input type="submit" name="ajoutertuteurs" id="ajoutertuteurs" value="Ajouter"> <br><br>';
    $contenu .= '</form>';
    $contenu .= ' <script>
                function getinfo(){
                    var txt = document.getElementById("Autrespé");
                    txt.type = "text"
                }
                
                function gethidden(){
                var txt = document.getElementById("Autrespé");
                txt.type = "hidden"
                
                }</script>';

    include "template.php";

?>