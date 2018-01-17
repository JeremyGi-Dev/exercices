<?php

// Créez une classe nommée form représentant un formulaire HTML.
// Le constructeur doit créer le code d’en-tête du formulaire en utilisant les éléments <form> et <fieldset>.
// Une méthode settext() doit permettre d’ajouter une zone de texte.
// Une méthode setsubmit() doit permettre d’ajouter un bouton d’envoi.
// Les paramètres de ces méthodes doivent correspondre aux attributs des éléments HTML correspondants.
// La méthode getform() doit retourner tout le code HTML de création du formulaire.
// Créez des objets form, et ajoutez-y deux zones de texte et un bouton d’envoi. Testez l’affichage obtenu.

class form
{
    public function __construct()
    {
        echo "<form method='post' action='exercice4.php'>";
        echo "<fieldset><legend>voici le form</legend>";
    }

    public function setText()
    {
        $content = "<textarea></textarea><br><br>";
        return $content;
    }

    public function setSubmit()
    {
        $button = "<button type='submit'>Envoyer</button>";
        return $button;
    }

    public function getForm()
    {
        return $this->setText() . "<br>" . $this->setSubmit();
    }
}

$form = new form();

echo $form->setText();

echo $form->getForm();

// réponse correcte

/*?php
class form
{
 protected $code;
 protected $codeinit;
 protected $codetext;
 protected $codesubmit;

 public function __construct($action,$titre,$methode="post")
 {
  $this->codeinit="<form action=\"$action\" method=\"$methode\">";
  $this->codeinit.="<fieldset><legend><b>$titre</b></legend>";
 }

 public function settext($name,$libelle,$methode="post")
 {
  $this->codetext.="<b>$libelle</b><input type=\"text\" name=\"$name\" /><br /><br />";
 }

 public function setsubmit($name="envoi",$value="Envoyer")
 {
  $this->codesubmit="<input type=\"submit\" name=\"$name\" value=\"Envoyer\"/><br />";
 }

 public function getform()
 {
  $this->code="";
  $this->code.=$this->codeinit;
  $this->code.=$this->codetext;
  $this->code.=$this->codesubmit;
  $this->code.="</fieldset></form>";
 echo $this->code;
 }
}
?>

Le fichier exo9.4b.php inclus le fichier précédent et creé un objet de type form,
pour lequel vous pouvez récupérer le fichier traitement.php qui gère les données saisies (voir le chapitre 6)
<?php
include('exo9.4.php');
//***************************
$myform = new form("traitement.php","Accès au site","post");
$myform->settext("nom","Votre nom : &nbsp;");
$myform->settext("code","Votre code : ");
$myform->setsubmit();
$myform->getform();
?>*/