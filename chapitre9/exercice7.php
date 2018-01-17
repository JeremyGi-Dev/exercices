<?php

// Créez une classe abstraite représentant une personne.
// Elle déclare les propriétés nom et prénom et un constructeur.
// Créez une classe client dérivée de la classe personne en y ajoutant la propriété adresse et une méthode setcoord()
// qui affiche les coordonnées complètes de la personne.
// Créez une classe électeur dérivée de la même classe abstraite, et ajoutez-y deux propriétés bureau_de_vote et vote,
// ainsi qu’une méthode avoter(), qui enregistre si une personne a voté dans la propriété vote.



// Les propriétés nom et prenom qui sont déclarées private dans la classe abstraite (repères 1 et 2)
// sont redéfinies comme public dans la classe electeur (repères 3 et 4)
// car sinon nous ne pourrions pas les lire lors du contrôle du vote( repères 5 et 6) car la classe electeur ne possède pas de méthode getinfo().

//Classe personne

abstract class personne
{
    private $nom;//1
    private $prenom;//2
    abstract protected function __construct($a,$b,$c);
}

//Classe client

class client extends personne
{
    private $nom;
    private $prenom;
    private $adresse;
    public function __construct($nom,$prenom,$adresse)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->adresse=$adresse;
    }

    public function getcoord()
    {
        $info="Le client $this->prenom $this->nom habite $this->adresse <br />";
        return $info;
    }
}

//Classe electeur

class electeur extends personne //
{
    public $nom;//3
    public $prenom;//4
    public $bureau_de_vote;
    public $vote;
    function __construct($nom,$prenom,$bureau_de_vote)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->bureau_de_vote=$bureau_de_vote;
    }
    public function avoter()
    {
        $this->vote=TRUE;
    }
}

//Création d'objets
$client1 = new client("Delmas","Jacquou","Bordeaux");
echo "<h4>", $client1->getcoord()," </h4>";
$electeur1 = new electeur("Tintin","Milan","Brussel 5");
//L'électeur vote
$electeur1->avoter();
//Controle du vote
if($electeur1->vote)
{echo "L'électeur $electeur1->prenom $electeur1->nom inscrit au bureau $electeur1->bureau_de_vote a voté <br />";}//5
else
{echo "L'électeur $electeur1->prenom $electeur1->nom inscrit au bureau $electeur1->bureau_de_vote peut encore voter <br />";}//6