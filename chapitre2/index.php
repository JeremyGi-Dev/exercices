Exercice 1

Parmis les variables suivantes: lesquelles ont un nom valide:

mavar, $mavar, $var5, $_mavar, $_5var, $__élément1, $hotel4* ?

ma réponse : $mavar, $var5, $_mavar

réponse correcte: $mavar, $var5, $_mavar, $_5var, $__élément1

$__élément1 respectent les conventions. Les autres ne sont pas valides : mavar ne commence pas par le caractère $ et $hotel4* se termine par le caractère *

*****************************************************************

Exercice 2

Donner les valeurs de $x, $y, $z à la fin du script suivant :
<?php
$x="PostgreSQL";
$y="MySQL";
$z=&$x;
$x="PHP 5";
$y=&$x;
?>

ma réponse: $x="PHP 5";
            $y="PHP 5";
            $z="PostgreSQL";

réponse correcte : les variables $x, $y et $z valent toutes "PHP 5"

**********************************************************************************

Exercice 3

Lire les valeurs des variables du script de l’exercice 2 à l’aide du
tableau $GLOBALS.
<?php
$x="PostgreSQL";
$y="MySQL";
$z=&$x;
$x="PHP 5";
$y=&$x;
?>

ma réponse : $GLOBALS[x, y, z]

réponse correcte :  echo $GLOBALS['x'], "<br />";
                    echo $GLOBALS['y'], "<br />";
                    echo $GLOBALS['z'], "<br />";

*******************************************************************

Exercice 4

Déterminer le numéro de version de PHP, le nom du système d'exploitation de votre serveur ainsi que la langue du navigateur du poste client.

ma réponse : php --version
             $SERVER["HTTP_HOST"]
             $SERVER["HTTP_ACCEPT_LANGUAGE"]

réponse correcte : <?php
echo "Version de PHP : ",PHP_VERSION, "<br />";
echo "Système d'exploitation du serveur : ",PHP_OS, "<br />";
echo "Langue du navigateur client :",$_SERVER["HTTP_ACCEPT_LANGUAGE"], "<br />";
?>
J’obtiens le résultat suivant (sur mon poste) :

Version de PHP : 7.0.0
Système d'exploitation du serveur : Darwin
Langue du navigateur client :fr-fr

***************************************************************************************

Exercice 5

Donner la valeur de chacune des variables pendant et à la fin du script suivant et vérifier l’évolution du type de ces variables :
$x="PHP7";
$a[]=&$x;
$y=" 7e version de PHP";
$z=$y*10;
$x.=$y;
$y*=$z;
$a[0]="MySQL";

ma réponse : $x="PHP7"; = string "PHP7"
             $a[]=&$x; = array "PHP7"
             $y=" 7e version de PHP"; = string "7e version de PHP"
             $z=$y*10; = 180 integer
             $x.=$y; = 184 integer
             $y*=$z; = 3240 integer
             $a[0]="MySQL"; = string "PHP7"

réponse correcte : Solution : Script affichant les valeurs et les types
<?php
$x="PHP7";
echo "\$x vaut : $x et est de type ", gettype($x),"<br />";
$a[]=&$x;
echo "\$a[0] vaut : $a[0] et est de type ", gettype($a),"<br />";
$y=" 7 eme version de PHP";
echo "\$y vaut : $y et est de type ", gettype($y),"<br />";
$z=$y*10;
echo "\$z vaut : $z et est de type ", gettype($z),"<br />";
$x.=$y;
echo "\$x vaut : $x et est de type ", gettype($x),"<br />";
$y*=$z;
echo "\$y vaut : $y et est de type ", gettype($y),"<br />";
$a[0]="MySQL";
echo "\$a[0] vaut : {$a[0]} et est de type ", gettype($a),"<br />";
?>
Résultat affiché :

$x vaut : PHP7 et est de type string
$a[0] vaut : PHP7 et est de type array
$y vaut : 7 eme version de PHP et est de type string
$z vaut : 70 et est de type integer
$x vaut : PHP7 7 eme version de PHP et est de type string
$y vaut : 490 et est de type integer
$a[0] vaut : MySQL et est de type array

****************************************************************************************

Exercice 6

Donner la valeur des variables $x, $y, $z à la fin du script :
$x="7 personnes";
$y=(integer) $x;
$x="9E3";
$z=(double) $x;

ma réponse: $x= "9E3"
            $y= 11
            $z= 9000

réponse correcte : $x vaut : 9E3
                   $y vaut : 7
                   $z vaut : 9000

***************************************************************************************

Exercice 7

Donner la valeur booléenne des variables $a, $b, $c, $d, $e et $f :
$a="0";
$b="TRUE";
$c=FALSE;
$d=($a OR $b);
$e=($a AND $c);
$f=($a XOR $b);

ma réponse: $a = true
            $b = true
            $c = false
            $d = true
            $e = false
            $f = false

réponse correcte: même dans sa dernière version, PHP continue à afficher 1 pour TRUE et rien (une chaîne vide !) pour FALSE.
Pour réaliser l’évaluation booléenne des variables et afficher le résultat en clair
(avec les mots TRUE ou FALSE) nous pouvons écrire le code suivant :
<?php
function bool($val)
{
    if($val) {
        echo "TRUE <br />";
    }
    else {
        echo "FALSE <br />";
    }
}

$a="0";
echo "\$a vaut : ",bool($a);
$b="TRUE";
echo "\$b vaut : ",bool($b);
$c=FALSE;
echo "\$c vaut : ",bool($c);
$d=($a OR $b);
echo "\$d vaut : ",bool($d);
$e=($a AND $c);
echo "\$e vaut : ",bool($e);
$f=($a XOR $b);
echo "\$f vaut : ",bool($f);
?>

Nous obtenons l’affichage ci-dessous :
$a vaut : FALSE
$b vaut : TRUE
$c vaut : FALSE
$d vaut : TRUE
$e vaut : FALSE
$f vaut : TRUE

**************************************************************************************

NOTE OBTENUE : 1/7

observation: ridicule mon gars!!!
