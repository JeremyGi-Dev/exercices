<?php
// Exercice 1

// Rédigez une expression conditionnelle pour tester si un nombre et à la fois un mulitple de 3 et de 5.

$nb = 15;

if($nb % 3 == 0 AND $nb % 5 == 0)
{
    echo $nb . " est un multiple de 3 et 5";
}
else
{
    echo $nb . " n'est pas un mulitple de 3 et 5";
}


//réponse correcte

$x=1245;

if($x % 3 == 0 AND $x % 5 == 0)
{
    echo "$x est multiple de 3 et de 5 <br />";
}
else
{
    echo "$x n'est pas multiple de 3 et de 5 <br />";
}

//***************************************************************************************************************

//Exercice 2

// Ecrivez une expression conditionnelle utilisant les variables $age et $sexe dans une instruction if
// pour sélectionner une personne de sexe féminin dont l'âge est compris entre 21 et 40 et afficher un message de bienvenue approprié

$age = 22;
$sexe = "F";

if($age >= 21 AND $age <= 40 AND $sexe == "F")
{
    echo "Bonjour Madame, vous êtes dans la fleur de l'age";
}
else
{
    echo "salut chienne";
}

//réponse correcte

$sexe = "F";
$age = 43;

if($sexe == "F" AND $age >= 21 AND $age <= 40)
{
    echo "Bonjour Madame vous avez entre 21 et 40 ans <br />";
}
else
{
    echo "Désolé, vous ne remplissez pas les conditions <br />";
}

//*****************************************************************************************************************

// Exercice 3

// Effectuez une suite de tirages de nombres aléatoires jusqu'à obtenir une suite composée d'un nombre pair suivi de deux nombres impairs.

$nb = 0;

do {
    $x = rand(0, 1000);
    $y = rand(0, 1000);
    $z = rand(0, 1000);
    $nb++;
    echo $x . ", " . $y . ", " . $z . "<br/>";
}
while($x % 2 == 1 OR $y % 2 == 0 OR $z % 2 == 0);

echo "résultats obtenus en " . $nb . " coups";

//réponse correcte

$compteur=0;
do
{
    $x=rand(0,1000);
    $y=rand(0,1000);
    $z=rand(0,1000);
    $compteur++;
    echo $x, "," , $y, "," , $z,"<br />";
}
while($x%2==1 OR $y%2==0 OR $z%2==0);
echo "Résultat obtenu en $compteur coups";

//******************************************************************************************************************

// Exercice 4

// Créer et afficher des numéros d’immatriculation automobile (pour Paris, par exemple) en commençant au numéro 100 PHP 75.
// Effectuer ensuite la même procédure en mettant en réserve les numéros dont le premier groupe de chiffres est un multiple de 100.
// Stocker ces numéros particuliers dans un tableau.

// Si on réalise le script complet, il affiche plusieurs millions de numéros de 100 PHP 75 à 999 ZZZ 75.
// L’exécution est donc très longue et risque de bloquer le serveur.
// Pour effectuer un test, les valeurs des chiffres sont limitées ci-dessous entre 100 et 120.

// réponse correcte

$initx = 80; //lettre P
$inity = 72; //lettre H
$initz = 80; //lettre P

//Boucles imbriquées

for($x = $initx; $x <= 90; $x++)
{
    for($y = $inity; $y <= 90; $y++)
    {
        for($z = $initz; $z <= 90; $z++)
        {
            for($num = 100; $num <120; $num++)
            {
                echo "Numéro : $num ",chr($x),chr($y),chr($z)," 75<br />";
            }
            $initz = 65; //on repart à la lettre A pour le troisième caractère
}
        $inity = 65; //on repart à la lettre A pour le deuxième caractère
    }
}

// Pour ne conserver que les nombres multiples de 100 nous remplaçons l’instruction echo par le stockage des numéros dans un tableau.
// Il est affiché à la fin de toutes les boucles à l’aide de la fonction print_r(). On constate alors qu’il contient déjà 65150 éléments !

$initx = 80; //lettre P
$inity = 72; //lettre H
$initz = 80; //lettre P

//Boucles imbriquées

