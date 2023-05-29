<?php

     class Controleur 
     {
          public $manageclient;

          public function __construct()
          {
               require_once("modele/modeleClient.php");
               $this->modeleClient = new modeleClient();
               $this->modeleClient->getConnection();
          }

          public function Dispatcher($action, $id = null)
          {
               switch ($action) 
               {
                    case 'editer' :
                         // Appeler un stage identifier par id
                         require_once("modele/client.php");
                         include 'vue/vueClient.php';
                         break;

                    case 'supprimer' :
                         // Supprimer un stage par id
                         $element = $this->modeleClient->deleteClient($id);
                         break;

                    case 'modifier' :
                         // Modifier un stage par id
                         require_once("modele/client.php");
                         include 'vue/vueUpdate.php';
                         break;

                    case 'ValideModifier' :
                         // Modifier un stage
                         $element = $this->modeleClient->updateClient($_POST);
                         break;

                    case 'ajouter' :
                         // Afficher l'ajout d'un stage
                         require_once("modele/client.php");
                         include 'vue/vueAjoutClient.php';
                         break;

                    case 'ValideAjouter' :
                         // Ajouter un stage
                         $element = $this->modeleClient->addClient($_POST);
                         break;
                        
                     
                     
                     
                     
                     
                     
                     
                    case 'ajoutertuteurs' :
                         // Afficher l'ajout d'un stage
                         require_once("modele/client.php");
                         include 'vue/vueAjoutTuteurs.php';
                         break;

                    case 'ValideAjoutertuteurs' :
                         // Ajouter un stage
                         $element = $this->modeleClient->addTuteurs($_POST);
                         break;

                   

                    case 'editerTuteurs' :
                         // Modifier lezs information d'un tuteurs
                         require_once("modele/client.php");
                         include 'vue/vueTuteur.php';
                         break;


                    case 'modifierTuteur' :
                         // Modifier un stage par id
                         require_once("modele/client.php");
                         include 'vue/vueUpdateTuteur.php';
                    break;

                    case 'ValideModifierTuteur' :
                         //Modifier un Tuteur
                         $element = $this->modeleClient->updateTuteur($_POST);
                         break;


                    case 'affichertuteurs' :
                         // On appel la liste de tous les Tuteurs
                         $clients = $this->modeleClient->getTuteurs();
                         include 'vue/vueTuteurs.php';
                         break;

                    case 'supprimerTuteurs' :
                         // Supprimer un stage par id
                         $element = $this->modeleClient->deleteTuteur($id);
                         break;

                    case 'Lier':
                         //lier le stagière et le tuteur 
                         $clients = $this->modeleClient->getClients();
                         include 'vue/vueLierTuteur.php';
                         break;

                    case 'Lier2':
                         require_once("modele/client.php");
                         include 'vue/vueLier.php';
                         break;
                    
                    case 'ValideLier2':
                         $clients = $this->modeleClient->updateLien($_POST);
                         break;

                    case 'TuteurInfo':
                         require_once("modele/client.php");
                         include 'vue/vuePerso.php';
                         break;

                    case 'modifierPerso':
                         require_once("modele/client.php");
                         include 'vue/vueUpdatePerso.php';
                    break;

                    case 'Clientperso':
                         $clients = $this->modeleClient->getClientPerso();
                         $clients = $this->modeleClient->Cookie();
                         include 'vue/vueClientperso.php';
                         break;

                    case 'accepter':
                         $clients = $this->modeleClient->Accepter($id);
                         break;
                         
                    default:
                         // On appel la liste de tous les clients
                         $clients = $this->modeleClient->getClients();
                         include 'vue/vueClients.php';
                         break;
          
               }
          }
     }

?>
        
