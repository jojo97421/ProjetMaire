<?php
    /* Accès à la table client de la base de données *************************/
    class Client {

        // Connection
        private $cnx;

        // Colonne
        public $id;
        public $nom;
        public $prenom;
        public $email;
        public $telephone;
        public $etablissement;
        public $niveau;
        public $debut;
        public $fin;
        public $section;
        public $perso;
        public $idtuteur;
        public $nomtuteur;
        public $prenomtuteur;
        public $emailtuteur;
        public $telephonetuteur;
        public $sectiontuteur;
        public $lien;
        public $lientuteur;
        public $pseudo;
        public $mdp;
        public $rang;

        // Connexion à la base de données
        public function __construct(array $donnees){
            $this->hydrater($donnees);
        }

        public function hydrater(array $donnees){
            foreach ($donnees as $key => $value){
                // On récupère le nom du setter correspondant à l'attribut.
                $method = 'set'.ucfirst($key);
    
                // Si le setter correspondant existe.
                if (method_exists($this, $method)){
                    // On appelle le setter.
                    $this->$method($value);
                }
            }
        }
    
        // Getters
        public function getId()         {return $this->id;}
        public function getNom()        {return $this->nom;}
        public function getPrenom()     {return $this->prenom;}
        public function getEmail()      {return $this->email;}
        public function getTelephone()  {return $this->telephone;} 
        public function getEtablissement()    {return $this->etablissement;} 
        public function getNiveau()     {return $this->niveau;}
        public function getDebut()      {return $this->debut;}
        public function getFin()        {return $this->fin;}
        public function getSection()    {return $this->section;}   
        public function getPerso()      {return $this->perso;}
        public function getIdtuteur()   {return $this->idtuteur;}
        public function getNomtuteur()  {return $this->nomtuteur;}
        public function getPrenomtuteur()   {return $this->prenomtuteur;}
        public function getEmailtuteur()    {return $this->emailtuteur;}
        public function getTelephonetuteur(){return $this->telephonetuteur;}
        public function getSectiontuteur()  {return $this->sectiontuteur;}
        public function getLien()        {return $this->lien;}
        public function getLientuteur()  {return $this->lientuteur;}
        public function getPseudo()      {return $this->pseudo;}
        public function getMdp()         {return $this->mdp;}
        public function getRang()        {return $this->rang;}

        // Setters
        public function setId($id)              {$this->id      = $id;}
        public function setNom($nom)            {$this->nom    = $nom;}
        public function setPrenom($prenom)      {$this->prenom = $prenom;}
        public function setEmail($email)        {$this->email   = $email;}
        public function setTelephone($telephone){$this->telephone   = $telephone;}
        public function setEtablissement($etablissement)    {$this->etablissement   = $etablissement;}
        public function setNiveau($niveau)      {$this->niveau = $niveau;}
        public function setDebut($debut)        {$this->debut = $debut;}
        public function setFin($fin)            {$this->fin = $fin;}
        public function setSection($section)    {$this->section = $section;}
        public function setPerso($perso)        {$this->perso = $perso;}
        public function setIdtuteur($idtuteur)  {$this->idtuteur    =$idtuteur;}
        public function setNomtuteur($nomtuteur){$this->nomtuteur   =$nomtuteur;}
        public function setPrenomtuteur($prenomtuteur){$this->prenomtuteur   =$prenomtuteur;}
        public function setEmailtuteur($emailtuteur){$this->emailtuteur  =$emailtuteur;}
        public function setTelephonetuteur($telephonetuteur){$this->telephonetuteur  =$telephonetuteur;}
        public function setSectiontuteur($sectiontuteur){$this->sectiontuteur    =$sectiontuteur;}
        public function setLien($lien)          {$this->lien = $lien;}
        public function setLientuteur($lientuteur){$this->lientuteur = $lientuteur;}
        public function setPseudo($pseudo)       {$this->pseudo = $pseudo;}
        public function setMdp($mdp)             {$this->mdp = $mdp;}
        public function setRang($rang)           {$this->rang = $rang;}

    }
?>