for($x = $initx; $x <= 90; $x++)
{
    for($y = $inity; $y <= 90; $y++)
    {
        for($z = $initz; $z <= 90; $z++)
        {
            for($num = 100; $num < 1000; $num+=100)
            {
                $tab[] = "$num".chr($x).chr($y).chr($z)." 75";
            }
            $initz = 65; //on repart à la lettre A pour le troisième caractère
}
        $inity = 65; //on repart à la lettre A pour le deuxième caractère
    }
}
//print_r($tab);

//***********************************************************************************************************************

// Exercice 5

// Choisir un nombre de trois chiffres.
// Effectuer ensuite des tirages aléatoires et compter le nombre de tirages nécessaire pour obtenir le nombre initial.
// Arrêter les tirages et afficher le nombre de coups réalisés.
// Réaliser ce script d’abord avec l’instruction while puis avec l’instruction for.

// boucle while

$nb = 315;
$chiffre = rand(0, 1000);
$compteur = 0;


while ($nb != $chiffre)
{
    $chiffre = rand(0, 1000);
    $compteur++;
}

echo "il aura fallu " . $compteur . " tirages pour que les chiffres concordent";

// boucle for

$nb = 315;
$chiffre = rand(0, 1000);

for($i = 0; $nb != $chiffre; $i++)
{
    $chiffre = rand(0, 1000);
}

echo "il aura fallu " . $i . " tirages pour que les chiffres concordent";

// réponse correcte

// boucle while

// Nombre à trouver

$nb=789;
// compteur
$coup=0;
// boucle de tirage
while($x!=$nb)
{
    $x=rand(0,1000);
    $coup++;
//echo $x,"<br />";//pour afficher tous les tirages
}
echo "$nb trouvé en $coup coups ";

// Avec une boucle for

// Nombre à trouver
$nb=789;
// boucle de tirage
for($coup=1;$x!=$nb;$coup++)
{
    $x=rand(0,1000);
// echo $x,"<br />";//pour afficher tous les tirages
}
echo "$nb trouvé en $coup coups ";

//**********************************************************************************************************************

// Exercice 6

// Créer un tableau dont les indices varient de 11 à 36 et dont les valeurs sont des lettres de A à Z.
// Lire ensuite ce tableau avec une boucle for puis une boucle foreach et afficher les indices et les valeurs
// (la fonction chr(n) retourne le caractère dont le code ASCII vaut n).

//réponse correcte

for($i=11;$i<=36;$i++)
{
    $tab[$i]=chr(54+$i);
}
//Lecture avec for
for($i=11;$i<=36;$i++)
{
    echo "Elément d'indice $i : $tab[$i] <br />";
}
echo "<hr />";
//Lecture avec foreach
foreach($tab as $cle=>$valeur)
{
    echo "Elément d'indice $cle : $valeur <br />";
}

//***********************************************************************************************************************

//Exercice 7

// Utiliser une boucle while pour déterminer le premier entier obtenu par tirage aléatoire qui soit un multiple d’un nombre donné.
// Écrire la variante utilisant la boucle do…while.

//réponse correcte

// boucle while

$nb=57;
$compteur=0;
$x=rand(0,1000);

while($x%$nb!=0)
{
    $x=rand(0,1000);
    $compteur++;
}
echo "$x est multiple de $nb: Résultat obtenu en $compteur coups";


// boucle do...while

$nb=57;
$compteur=0;
do
{
    $x=rand(0,1000);
    $compteur++;
}
while($x%$nb!=0);
echo "$x est multiple de $nb: Résultat obtenu en $compteur coups";


//*********************************************************************************************************************

// Exercice 8

// Rechercher le PGCD (plus grand commun diviseur) de deux nombres donnés.
// Gérer au moyen d’une exception le cas où au moins un des nombres n’est pas entier.

//réponse correcte

//Il faut $A > $B
$A=56952;
$B=3444;
try
{
    if(!(is_integer($A) OR is_integer($b)))
    {throw new Exception("Nombre(s) non entiers !",99);}
    else
    {
        echo "Le PGCD de $A et $B est : ";
        do
        {
            $R=$A%$B;
            $A=$B;
            $B=$R;
        }
        while($R!=0);
        echo $A ;
    }
}
catch(Exception $except)
{
    echo $except->getMessage();
}


// RESULTATS OBTENUS : 4/8

//observations : ça s'améliore mais peut mieux faire, revoir exercice 4 car pas compris du tout