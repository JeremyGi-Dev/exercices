<?php

// Exercice 1

// Créer un fichier pour enregistrer la date de chaque connexion à votre site. Procéder ensuite à la lecture des données puis calculer des statistiques sur ces dates

//Ecriture des dates
$idfile=fopen("connex.txt","a");
$date=time();;
flock($idfile,2);
fwrite($idfile,$date);
flock($idfile,3);
fclose($idfile);
//Lecture des données
$idfile=fopen("connex.txt","r");
flock($idfile,1);
$i=1;
while($date=fgets($idfile,11))
{
    $tab[]=$date;
}
//Elimination des doublons
$tabstat=array_values(array_unique($tab));
//Affiche les dates et les heures des connexions
foreach($tabstat as $valeur)
{
    echo date("d/M H:m:s",$valeur),"<br />";
}
flock($idfile,3);
fclose($idfile);

// Exercice 2

// Créez un fichier texte pour enregistrer le code du navigateur client sous forme d'enregistrement de longueur fixe
// (du type E9 pour Explorer 9) suivis d'un séparateur fixe. Il est possibled'utiliser la variable $_SERVER['HTTP_USER_AGENT'] pour identifier le navigateur client.
// Après la lecture du fichier, réalisez des statistiques sur ces données.

Opera : "Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.15";

Firefox : "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0";

Explorer : "Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)";

Safari : "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.57.2 (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2";

$nav = $_SERVER['HTTP_USER_AGENT'];
$explorer = 'MSIE';
$pos = strpos($nav, $explorer);
// Notez l'utilisation de ===. Un simple == ne donnerait pas le
// résultat escompté
// car la lettre 'a' est à la position 0 (la première).
if ($pos !== false)
{
    echo "Navigateur Internet Explorer";
}
else
{
    echo "Navigateur Mozilla ou Netscape";
}

// Exercice 3

// En vous inspirant de l’exemple 11-5 créez un livre d’or qui n’affiche que les cinq derniers avis donnés par les visiteurs du site.
// Notez les différences minimes en apparence entre ce code et celui de l'exemple 11.5.

/*<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Le livre est d'or </title>
</head>
<body style="background-color: #ffcc00;">
<form action="exo11.3.php" method="post" >
    <fieldset>
        <legend><b>Donnez votre avis sur PHP 5 ! </b></legend>
        <b>Nom : &nbsp;<input type="text" name="nom" width="60" /> <br>
            Mail : &nbsp;<input type="text" name="mail" width="60" /> <br>
            Vos commentaires sur le site</b><br>
        <textarea name="comment" rows="10" cols="50">Ici </textarea> <br>
        <input type="submit" value="Envoyer " name="envoi" />
        <input type="submit" value="Afficher les avis" name="affiche" />
    </fieldset>
</form>
<?php
$date= time();
//ENREGISTREMENT
if(isset($_POST['envoi']))
{
    if(isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['comment']))
    {
        echo "<h2>",$_POST['nom']," merci de votre avis </h2> ";
        if(file_exists("livre2.txt") )
        {
            if($id_file=fopen("livre2.txt","a"))
            {
                flock($id_file,2);
                fwrite($id_file,$_POST['nom'].":".$_POST['mail'].":".$date.":".$_POST['comment']."\n");
                flock($id_file,3);
                fclose($id_file);
            }
            else
            { echo "fichier inaccessible";
            }
        }
        else
        {
            $id_file=fopen("livre2.txt","w");
            fwrite($id_file,$_POST['nom'].":".$_POST['mail'].":".$date.":".$_POST['comment']."\n");
            fclose($id_file);
        }
    }
}
//LECTURE DES DONNEES
if(isset($_POST['affiche']))
{
    if($id_file=fopen("livre.txt","r"))
    {
        echo "<table border=\"2\"> <tbody>";
        $i=0;
        while($tab=fgetcsv($id_file,200,":") )
        {
            $tab5[$i]=$tab;
            $i++;
        }
        $tab5=array_reverse($tab5);
        echo "<hr />";
        for($i=0;$i<5;$i++)
        {
            echo "<tr> <td>",$i+1 ,": de: ".$tab5[$i][0]." </td> <td> <a href=\"mailto:".$tab5[$i][1]." \"> ".$tab5[$i][1]."</a></td> <td>le: ",date("d/m/y H:i:s", $tab5[$i][2])," </td></tr>";
            echo "<tr > <td colspan=\" 3 \">", stripslashes($tab5[$i][3]) ,"</td> </tr> ";
        }
        fclose($id_file);
    }
    echo "</tbody></table> ";
}
else{ echo "<h2>Donnez votre avis puis cliquez sur 'envoyer' ! </h2> ";}
?>
</body>
</html>*/

// Exercice 4

// Créez une loterie en ligne en enregistrant le numéro gagnant dans un fichier texte.
// Le visiteur saisit sa proposition dans un formulaire, et la réponse est affichée après comparaison avec la solution.

// Créez d'abord le fichier texte nommé "gagnant.txt" contenant le numéro gagnant avec textedit par exemple et placez le dans le même répertoire le fichier PHP exo11.4.php.

//&nbsp;Lecture du numéro gagnant du jour
if($id_file=fopen("gagnant.txt","r"))
{
    flock($id_file,1);
    $nb=fread($id_file,10);
    fclose($id_file);
}
//Gestion des réponses
if(isset($_POST['jeu']))
{
    if($_POST['jeu'] == $nb) {echo "<h2>VOUS&nbsp;GAGNEZ le gros lot!!</h2>" ;}
    else echo "<h2>PERDU</h2>";
}
/*
<!DOCTYPE html>
<html>
<head>
    <title>LOTERIE WEB</title>
</head>
<body>
<form name="tirage" action="exo11.4.php" method="post">
    <fieldset>
        <legend>ENTREZ UN NOMBRE DE  CINQ CHIFFRES</legend>
        <input type="text" name="jeu" />
        <input type="submit" value="Envoyez" />
    </fieldset>
</form>
</body>
</html>*/