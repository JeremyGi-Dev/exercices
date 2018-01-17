<?php

// Créez une classe représentant une personne.
// Elle doit avoir les propriétés nom, prénom et adresse, ainsi qu’un constructeur et un destructeur.
// Une méthode getpersonne() doit retourner les coordonnées complètes de la personne.
// Une méthode setadresse() doit permettre de modifier l’adresse de la personne.
// Créez des objets personne, et utilisez l’ensemble des méthodes.

class Personne
{
    private $nom;
    private $prenom;
    private $adresse;

    public function __construct($nom, $prenom, $adresse)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
    }

    public function getPersonne()
    {
        echo $this->adresse . "<br>";
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function __destruct()
    {
        unset($this);
    }
}

$personne = new Personne("Jean", "Jacquie", "32 rue raymond queneau");
$personne->getPersonne();
$personne->setAdresse("merci jacquie et michel");
$personne->getPersonne();
$personne->__destruct();

// réponse correcte

/*<?php
class personne
{
 private $nom;
 private $prénom;
 private $adresse;

 //Constructeur
 public function __construct($nom,$prénom,$adresse)
 {
  $this->nom=$nom;
  $this->prénom=$prénom;
  $this->adresse=$adresse;
 }

 //Destructeur
 public function __destruct()
 {
  echo "<script type=\"text/javascript\">alert('La personne nommée $this->prénom $this->nom \\nest supprimée de vos contacts')</script>";
 }

 //
 public function getpersonne()
 {
  $texte=" $this->prénom $this->nom <br /> $this->adresse <br />";
  return $texte;
 }
 //
 public function setadresse($adresse)
 {
  $this->adresse=$adresse;
 }
}
//Création d'objets
$client = new personne("Geelsen","Jan"," 145 Rue du Maine Nantes");
echo $client->getpersonne();
//Modification de l'adresse
$client->setadresse("23 Avenue Foch Lyon");
echo $client->getpersonne();
//Suppression explicite du client, donc appel du destructeur
unset($client);
//Fin du script
echo "Fin du script";
?>