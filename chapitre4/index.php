<?php

// Exercice 1

// Transformez une chaîne écrite dans des casses différentes afin que chaque mot ait une initiale en majuscule.

$ch = "TransFOrmeZ unE ChaîNE écRITe dans des cASses diFFéreNTes afiN qUe chAQue MOT ait une inITiale en MAJUSCULE";

echo ucwords(strtolower($ch));

//***********************************************************************************************************************

// Exercice 2

// En utilisant la fonction strlen() écrivez une boucle qui affiche chaque lettre de la chaîne PHP MySQL sur une ligne différente.

$ch = "PHP MySQL";

for($i = 0; $i < strlen($ch); $i++)
{
    echo "<h3> $ch[$i] </h3>";
}

//***********************************************************************************************************************

// Exercice 3

// Formatez l’affichage d’une suite de chaînes contenant des nom et prénom en respectant les critères suivants :
// un prénom et un nom par ligne affichés sur 20 caractères;
// toutes les initiales des mots doivent se superposer verticalement.

$nom1 = "Azerky";
$prenom1 = "Sophia";

echo sprintf ("<tt>%'_-20s %'_-20s </tt><br />",$nom1,$prenom1);

$nom2 = "Bazertudoh";
$prenom2 = "Jean-Michel";
echo sprintf ("<tt>%'_-20s %'_-20s </tt><br />",$nom2,$prenom2);

//*************************************************************************************************************************

// Exercice 4

// Utilisez les fonctions adéquates afin que la chaîne <form action="script.php"> soit affichée telle quelle et non comme du code HTML.

$ch = '<form action="script.php">';
echo htmlentities($ch);

//************************************************************************************************************************

// Exercice 5

// À partir de deux chaînes quelconques contenues dans des variables, effectuez une comparaison entre elles pour pouvoir les afficher en ordre alphabétique naturel.

// Nous utilisons la fonction strtolower() avant d’opérer la comparaison, sinon tous les caractères de A à Z sont avant les caractères a à z.

$ch1 = "alpha";
$ch2 = "Azéma";

if(strtolower($ch1)<strtolower($ch2))
{
    echo $ch1 ," est avant ",
    $ch2;
}
else
{
    echo $ch2 ," est avant ", $ch1;
}

//*****************************************************************************************************************************

// Exercice 6

// Effectuez une censure sur des textes en n’affichant pas ceux qui contiennent le mot zut.

$ch = "Zut je me suis trompé";
$modele = "/zut/i";

if(preg_match($modele,$ch))
{
    echo "Un Mot censuré";
}
else
{
    echo $ch;
}

//*****************************************************************************************************************************

// Exercice 7

// Créez une fonction de validation d’une adresse HTTP ou FTP en vous inspirant de l’exemple 4-12.
// Le modèle doit répondre à la définition suivante :
// 1. Commencer par « www »
// 2. Suivi par des lettres puis éventuellement un point ou un tiret suivis d’un deuxième groupe de lettres
// 3. Se terminer par un point suivi de l’extension qui peut avoir de 2 à 4 caractères.
// Par exemple, les adresses www.machin.com ou www.machintruc.uk sont valides.

// Création de la fonction de validation

function validhttp($ch)
{
    $modele = "/^(www)\.([a-z0-9]+)(\.|-)?([a-z0-9]*)\.([a-z]{2,4}$)/";
    $ch = strtolower($ch);
    if (preg_match($modele, $ch))
    {
        echo "$ch est valide <br />";
        return TRUE;
    }
    else
    {
        echo "$ch est invalide <br />";
        return FALSE;
    }
}

// Utilisation de la fonction de validation

$url = "www.laposte2.info";
$url2 = "www.pierre-plus-loin.info";
$url3 = "www.engels.funphp.com";
validhttp($url);
validhttp($url2);
validhttp($url3);

//*****************************************************************************************************************************

// Exercice 8

// Créez une expression régulière pour valider un âge inférieur à 100 ans.

$modele = "/^[0-9]?([0-9]?)$/";
$age = "84";
if (preg_match($modele, $age))
{
    echo "$age est un age valide <br />";
    return TRUE;
}
else
{
    echo "$age est un age invalide <br />";
    return FALSE;
}

//****************************************************************************************************************************

// Exercice 9

// Dans la chaîne "PHP 5 \n est meilleur \n que ASP\n et JSP \n réunis",
// remplacez les caractères \n par <br /> en utilisant deux méthodes différentes (une fonction ou une expression régulière).
// 1. En utilisant la fonction nl2br()

$ch = "PHP  \n est meilleur \n que ASP \n et JSP \n réunis";
echo "<p>",nl2br($ch),"</p>";

//2. En utilisant une expression régulière et la fonction preg_replace()

$ch = "PHP  \n est meilleur \n que ASP \n et JSP \n réunis";
$modele = "/\n/";
$nouveau = "/<br />/";
echo preg_replace("/\n/","<br />",$ch);

//RESULTATS OBTENUS: 7/9

//observations: pas mal du tout
