<?php

include "exercice4.php";

// Créez une sous-classe nommée form2 en dérivant la classe form de l’exercice 4.
// Cette nouvelle classe doit permettre de créer des formulaires ayant en plus des boutons radio et des cases à cocher.
// Elle doit donc avoir les méthodes supplémentaires qui correspondent à ces créations. Créez des objets, et testez le résultat.

class form2 extends form
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setText()
    {
        return parent::setText();
    }

    public function setRadio()
    {
        echo "<select></select>";
    }

    public function setCase()
    {
        echo "<input type=checkbox />";
    }

    public function setSubmit()
    {
        return parent::setSubmit();
    }

    public function getForm()
    {
        return $this->setText() . $this->setRadio() . $this->setCase() . $this->setSubmit();
    }
}

$form2 = new form2();

$form2->getForm();

// réponse correcte

/*<?php
include('exo9.4.php');
class form2 extends form
{
 protected $coderadio;
 protected $codecase;
 public function __construct($action,$titre,$methode="post")
 {
  parent::__construct($action,$titre,$methode="post");
 }
 //********************************************
 public function setradio($name,$libelle,$value)
 {
  $this->coderadio.="<b>$libelle</b><input type=\"radio\" name=\"$name\" value=\"$value\"/><br />";
 }
 //************************************************
 public function setcase($name,$libelle,$value)
 {
  $this->codecase.="<b>$libelle</b><input type=\"checkbox\" name=\"$name\" value=\"$value\" /><br />";
 }
 //**************************
 public function getform()
 {
  $this->code="";
  $this->code.=$this->codeinit;
  $this->code.=$this->codetext;
  $this->code.=$this->coderadio;
  $this->code.=$this->codecase;
  $this->code.=$this->codesubmit;
  $this->code.="</fieldset></form>";
  echo $this->code;
 }
}
//***************************
$myform = new form2("traitementb.php","Coordonnées et sports préférés","post");
$myform->settext("nom","Votre nom : &nbsp;");
$myform->settext("code","Votre code : ");
$myform->setradio("sexe"," Homme ","homme");
$myform->setradio("sexe"," Femme ","femme");
$myform->setcase("loisir"," Tennis ","tennis");
$myform->setcase("loisir"," Equitation ","équitaion");
$myform->setcase("loisir"," Football ","football");
$myform->setsubmit();
$myform->getform();
?>*/