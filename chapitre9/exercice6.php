<?php

// Créez un objet à partir de la classe form2 de l’exercice 5, puis créez-en un clone.
// Modifiez certaines caractéristiques de cet objet, et affichez les deux formulaires obtenus.

include('exo9.4.php');

class form2 extends form
{
    protected $coderadio;
    protected $codecase;
    public function __construct($action,$titre,$methode="post")
    {
        parent::__construct($action,$titre,$methode="post");
    }

    public function setradio($name,$libelle,$value)
    {
        $this->coderadio.="<b>$libelle</b><input type=\"radio\" name=\"$name\" value=\"$value\"/><br />";
    }

    public function setcase($name,$libelle,$value)
    {
        $this->codecase.="<b>$libelle</b><input type=\"checkbox\" name=\"$name\" value=\"$value\" /><br />";
    }

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

$myform = new form2("traitementb.php","Donnez vos informations","post");
$myform->settext("nom","Votre nom : &nbsp;");
$myform->settext("code","Votre code : ");
$myform->setsubmit();
$myform->getform();
$myclone = clone $myform;
$myclone->settext("truc","Votre truc : ");
$myclone->getform();