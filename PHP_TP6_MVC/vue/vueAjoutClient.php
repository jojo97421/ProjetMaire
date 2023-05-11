<?php

    $titre = "Ajouter Stage";
    $element = $this->modeleClient->getClient($_REQUEST['val']);
    $client = new Client($element);

    $contenu = '<form action="?action=ValideAjouter" method="post">';
    $contenu .= '<h3>Ajouter :</h3><br>';
    $contenu .= '<label for="nom">Nom: </label>';
    $contenu .= '<input type="text" name="nom" id="nom" required> <br><br>';
    $contenu .= '<label for="prenom">Prénom: </label>';
    $contenu .= '<input type="text" name ="prenom" id = "prenom" required> <br><br>';
    $contenu .= '<label for="telephone">Telephone: </label>';
    $contenu .= '<input type="text" name="telephone" id="telephone" required> <br><br>';
    $contenu .= '<label for="email">Email: </label>';
    $contenu .= '<input type="mail" name="email" id="email" required> <br><br>';
    $contenu .= ' <hr Align= Center width = "835">
    <h4><strong>Etablissement Scolaire (cochez la case) :</strong><h4>

<div>
    <input type = "radio" id="etablissement" name = "etablissement" value = "Lycee" required>
    <label for="Lycee">Lycée</label>
    <input type = "radio" id="etablissement" name = "etablissement" value = "College" required>
    <label for="Lycee">Collège</label>
    <input type = "radio" id="etablissement" name = "etablissement" value = "Centreformation" required>
    <label for="Centreformation">Centre de formation</label>
    <input type = "radio" id="etablissement" name = "etablissement" value = "autre" required>
    <label for="Autre">Autre</label>
</div>';

    $contenu .= '<hr Align= Center width = "835">
    <h4><strong>Niveau d\'étude :</strong><h4>
    
        <input type = "radio" id="niveau" name = "niveau" value = "CAP" required>CAP 
        <input type = "radio" id="niveau" name = "niveau" value = "BAC PRO" required>BAC PRO 
        <input type = "radio" id="niveau" name = "niveau" value = "3ème" required>3ème 
        <input type = "radio" id="niveau" name = "niveau" value = "BTS" required>BTS 
        <input type = "radio" id="niveau" name = "niveau" value = "Autre" required>Autre <br><br>';

    $contenu .= '<label for ="debut"> Date de début de stage: </label>';
    $contenu .= '<input type= "date" id= "debut" name= "debut" value="" min="" max="" required>  <br><br>';
    $contenu .= '<label for ="fin"> Date de fin du stage : </label>';
    $contenu .= '<input type="date" name ="fin" id="fin" value ="" required><br><br>';

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
    $contenu .= '<input type="submit" name="ajouter" id="ajouter" value="Ajouter"> <br><br>';
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