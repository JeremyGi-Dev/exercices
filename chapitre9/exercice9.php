<?php

// Intégrez les méthodes magiques connues à au moins une des classes de l'exercice 8 après avoir déclaré la propriété code comme protected.

/*<?php

namespace Firme\Client;

class Personne
{
 protected $nom;
 public $prenom;
 public $adresse;
 public $ville;
 protected $code;

 public function __construct($nom,$prenom,$adresse,$ville,$code)
 {
  $this->nom=$nom;
  $this->prenom=$prenom;
  $this->adresse=$adresse;
  $this->ville=$ville;
  $this->code=$code;
 }

 public function __set($prop, $val)
 {
  echo "Affectation de la valeur $val à la propriété $prop <br /> ";
  $this->$prop = $val;
 }

 public function __get($prop)
 {
  return $this->$prop;
 }
}
?>

Création du namespace Firme\Commercial fichier exo9.9a.php

<?php

namespace Firme\Commercial;

class Personne
{
 public $nom;
 public $prenom;
 public $adresse;
 public $ville;
 protected $code;

 public function __construct($nom,$prenom,$adresse,$ville,$code)
 {
  $this->nom=$nom;
  $this->prenom=$prenom;
  $this->adresse=$adresse;
  $this->ville=$ville;
  $this->code=$code;
 }

 public function __set($prop, $val)
 {
  echo "Affectation de la valeur $val à la propriété $prop <br /> ";
  $this->$prop = $val;
 }

 public function __get($prop)
 {
  return $this->$prop;
 }
}
?>

Utilisation des namespaces fichier exo9.9b.php

<?php
require 'exo9.9.php';
require 'exo9.9a.php';
echo "<h2>Objets Client</h2>";
use Firme\Client;
$client1 = new Client\Personne("Engels","Jean"," Rue Compoint","75018 Paris",12345);
echo $client1->nom,"  ",$client1->prenom,"<br />";
$client1->code=45678;
echo "Nouveau code : ",$client1->code,"<br />";
$client2 = new Client\Personne("Jacket","Gene"," Rue Gargas","84018 Apt",54367);
echo $client2->nom,"  ",$client2->prenom,"<br />";
$client2->code=12876;
echo "Nouveau code : ",$client2->code,"<br />";
echo "<h2>Objet Commercial</h2>";
use Firme\Commercial;
$comm = new Commercial\Personne("Attin","Bar"," Rue Foch","75016 Paris",98765);
echo $comm->nom,"  ",$comm->prenom,"<br />";
$comm->code=76543;
echo "Nouveau code : ",$comm->code,"<br />";
?>*/
