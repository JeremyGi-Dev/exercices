<?php

// Exercice 1

// Créez une fonction PHP qui affiche une boîte d'alerte à partir de la fonction JavaScript dont la syntaxe est alert("chaine_de caractères").
// Cette fonction peut être appelée avec comme paramètre le texte du message à afficher.
// Elle est particulièrement utile pour afficher des messages d’erreur de manière élégante, sans que ces derniers restent écrits dans la page.
//La fonction retourne la valeur TRUE. Ceci n’est pas obligatoire mais peut permettre un contrôle d’exécution.

function alerte($ch)
{
    echo "<script type=\"text/javascript\"> alert('$ch'); </script>";
    return TRUE;
}
//Utilisation
if(alerte("Bonjour à tous")) echo "La fonction alerte() fonctionne
bien";
alerte('RAAAAAAAAAAAAAAAAAA');

// Exercice 2

// Écrivez une fonction de lecture de tableaux multidimensionnels en vous inspirant de l’exemple 7.3.
// L'affichage se fait sous forme de tableau HTML dont les titres sont les clés des tableaux.

function tabmulti($tab,$bord)
{
    echo "<table border=\"$bord\" width=\"100%\"><tbody>";

    foreach($tab as $cle=>$tab2)
    {
        echo "<tr><th>$cle</th> ";

        foreach($tab2 as $ind=>$val)
        {
            echo "<td>$val </td>";
        }
        echo "</tr>";
    }
    echo "</tbody> </table>";
}
$tab1 = array("France" => array("Paris", "Lyon", "Marseille", "Nantes", "Lille"),
              "Allemagne" => array("Berlin" ,"Hambourg", "Hanovre", "Munich", "Cologne"),
              "Espagne" => array("Madrid", "Bilbao", "Grenade", "Barcelone", "Séville"));

tabmulti($tab1,1);

// Exercice 3

// Écrivez une fonction qui retourne la somme de la série de terme général un = x2n + 1/n!.
// Les paramètres de la fonction sont n pour le nombre d’itérations et d pour le nombre de décimales affichées pour le résultat.
// Il est possible de réutiliser la fonction prod() présentée dans ce chapitre pour calculer la factorielle n!.

function somme($n,$d,$x)
{
    $som=0;
    $fact=1;
    for($i=0;$i<=$n;$i++)
    {
        if($i==0) {$fact=1 ;}
        else {$fact*=$i;}

        $som+= (pow($x,2*$i+1))/$fact;
    }
    return round($som,$d);
}
echo somme(10,6,1);


// Exercice 4

// Écrivez une fonction dont le paramètre passé par référence est un tableau de chaînes de caractères
// et qui transforme chacun des éléments du tableau de manière que le premier caractère soit en majuscule et les autres en minuscules,
// quelle que soit la casse initiale des éléments, même si elle est mixte.

function initmaj(&$tab)
{
    foreach($tab as $ind=>$val)
    {
        $tab[$ind]=ucfirst(strtolower($val));
    }
    return $tab;
}

$tabch= array("AzertToTO","Sous peAu","sARtHES jp");
print_r(initmaj($tabch));

// Exercice 5

// À partir de la fonction sinus de PHP, écrivez une fonction qui donne le sinus d’un angle donné en radian, en degré ou en grade.
// Les paramètres sont la mesure de l’angle et l’unité est symbolisée par une lettre. Le deuxième paramètre doit avoir une valeur par défaut correspondant aux radians.

function sinus($x,$unit)
{
    switch($unit)
    {
        case "R":
        case"r":
            return sin($x);
            break;
        case "D":
        case"d":
            return sin($x/180*PI());
            break;
        case "G":
        case"g":
            return sin($x/200*PI());
            break;
    }
}
//Utilisation
echo sinus(PI()/6,"R"),"<br />";
echo sinus(60,"d"),"<br />";
echo sinus(100,"g"),"<br />";

// Exercice 6

// Créez une fonction de création de formulaires comprenant une zone de texte, une case d’option (radio button),
// un bouton Submit et un bouton Reset. Choisissez comme paramètres les attributs des différents éléments HTML en cause.
// Chaque appel de la fonction doit incorporer le code HTML du formulaire à la page.

