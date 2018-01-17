<?php

// Modifiez la classe précédente en la dotant d’un constructeur.
// Réalisez les mêmes opérations de création d’objets et d’affichage.

class ville
{
    public $nom;
    public $departement;

    public function __construct($nom, $departement)
    {
        $this->nom = $nom;
        $this->departement = $departement;
    }

    public function affiche()
    {
        echo "la ville " . $this->nom . " est dans le departement " . $this->departement . "<br>";
    }
}

$maville = new ville("Paris", "75");
$maville2 = new ville("Rueil", "92");

$maville->affiche();
$maville2->affiche();

// réponse correcte

/*<?php
class ville
{
 private $nom;
 private $depart;

 public function __construct($nom,$depart)
 {
  $this->nom=$nom;
  $this->depart=$depart;
 }

 public function getinfo()
 {
  $texte="La ville de $this->nom est dans le département : $this->depart <br />";
  return $texte;
 }
}
//Création d'objets
$ville1 = new ville("Nantes","Loire Atlantique");
$ville2 = new ville("Lyon","Rhône");
echo $ville1->getinfo();
echo $ville2->getinfo();
?>*/
