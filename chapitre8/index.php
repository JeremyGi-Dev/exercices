Exercice 1

Après avoir consulté le résultat affiché par l’exemple 8-1,
déterminer la date et l’heure de l’exécution de ce script.
Le timestamp en question vaut 1355753711 .

<?php

echo "Le ", date(" d / M / Y à H:m:s",1355753711);

?>

Le résultat affiché est : « Le 27 / Jan / 2017 à 14:12:11»

**************************************************************************************************************************

Exercice 2

Calculez votre age à l’instant actuel à la seconde près.

<?php

$datenaiss= mktime(9,15,45,1,21,1962);

$aujourdhui=time();

$age=$aujourdhui - $datenaiss;

echo "Mon age est de $age secondes";

?>

On obtient par exemple : Mon age est de 1736242199 secondes

**************************************************************************************************************************

Exercice 3

Vérifiez si la date du 29 Février 1962 a existé

<?php

if(checkdate(2,29,1962))
{
    echo "Date valide";
}
else
    {
        echo "Date non valide";
    }
?>

Le résultat est : « Date non valide »

*************************************************************************************************************************

Exercice 4

Quel jour de la semaine était le 3 mars 1993 ? Affichez le résultat en français.

<!DOCTYPE html>
<html>
<head>
    <title>Afficher le jour de la semaine en français</title>
</head>
<body>
<?php
//Date en français
$jour = mktime(0,0,0,3,3,1993);

$semaine = array(" dimanche ", " lundi ", " mardi ", " mercredi ", " jeudi ", " vendredi ", " samedi ");
echo "<h2>Le ",date("d M Y ",$jour)," était un ",
$semaine[date('w')], "</h2>";
?>
</body>
</html>
Le résultat est : Le 03 Mars 1993 était un mercredi

***********************************************************************************************************************

Exercice 5

Affichez toutes les années bissextiles comprises entre 2005 et 2052.

<!DOCTYPE html>
<html>
<head>
    <title>Afficher les années bissextiles </title>
</head>
<body>
<?php
for($i=2005;$i<=2052;$i++)
{
    $date=mktime(0,0,0,1,1,$i);
    if(date("L",$date)==1)
    {
        echo "L'année $i est bissextile<br />";
    }
}
?>
</body>
</html>

**************************************************************************************************************************

Exercice 6

Déterminez quel jour de la semaine seront tous les premier Mai des années comprises entre 2016 et 2025.<br>
Si le jour est un samedi ou un dimanche, affichez le message « Désolé !». Si le jour est un vendredi ou un lundi affichez « Week end prolongé !».
<!DOCTYPE html>
<html>
<head>
    <title>Afficher les jours de 1er mai </title>
</head>
<body>
<p>
    <?php
    for($i=2013;$i<=2020;$i++)
    {
        $date=mktime(0,0,0,5,1,$i);
        if(date("w",$date)==6 OR date("w",$date)==0 )
        {
            echo "1<sup>er</sup> Mai $i : Désolé<br />";
        }
        elseif(date("w",$date)==5 OR date("w",$date)==1 )
        {
            echo "1<sup>er</sup> Mai $i : Week end prolongé<br />";
        }
    }
    ?>
</p>
</body>
</html>

***************************************************************************************************************************

Exercice 7

L’Ascension est le quarantième jour après Pâques (Pâques compris dans les 40 jours). Calculez les dates de l’Ascension pour les années 2016 à 2025.
<?php
for($i=2013;$i<2020;$i++)
{
    echo "Jour de Paques : ",date("d M Y ",easter_date($i)+3600),"<br />";
    echo "Jour de l'Ascension ",date("d M Y",easter_date($i)+40*86400),"<br />";
}
?>