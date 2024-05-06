<?php

class Compte {

    // Déclaration des attributs
    //  => private Titulaire $titulaire;      Permet de faire le lien avec la classe TITULAIRE
    private string $libelle;
    private float $soldeCompte;
    private string $devise;
    private Titulaire $titulaire;
    
    // METHODE __construct : Permet de recupérer les variales passées en paramètres dans des variables
    public function __construct(string $libelle, float $soldeCompte, string $devise, Titulaire $titulaire)   
    {
        $this->libelle         = $libelle;
        $this->soldeCompte     = $soldeCompte;
        $this->devise          = $devise;
        // lien avec la classe TITULAIRE qui servira à récupérer les infos du livre dans la classe COMPTE
        $this->titulaire = $titulaire;
        $titulaire->addCompte($this);
    }
    
    //-------------------------------------------------------------------
    // Creation ACCESSEUR et MUTATEUR
    //-------------------------------------------------------------------
    // ACCESSEUR ET MUTATEUR du champ LIBELLE
    public function getLibelle(): string {
        return $this->libelle;
    }
    public function setLibelle(string $libelle): void{
        $this->libelle = $libelle;
    }
    // ACCESSEUR ET MUTATEUR du champ DEVISE
    public function getDevise(): string {
        return $this->devise;
    }
    public function setDevise(float $devise): void{
        $this->devise = $devise;
    }
    // ACCESSEUR ET MUTATEUR du champ TITULAIRE
    public function getTitulaire(): Titulaire {
        return $this->titulaire;
    }
    public function setTitulaire(Titulaire $titulaire): void{
        $this->titulaire = $titulaire;
    }
    //-------------------------------------------------------------------

    //-------------------------------------------------------------------
    // Gestion du Solde du compte après mouvement
    //-------------------------------------------------------------------
    public function getSoldeCompte(): string {
        return $this->soldeCompte;
    }
    public function setSoldeCompte(float $montant, string $affiche) {        
        $this->soldeCompte += $montant;
        $messageSolde = "Le nouveau solde du compte ".$affiche." est de " . $this->soldeCompte . " " . $this->devise . "<br>";
        echo $messageSolde;
    }

    //-------------------------------------------------------------------
    // FONCTION qui affiche les infos d'un compte passé en paramètre
    //-------------------------------------------------------------------
    public function afficherInfosCompte()
    {
        echo "<br>Le Compte : ".$this->libelle." qui appartient à ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom()
            ." a un solde de ".$this->soldeCompte." ".$this->devise;
    }    

    //-------------------------------------------------------------------
    // FONCTION qui permet de créditer un compte
    //-------------------------------------------------------------------     
    public function crediterCompte(float $montant) {
        $messageCrediter = "<br>On crédite le compte ".$this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom()." de ".$montant." ".$this->getDevise()."<br>";        
        echo $messageCrediter;
        $aff = $this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom();
        $this->setSoldeCompte($montant, $aff);
    }

    //-------------------------------------------------------------------
    // FONCTION qui permet de débiter un compte
    //-------------------------------------------------------------------
    public function debiterCompte(float $montant) {

        // On vérifie si le solde sur les compte à débiter est suffisant
        if ($montant > $this->soldeCompte) {
            $messageDebiter = "<br>On veut débiter le compte ".$this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom()." de ".$montant." ".$this->getDevise()
                ." mais le montant sur le compte est insuffisant"
                ."<br>";        
            echo $messageDebiter;
        } else {
            $messageDebiter = "<br>On débite le compte ".$this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom()." de ".$montant." ".$this->getDevise()."<br>";
            echo $messageDebiter;
            
            $aff = $this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom();
            $this->setSoldeCompte(-$montant, $aff);        
        }
    }

    //-------------------------------------------------------------------
    // FONCTION qui permet de faire un virement de compte à compte
    //-------------------------------------------------------------------
    public function virerCompte(compte $cpteplus, int $montant) {

        // On vérifie si le solde sur les compte à débiter est suffisant
        if ($montant > $this->soldeCompte) {
            $messageVirer = "<br>On veut virer ".$montant." ".$this->getDevise()
                ." du compte ".$this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom()
                ." sur le compte ".$cpteplus->getLibelle()." de ".$cpteplus->getTitulaire()->getNom(). " ".$cpteplus->getTitulaire()->getPrenom()
                ." mais le montant sur le compte à débiter est insuffisant"
                ."<br>";        
            echo $messageVirer;

        } else {
            $messageVirer = "<br>On vire ".$montant." ".$this->getDevise()
                ." du compte ".$this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom()
                ." sur le compte ".$cpteplus->getLibelle()." de ".$cpteplus->getTitulaire()->getNom(). " ".$cpteplus->getTitulaire()->getPrenom()
                ."<br>";   
            echo $messageVirer;
            $aff1 = $this->getLibelle()." de ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom();
            $aff2 = $cpteplus->getLibelle()." de ".$cpteplus->getTitulaire()->getNom(). " ".$cpteplus->getTitulaire()->getPrenom();
            $this->setSoldeCompte(-$montant, $aff1);
            $cpteplus->setSoldeCompte($montant, $aff2);

        }      
    }

    //-------------------------------------------------------------------
    // FONCTION __toString()
    //-------------------------------------------------------------------
    public function __toString()
    {
        return "Libelle : $this->libelle, 
            Solde Compte : $this->soldeCompte,                         
            Devise : $this->devise";
    }

}