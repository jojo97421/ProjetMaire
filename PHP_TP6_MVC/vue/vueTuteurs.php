<?php
    require_once("modele/client.php");
    $titre = "Tuteurs Lister";
    $clients = $this->modeleClient->getTuteurs();
    $contenu = "<div>";
    $contenu .= "<article>";
    $contenu .= "<h2>Liste des Tuteurs</h2>";
    $contenu .= "<article>";
    $contenu .= "<table id='trier'>
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