<h1>Exercice BANQUE</h1>
<p>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires et leurs comptes bancaires respectifs.<br></p>
<h2>Résultat</h2>

<?php

//-------------------------------------------------------------------
// Déclaration des 2 classes nécéssaires
//-------------------------------------------------------------------
require "classes/Titulaire.php";
require "classes/Compte.php";

//-------------------------------------------------------------------
// Création des titulaires
//-------------------------------------------------------------------
$titulaire1 = new Titulaire("Stephan", "Marion", "Strasbourg", "2012-05-23");
$titulaire2 = new Titulaire("Stephan", "Pauline", "Sélestat", "2015-04-06" );

//-------------------------------------------------------------------
// Création des Comptes
//-------------------------------------------------------------------
$compte1 = new Compte("Livret Jeune", 5000, "Euros",  $titulaire1);
$compte2 = new Compte("PEL", 1000, "Dollars",  $titulaire1);
$compte3 = new Compte("Livret Jeune", 4000, "Euros",  $titulaire2);
$compte4 = new Compte("Assurance vie", 10000, "Euros",  $titulaire2);
$compte5 = new Compte("CEL", 8000, "Yens",  $titulaire2);

//-------------------------------------------------------------------
// On affiche les informations d'un titulaire
//-------------------------------------------------------------------
echo "----------------------------------------------------------<br>";
echo "     affichage des infos des titulaires                   <br>";
echo "----------------------------------------------------------<br>";
echo $titulaire1->afficherInfosTitulaire();
echo $titulaire2->afficherInfosTitulaire();

echo "<br>";
echo "----------------------------------------------------------<br>";
echo "     affichage des infos des comptes                      <br>";
echo "----------------------------------------------------------<br>";
echo $compte1->afficherInfosCompte();
echo $compte2->afficherInfosCompte();
echo $compte3->afficherInfosCompte();
echo $compte4->afficherInfosCompte();
echo $compte5->afficherInfosCompte();

echo "<br><br>";
echo "----------------------------------------------------------<br>";
echo "     affichage des infos des mouvements                   <br>";
echo "----------------------------------------------------------<br>";
//-------------------------------------------------------------------
// On crédite un compte
//-------------------------------------------------------------------
echo $compte2->crediterCompte(1000);

//-------------------------------------------------------------------
// On debite un compte
//-------------------------------------------------------------------
echo $compte2->debiterCompte(200);
echo $compte4->debiterCompte(15000);

//-------------------------------------------------------------------
// On effectue un virement de compta à compte
//-------------------------------------------------------------------
echo $compte2->virerCompte($compte5, 1500);
echo $compte1->virerCompte($compte4, 6000);