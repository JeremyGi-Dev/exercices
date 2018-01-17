<?php

// Créez deux namespaces nommés Firme::Client et Firme::Commercial possédant chacun des classes Personne.
// Chacune d'elles doit avoir des propriétés pour enregistrer les coordonnées de la personne et son code,
// un constructeur, des méthodes set()et get()pour pouvoir modifier et afficher les propriétés.
// Créez ensuite des objets représentant deux clients et un commercial.

/*Création du namespace Firme\Client fichier exo9.8.php

NB1: la notation est celle de 5.3 soit un antislash \ entre Firme et Client

<?php
namespace Firme\Client;

class Personne
{
public $nom;
public $prenom;
public $adresse;
public $ville;
public $code;

public function __construct($nom,$prenom,$adresse,$ville,$code)
{
$this->nom=$nom;
$this->prenom=$prenom;
$this->adresse=$adresse;
$this->ville=$ville;
$this->code=$code;
}
    public function set($prop, $val)
  {
        echo "Affectation de la valeur $val à la propriété $prop <br /> ";
        $this->$prop = $val;
    }

    public function get($prop)
  {
        return $this->$prop;
    }
}
?>

Création du namespace Firme\Commercial fichier exo9.8a.php

<?php
namespace Firme\Commercial;

class Personne
{
public $nom;
public $prenom;
public $adresse;
public $ville;
public $code;
public function __construct($nom,$prenom,$adresse,$ville,$code)
{
$this->nom=$nom;
$this->prenom=$prenom;
$this->adresse=$adresse;
$this->ville=$ville;
$this->code=$code;
}
    public function set($prop, $val)
  {
        echo "Affectation de la valeur $val à la propriété $prop <br /> ";
        $this->$prop = $val;
    }

    public function get($prop)
  {
        return $this->$prop;
    }
}
?>

Utilisation des namespaces. fichier exo9.8b.php

NB : remarquez que les premiers paramètres des méthodes set() et get() sont des chaînes donc entre guillemets.

<?php

require 'exo9.8.php';
require 'exo9.8a.php';
echo "<h2>Objets Client</h2>";
use Firme\Client;
$client1 = new Client\Personne("Engels","Jean"," Rue Compoint","75018 Paris",12345);
echo $client1->get("nom"),"  ",$client1->get("prenom"),"<br />";
//ou encore plus simpement, car les propriétés sont déclarées public
echo $client1->nom,"  ",$client1->prenom,"<br />";
$client1->set("code",45678);
echo "Nouveau code : ",$client1->code,"<br />";
$client2 = new Client\Personne("Jacket","Gene"," Rue Gargas","84018 Apt",54367);
echo $client2->get("nom"),"  ",$client2->get("prenom"),"<br />";
//ou encore plus simplement, car les propriétés sont déclarées public
echo $client2->nom,"  ",$client2->prenom,"<br />";
$client2->set("code",12876);
echo "Nouveau code : ",$client2->code,"<br />";
echo "<h2>Objet Commercial</h2>";
use Firme\Commercial;
$comm = new Commercial\Personne("Attin","Bar"," Rue Foch","75016 Paris",98765);
echo $comm->get("nom"),"  ",$comm->get("prenom"),"<br />";
//ou encore plus simpement, car les propriétés sont déclarées public
echo $comm->nom,"  ",$comm->prenom,"<br />";
$comm->set("code",76543);
echo "Nouveau code : ",$comm->code,"<br />";
?>*/