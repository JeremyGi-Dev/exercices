<?php

// Exercice 1

// Écrivez un tableau multidimensionnel associatif
// dont les clés sont des noms de personne et
// les valeurs des tableaux indicés contenant le prénom, la ville de résidence et l'âge de la personne.

$tab = array("Gimonet, Deuza, Auvray",
            array("Jeremy", "Clotilde", "Daniel",
            array("Rueil", "Rueil", "Caen",
            array("28", "43", "52"))));

echo"<hr />";
// réponse correcte

$tab= array("Dupont"=>array("Paul","Paris",27),
            "Schmoll"=>array("Kirk","Berlin",35),
            "Smith"=>array("Stan","Londres",45));
echo"<hr />";
//**************************************************************************************************************

// Exercice 2

// Écrivez un tableau multidimensionnel associatif dont les clés sont des noms de personne
// et les valeurs des tableaux associatifs dont les clés sont
// le prénom, la ville de résidence et l’age de la personne avec une série de valeurs associées.

$tab= array("Gimonet" => array("Jeremy" => "Marié", "Rueil" => "Maison", 28 => "age"),
            "Deuza" => array("Clotilde" => "Marié", "Rueil" => "Maison", 43 => "age"),
            "Auvray" => array("Daniel" => "Marié", "Caen" => "Maison", 52 => "age"));
echo"<hr />";
// réponse correcte

$tab= array("Dupont"=>array("prenom"=>"Paul","ville"=>"Paris","age"=>27),
            "Schmoll"=>array("prenom"=>"Kirk","ville"=>"Berlin","age"=>35),
            "Smith"=>array("prenom"=>"Stan","ville"=>"Londres","age"=>45));
echo"<hr />";
//*************************************************************************************************************

// Exercice 3

// Utilisez une boucle foreach pour lire les tableaux des exercices 1 et 2.

// lecture du tableau 1

$tab= array("Dupont"=>array("Paul","Paris",27),
            "Schmoll"=>array("Kirk","Berlin",35),
            "Smith"=>array("Stan","Londres",45));

foreach($tab as $key => $value)
{
    echo "la clé est " . $key . " :</br>";

    foreach($value as $indice => $valeur)
    {
        echo "elément $indice : " . $valeur . "<br />";
    }
}
echo"<hr />";
// réponse correcte

