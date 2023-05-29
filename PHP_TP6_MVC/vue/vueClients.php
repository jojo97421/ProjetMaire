<?php
    require_once("modele/client.php");
    $titre = "Stage Lister";
    $clients = $this->modeleClient->getClients();
    $contenu = "<div>";
    $contenu .= "<article>";
    $contenu .= "<h2>Liste des Stages</h2>";
    $contenu .= "<article>";
    $contenu .= "<table id ='trier'>
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
                        <a title='Détails' href='?action=editer&val=".$client->getId()."'>&#128270</a>
                        | 
                        <a title='Supprimer' href='?action=supprimer&val=".$client->getId()."'>&#128465;</a>
                        | 
                        <a title='Modifier' href='?action=modifier&val=".$client->getId()."'>&#128271;</a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .="<br><a title='Ajouter' href='?action=ajouter&val=".$client->getId()."'>Ajouter &#8862;</a>";
    $contenu .="<br><br>";
    $contenu .="<a title='Modifier' href='../connexion/'>Retour au compte &#9884;</a> <br>";
   // $contenu .="<br><a title='Personalisé' href='?action=perso&val=".$client->getId()."'>Requète personalisé &#8862;</a>";
    $contenu .="<br><br>";
    $contenu .="<a title='AjouterTuteurs'href='?action=affichertuteurs&val='>Afficher Tuteurs </a>";
    $contenu .= "</article>";
    $contenu .= "</div>";
    $contenu .="<form name='perso' method = 'post' action=''>";
    include "template.php";

?>
<link href="https://cdn.datatables.net/v/bs4/jqc-1.12.4/dt-1.13.4/sc-2.1.1/datatables.min.css" rel="stylesheet"/>
 
 <script src="https://cdn.datatables.net/v/bs4/jqc-1.12.4/dt-1.13.4/sc-2.1.1/datatables.min.js"></script>

 <script>
    // Initialisation de DataTables sur la table avec l'id "tableau_clients"
    $("#trier").dataTable({
        "pageLength":5,
        "responsive": true,
        "lengthChange":false,
        "language": {
            "emptyTable": "Aucun élément trouvé ",
            "info": "",
            "infoEmpty": "Aucun donnée disponible",
            "loadingRecords": "Chargement...",
            "processing": "En cours...",
            "search":   "Rechercher:",
            "searchPlaceholder": "Entrez une donnée à rechercher",
            "zeroRecords": "L'élément recherché n'existe pas",
            "paginate":{
                "first": "Premier",
                "last":  "Dernier",
                "next":  "Suivant",
                "previous": "Précédent"
            }
        }
    });
    
</script>