function form1($action,$methode,$libtexte,$nomtexte,$libradio,$nomradio,$valradio,$libsubmit,$libreset)
{
    $code ="<form action=\"$action\" method=\"$methode\" >";
    $code.="<fieldset><legend>Complétez</legend>";
    $code.="<label><b> $libtexte </b></label> <input type=\"text\" name=\"$nomtexte\" /><br />";
    $code.="<label><b> $libradio </b></label><input type=\"radio\" name=\"$nomradio\" value=\"$valradio\" /><br />";
    $code.="<input type=\"submit\" value=\"$libsubmit\" />&nbsp;&nbsp;&nbsp;";
    $code.="<input type=\"reset\" value=\"$libreset\" /><br />";
    $code.="</fieldset>";
    $code.="</form>";
    return $code;
}
//Utilisation
echo form1("machin.php","post","Nom","nom","Abonné","abonn","oui","Envoi","Effacer");
echo form1("truc.php","post","Loisirs","loisir","Amateur","amat","oui","Envoi","Effacer");

// Exercice 7

// Décomposez la fonction précédente en plusieurs fonctions de façon à constituer un module complet de création de formulaire.
// Au total, il doit y avoir: une fonction pour l’en-tête du formulaire, une pour le champ texte, une pour la case d’option,
// une pour les boutons Submit et Reset et une pour la fermeture du formulaire.
// Incorporez ces fonctions dans un script, et utilisez-les pour créer un formulaire contenant un nombre quelconque de champ de saisie de texte et de cases d’option.

function form($action,$methode,$legend)
{
    $code ="<form action=\"$action\" method=\"$methode\" >\n";
    $code.="<fieldset><legend>$legend</legend>\n";
    return $code;
}

//Définition de la fonction text
function text($libtexte,$nomtexte)
{
    $code="<label><b> $libtexte </b></label> <input type=\"text\" name=\"$nomtexte\" /><br />\n";
    return $code;
}

//Définition de la fonction radio
function radio($libradio,$nomradio,$valradio)
{
    $code="<label><b> $libradio </b></label><input type=\"radio\" name=\"$nomradio\" value=\"$valradio\" /><br />\n";
    return $code;
}

//Définition de la fonction submit
function submit($libsubmit,$libreset)
{
    $code="<input type=\"submit\" value=\"$libsubmit\" />&nbsp;&nbsp;&nbsp;\n";
    $code.="<input type=\"reset\" value=\"$libreset\" /><br />\n";
    return $code;
}

//Définition de la fonction finform
function finform()
{
    $code="</fieldset></form>\n";
    return $code;
}
// fichier separé cible.php
include('cible.php');
//Utilisation
$code= form("machin.php","post","Complétez le formulaire");
$code.= text("Votre nom","nom");
$code.= text("Votre prénom","prenom");
$code.= radio("Paris","ville","paris");
$code.= radio("Lyon","ville","lyon");
$code.= submit("Envoyer","Effacer");
$code.= finform();
echo $code;

// Exercice 8

// Réaliser la programmation des coefficients du binôme (ou triangle de Pascal). Pour mémoire, il s'agit de la suite suivante:

function pascal($i,$j)
{
 //$i la ligne et $j la colonne du triangle
 if($j==1 OR $i==$j-1) return 1;
 else
 {
  $coeff= pascal($i-1,$j) + pascal($i-1,$j-1);
  return $coeff;
 }
}
//Utilisation de la fonction pascal() au degré 7 et affichage du triangle de Pascal
for($i=0;$i<=7;$i++)
{
 for($j=1;$j<=$i+1;++$j)
 {
  echo pascal($i,$j),"&nbsp;&nbsp;";
 }
 echo "<br />";
}

// Exercice 9

// Créez une fonction anonyme qui retourne la division entière de deux nombres.

//Création
//$vardiv=function($a,$b){ echo "Entière = ",$a%$b;};
//Appel
//$vardiv(22,7);
echo "<br/>";
//Création
$vardiv = function($a,$b){ return floor($a/$b);};
//Appel test : partie entière de 239/27
echo "Quotient = ",$vardiv(239,27);//Affiche 8

// Résultats obtenus : 8/9

// observations : revoir l'exercice 4 car pas bien compris !