$tab=array("Dupont"=>array("Paul","Paris",27),"Schmoll"=>array("Kir
k","Berlin",35),"Smith"=>array("Stan","Londres",45));
foreach($tab as $cle=>$valeur)
{
    echo "<b>Elément $cle :</b><br />";
    foreach($valeur as $ind=>$val)
    {
        echo "elément $ind :", $val, "<br />";
    }
}
echo"<hr />";
// lecture du tableau 2

$tab= array("Gimonet" => array("Prenom" => "Jeremy", "Ville" => "Rueil", "age" => 28),
            "Deuza" => array("Prenom" => "Clotilde", "Ville" => "Rueil", "age" => 43),
            "Auvray" => array("Prenom" => "Daniel", "Ville" => "Caen", "age" => 52));

foreach($tab as $key => $value)
{
    echo "Element " . $key . " :</br>";

    foreach($value as $indice => $valeur)
    {
        echo "la clé est : $indice" . " et la valeur est : " . $valeur . "</br>";
    }
}
echo"<hr />";
// réponse correcte

$tab= array("Dupont"=>array("prenom"=>"Paul","ville"=>"Paris","age"=>27),
            "Schmoll"=>array("prenom"=>"Kirk","ville"=>"Berlin","age"=>35),
            "Smith"=>array("prenom"=>"Stan","ville"=>"Londres","age"=>45));

foreach($tab as $cle=>$valeur)
{
    echo "<b>Element $cle :</b><br />";
    foreach($valeur as $cle2=>$val)
    {
        echo " $cle2 :", $val, "<br />";
    }
}
echo"<hr />";
//**********************************************************************************************************************

// Exercice 4

//Utilisez une boucle while pour lire les tableaux des exercices 1 et 2.

// Lecture du tableau 1

$tab= array("Gimonet"=>array("Jeremy","Rueil",28),
            "Deuza"=>array("Clotilde","Rueil",43),
            "Auvray"=>array("Daniel","Caen",52));

while($element = each($tab))
{
    echo "$element[0] : </br>";

    while($value = each($element[1]))
    {
        echo "$value[1] ";
    }
}
echo"<hr />";
// réponse correcte

$tab= array("Dupont"=>array("Paul","Paris",27),
            "Schmoll"=>array("Kirk","Berlin",35),
            "Smith"=>array("Stan","Londres",45));

while($element=each($tab))
{
    echo "Personne: {$element['key']} <br />";
    while($coord=each($element[1]))
    {
        echo "clé {$coord[0]} valeur {$coord[1]} <br />";
    }
    echo"<hr />";
}
echo"<hr />";
// Lecture du tableau 2

$tab= array("Gimonet" => array("Prenom" => "Jeremy", "Ville" => "Rueil", "age" => 28),
            "Deuza" => array("Prenom" => "Clotilde", "Ville" => "Rueil", "age" => 43),
            "Auvray" => array("Prenom" => "Daniel", "Ville" => "Caen", "age" => 52));

while($element = each($tab))
{
    echo "Monsieur ou Madame {$element[0]} : </br>";

    while($value = each($element[1]))
    {
        echo "$value[0] => $value[1] </br>";
    }
}
echo"<hr />";
// réponse correcte

$tab= array("Dupont"=>array("prenom"=>"Paul","ville"=>"Paris","age"=>27),
            "Schmoll"=>array("prenom"=>"Kirk","ville"=>"Berlin","age"=>35),
            "Smith"=>array("prenom"=>"Stan","ville"=>"Londres","age"=>45));

while($element=each($tab))
{
    echo "Personne: {$element['key']} <br />";

    while($coord=each($element[1]))
    {
        echo "{$coord[0]}:{$coord[1]} <br />";
    }
    echo"<hr />";
}
echo"<hr />";
//******************************************************************************************************************

// Exercice 5

// Créez un tableau contenant une liste d’adresses de sites recommandés,
// puis créez un lien aléatoire vers le premier site de la liste après avoir trié le tableau en ordre aléatoire.

$tab = array("PHP" => "www.php.com", "Symfony" => "www.sensiolabs.fr", "Mangas" => "www.wakanim.fr", "Videos" => "www.youtube.fr", "Hentai" => "www.hentai.fr");

$newtab = array_rand($tab);

echo "Site recommandé : <a href=\"$tab[$newtab]\" > ",$newtab,"</a>";
echo"<hr />";
// réponse correcte

$tab= array("PHP"=>"http://www.php.net","MySQL"=>"http://www.mysql.org","SQLite"=>"http://www.sqlite.org");

$site=array_rand($tab);

echo "Site recommandé : <a href=\"$tab[$site]\" > ",$site,"</a>";
echo"<hr />";
//***********************************************************************************************************************

// Exercice 6

// Créez un tableau d’entiers variant de 1 à 63, puis à partir de celui ci un autre tableau de nombres variant de 0 à 6.3
// Créez ensuite un tableau associatif dont les clés X varient de 0 à 6.3 et dont les valeurs sont sin(X).
// Affichez le tableau de valeurs dans un tableau HTML.

$tab = array(range(1, 63));
echo"<hr />";

// réponse correcte

//Tableau ayant pour valeurs les entiers de 0 à 63
$tab=range(0,63);
//Tableau ayant pour valeurs les décimaux de 0 à 6.3
foreach($tab as $ind=>$val)
{
    $tab[$ind]=$tab[$ind]/10;
}
//Tableau dont les clés sont X et les valeurs sin(X)
foreach($tab as $ind=>$val)
{
    $val= (string) $val;
    $tabsin[$val]= sin($val);
}
//Création du tableau HTML
echo "<table border=\"1\" width=\"50%\" >";
echo "<caption><b>Tableau de valeurs de la fonction
sinus</b></caption>";
echo "<tr> <th> X </th> <th> sin( X )</th> </tr>";
foreach($tabsin as $cle=>$val)
{
    echo "<tr><td>$cle</td> <td>$val</td></tr>";
}
echo "</table>";
echo "<hr />";
echo"<hr />";
//*******************************************************************************************************************************

// Exercice 7

// Créez un tableau contenant une liste d’adresses e-mail.
// Extrayez le nom de serveur de ces données,
// puis réalisez des statistiques sur les occurrences de chaque fournisseur d’accès.

$tab = array("php5@free.fr", "j.gimonet@gmail.fr", "clotilde.gimonet@gmail.fr", "alecfraser@gmail.fr","marielaure@free.fr","symfony@fiscali.fr");

foreach($tab as $indice => $value)
{
    $adresse = explode("@", $value);
    $nom[] = $adresse[1];
}

$count = array_count_values($nom);
$total = count($tab);

foreach($count as $access => $nb)
{
    $pourcent[$access] = $nb/$total*100;

    echo "fournisseur d'accès : $access = " . round($pourcent[$access],2) . " % <br />";
}

echo"<hr />";
// réponse correcte

$tab=array("php5@free.com","jean556@fiscali.fr","machine@waladoo.fr","webmestre@waladoo.fr","pauldeux@fiscali.fr","macafi@fiscali.fr");
//Récupération des noms de domaine
foreach($tab as $ind=>$val)
{
    $dom=explode("@",$val);
    $domaine[]=$dom[1];
}
//Compte du nombre d'occurences de chaque domaine
$stat=array_count_values ($domaine);
//Nombre total d'adresses
$total=count($tab);
//Ou encore
//$total=array_sum($stat);
//Calcul des pourcentages
foreach($stat as $fourn=>$nb)
{
    $pourcent[$fourn]=$nb/$total*100;
    echo "Fournisseur d'accès : $fourn =
",round($pourcent[$fourn],2)," % <br />";
}
echo"<hr />";

// RESULTATS OBTENUS : 5/7

// observations : Pas mal, tu as compris les tableaux associatifs a partir du deuxieme exercice par contre le 6 est à revoir car pas bien compris

