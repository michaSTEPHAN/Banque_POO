<?php

class Titulaire {

    // Déclaration des attributs
    //  => private Auteur $auteur;      Permet de faire le lien avec la classe AUTEUR
    private string $nom;
    private string $prenom;
    private string $ville;
    private DateTime $dateNaissance;
    private array $compte;

    // METHODE __construct : Permet de recupérer les variales passées en paramètres dans des variables
    public function __construct(string $nom, string $prenom, string $ville, string $dateNaissance)   
    {
        $this->nom              = $nom;
        $this->prenom           = $prenom;
        $this->ville            = $ville;
        $this->dateNaissance    = new DateTime($dateNaissance);
        $this->compte           = [];
    }
    
    //-------------------------------------------------------------------
    // Creation ACCESSEUR et MUTATEUR
    //-------------------------------------------------------------------

    // ACCESSEUR ET MUTATEUR du champ NOM
    public function getNom(): string {
        return $this->nom;
    }
    public function setNom(string $nom): void{
        $this->nom = $nom;
    }
    // ACCESSEUR ET MUTATEUR du champ PRENOM
    public function getPrenom(): string {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): void{
        $this->prenom = $prenom;
    }
    // ACCESSEUR ET MUTATEUR du champ VILLE
    public function getVille(): string {
        return $this->ville;
    }
    public function setVille(string $ville): void{
        $this->ville = $ville;
    }
    // ACCESSEUR ET MUTATEUR du champ DATE_NAISSANCE
    public function getDateNaissance(): string {
        return $this->dateNaissance;
    }
    public function setDateNaissance(string $dateNaissance): void{
        $this->dateNaissance = $dateNaissance;
    }
    //-------------------------------------------------------------------

    //-------------------------------------------------------------------
    // FONCTION qui affiche 1 ligne avec les infos du compte du titulaire passé en paramètre
    //-------------------------------------------------------------------
    public function afficherInfosTitulaire()
    {
        // On charge la date de naissance dans 1 variable $naiss
        $naiss  = $this->dateNaissance;

        // On charge la date du jour dans 1 variable $djour
        $djour  = new DateTime();

        // On calcul l'age de la personne
        $age    = $djour->format('Y') - $naiss->format('Y');

        $ligne = "<br>Comptes de ".$this->nom." ".$this->prenom." né(e) le ". $naiss->format('d-m-Y')." à ".$this->ville." âge ".$age." ans : <br>";
        foreach ($this->compte as $compte) {
            $ligne  .= "   - ".$compte->getLibelle()
                ." - Solde de Compte : ".$compte->getSoldeCompte()." ".$compte->getDevise()
                ."<br>"
            ;
        }
        return $ligne;
    }    

    //-------------------------------------------------------------------
    // FONCTION qui permet de récupérer les infos du compte dans la classe TITULAIRE
    //-------------------------------------------------------------------
    public function addCompte(Compte $compte)
    {
        array_push($this->compte, $compte);
    }

    //-------------------------------------------------------------------
    // FONCTION __toString()
    //-------------------------------------------------------------------
    public function __toString()
    { 
        return $this->afficherBibliographie(); 
    }

}