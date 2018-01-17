<?php

// Écrivez une classe représentant une ville.
// Elle doit avoir les propriétés nom et département et une méthode affichant « la ville X est dans le département Y ».
// Créez des objets ville, affectez leurs propriétés, et utilisez la méthode d’affichage.

class ville
{
    public $nom;
    public $departement;

    public function affiche()
    {
        echo "la ville " . $this->nom . " est dans le departement " . $this->departement . "<br>";
    }
}

$maville = new ville;
$maville2 = new ville;

$maville->nom = "Paris";
$maville2->nom = "Rueil";
$maville->departement = "75";
$maville2->departement = "92";
$maville->affiche();
$maville2->affiche();

// réponse correcte

/* <?php
class ville
{
 public $nom;
 public $depart;
 public function getinfo()
 {
  $texte="La ville de $this->nom est dans le département : $this->depart <br />";
  return $texte;
 }
}
//Création d'objets
$ville1 = new ville();
$ville1->nom="Nantes";
$ville1->depart="Loire Atlantique";
$ville2 = new ville();
$ville2->nom="Lyon";
$ville2->depart="Rhône";
echo $ville1->getinfo();
echo $ville2->getinfo();
?> */