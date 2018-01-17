<?php

// Exercice 1

// Créer un formulaire de saisie des deux codes couleur préférés du visiteur du site pour la couleur de fond et le texte de la page.
// Les enregistrer dans deux cookies valables deux mois. À l’ouverture de la page d’accueil, récupérer ces valeurs et créer un style utilisant ces données.

if(isset($_POST['fond']) and isset($_POST['texte']))
{
    if(!isset($_COOKIE['fond']) AND !isset($_COOKIE['texte']) )
    {
        $fond=$_POST['fond'];
        $texte=$_POST['texte'];
        $expir=time() + 2*30*24*3600;
        setcookie("fond",$fond,$expir);
        setcookie("texte",$texte,$expir);
    }
    else
    {
        $fond=$_COOKIE['fond'];
        $texte=$_COOKIE['texte'];
    }
}
?>
<!DOCTYPE html >
<html>
<head>
    <meta charset="UTF-8" />
    <title>Couleurs du site</title>
    <style type="text/css" >
        <!--
        body{background-color: <?php echo $fond ?> ; color: <?php echo $texte ?> ;}
        legend{font-weight:bold;font-family:cursive;}
        label{font-weight:bold;font-style:italic;}
        -->
    </style>
</head>
<body>
<form method="post" action="exo12.1.php">
    <fieldset>
        <legend>Choisissez vos couleurs (mot clé ou code)</legend>
        <label>Couleur de fond
            <input type="text" name="fond" />
        </label><br /><br />
        <label>Couleur de texte
            <input type="text" name="texte" />
        </label><br />
        <input type="submit" value="Envoyer" />&nbsp;&nbsp;
        <input type="reset" value="Effacer" />
    </fieldset>
</form>
</body>
</html>

<?php
// Exercice 2

// Même question mais en stockant les deux informations dans un même cookie.
// Le cookie nommé couleur est un tableau qui a deux éléments : fond et texte.
?>

<?php
if(isset($_POST['fond']) and isset($_POST['texte']))
{
    if(!isset($_COOKIE['couleur']['fond']) AND !isset($_COOKIE['couleur']['texte']) )
    {
        $fond=$_POST['fond'];
        $texte=$_POST['texte'];
        $expir=time() + 10;
        setcookie("couleur[fond]",$fond,$expir);
        setcookie("couleur[texte]",$texte,$expir);
    }
    else
    {
        $fond=$_COOKIE['couleur']['fond'];
        $texte=$_COOKIE['couleur']['texte'];
    }
}
?>
<!DOCTYPE html >
<html>
<head>
    <meta charset="UTF-8" />
    <title>Couleurs du site</title>
    <style type="text/css" >
        <!--
        body{background-color: <?php echo $fond ?> ; color: <?php echo $texte ?> ;}
        legend{font-weight:bold;font-family:cursive;}
        label{font-weight:bold;font-style:italic;}
        -->
    </style>
</head>
<body>
<form method="post" action="exo12.2.php">
    <fieldset>
        <legend>Choisissez vos couleurs</legend>
        <label>Couleur de fond
            <input type="text" name="fond" />
        </label><br /><br />
        <label>Couleur de texte
            <input type="text" name="texte" />
        </label><br />
        <input type="submit" value="Envoyer" />&nbsp;&nbsp;
        <input type="reset" value="Effacer" />
    </fieldset>
</form>
</body>
</html>

<?php
// Exercice 3

// Après avoir créé un formulaire de saisie du nom et du mot de passe du visiteur ainsi que d’une durée de validité
// puis avoir autorisé l’accès au site, enregistrer un cookie contenant ces informations. Lors de la connexion suivante,
// le formulaire devra contenir ces informations dès l’affichage de la page.
// Le site comprend trois pages
// 1 . La page exo12.3b.php qui a un contenu personnalisé en fonction du visiteur.
// Son code PHP vérifie l’existence des cookies et redirige vers la page de saisie s’ils n’existent pas ou s’il y a une erreur dans le nom ou le mot de passe.
?>
<?php
if(isset($_COOKIE['nom']) AND isset($_COOKIE['pass']))
{
    $login="machin";
    $motpass="123456";
    $nom=$_COOKIE['nom'];
    $pass=$_COOKIE['pass'];
    //Vérification et création du contenu personnalisé
    if($nom==$login AND $pass==$motpass)
    {
        $message= "<h1>BONJOUR ".ucfirst($nom)."</h1>";
        $contenu="<p> Contenu personnalisé.............</p>";
    }
    else
    {
        echo "<script type=\"text/javascript\"> window.location='exo12.3a.php' ;</script>";
    }
}
else
{
    echo "<script type=\"text/javascript\"> window.location='exo12.3a.php' </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Accès réservé au site</title>
</head>
<body>
<?php
echo $message;
echo $contenu;
?>
</body>
</html>
2 . La page de saisie du nom et du mot de passe nommée exo12.3a.php.
<!DOCTYPE html >
<html>
<head>
    <meta charset="UTF-8" />
    <title>Accès réservé au site</title>
</head>
<body>
<form method="post" action="exo12.3.php">
    <fieldset>
        <legend>Saisissez votre nom et mot de passe</legend>
        <label>Nom :
            <input type="text" name="nom" />
        </label><br /><br />
        <label>Pass :
            <input type="text" name="pass" />
        </label><br />
        <input type="submit" value="Envoyer" />&nbsp;&nbsp;
        <input type="reset" value="Effacer" />
    </fieldset>
</form>
</body>
</html>

3  La page exo12.3.php qui traite les données du formulaire de saisie et redirige vers la page à accès réservé ou la page de saisie selon le cas.
<?php
//Nom et pass associé autorisant l'accès au site
//En pratique ils proviennent d'une base de données
$login="machin";
$motpass="123456";
//Récupération des valeurs saisies
$nom=$_POST['nom'];
$pass=$_POST['pass'];
//Vérification
if($nom==$login AND $pass==$motpass)
{
    $expir=time() + 20;
    //Ecriture des cookies
    setcookie("nom",$nom,$expir);
    setcookie("pass",$pass,$expir);
    //Redirection vers la page à accès réservé
    echo "<script type=\"text/javascript\">
 window.location='exo12.3b.php' </script>";
}
else
{
    //Redirection vers la page de saisie du code
    echo "<script type=\"text/javascript\">
 window.location='exo12.3a.php' </script>";
}
?>

<?php
// Exercice 4

// Enregistrer le nom de la page du site préférée du visiteur dans un cookie. Lors de sa connexion,
// il devra être redirigé automatiquement vers cette page (ici les pages exo12.4a.html et exo12.4b.html)
?>

<?php
//Détection du cookie et redirection éventuelle vers la page préférée
if(isset($_COOKIE['mapage']))
{
    $page=$_COOKIE['mapage'];
    header("Location:$page");
}
//
if(isset($_POST['mapage']))
{
    setcookie("mapage",$_POST['mapage'],time()+30);
    header("Location:$page");
    echo "Vous avez choisi ",$_POST['mapage'],"<br />";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Choisissez votre page préférée</title>
</head>
<body>
<form method="post" action="exo12.4.php">
    <fieldset>
        <legend>Choisissez votre page préférée</legend>
        <select name="mapage">
            <option value="exo12.4.php">Accueil</option>
            <option value="exo12.4a.html">Cinéma</option>
            <option value="exo12.4b.html">Voyages</option>
        </select>
        <br />
        <input type="submit" value="Envoyer" />&nbsp;&nbsp;
        <input type="reset" value="Effacer" />
    </fieldset>
</form>
</body>
</html>
La page Cinéma (exo12.4a.html)
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Page Cinéma</title>
</head>
<body>
<h1>Page Cinéma </h1>
</body>
</html>
La page Voyages (exo12.4b.html)
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Page Voyages</title>
</head>
<body>
<h1>Page Voyages</h1>
</body>
</html>

<?php
// Exercice 5

// Envoyer un ensemble d’e-mails ayant tous le même objet et le même contenu à partir d’une liste d’adresses contenue dans un tableau.
?>

<?php
$tabadresse=array("coco@as.com","jean@asa.com","engels@asa.com");
$objet="Message";
$message="Bonjour de Jean";
foreach($tabadresse as $dest)
{
    if(mail($dest,$objet,$message))
    {
        echo "Mail envoyé à $dest";
    }
}
?>

<?php
// Exercice 6

// Même question, mais cette fois chaque objet et chaque contenu des e-mails doit être différent et extrait d’un tableau multidimensionnel.
?>

<?php
$tabmailA=array("coco@funhtml.com","PHP 5","Du nouveau dans le langage du Web");
$tabmailB=array("jan@funhtml.com","MySQL 5","La base de données évolue");
$tabmailC=array("truc@funphp.com","AN 2014","Bonne année ");
$tabmail=array($tabmailA,$tabmailB,$tabmailC);
foreach($tabmail as $tab)
{
    if(mail($tab[0],$tab[1],$tab[2]))
    {
        echo "Mail envoyé à $tab[0]";
    }
}
?>

<?php
// Exercice 7

// Reprendre l’exercice 1 en enregistrant les préférences du visiteur dans des variables de session pour afficher toutes les pages du site avec ses couleurs préférées.
?>

<?php
if(isset($_POST['fond']) )          //AND isset($POST['texte'])
{
    session_start();
    echo   "F = ", $_POST['fond'];
    echo   "T = ", $_POST['texte'];

    $_SESSION['fond'] =  $_POST['fond'];
    $_SESSION['texte'] = $_POST['texte'];

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Couleurs du site avec des sessions</title>
    <style type="text/css" >
        <!--
        body{background-color: orange ; color: purple ;}
        legend{font-weight:bold;font-family:cursive;}
        label{font-weight:bold;font-style:italic;}
        -->
    </style>
</head>
<body>
<div>
    <form method="post" action="exo12.7.php">
        <fieldset>
            <legend>Choisissez vos couleurs</legend>
            <label>Couleur de fond
                <input type="text" name="fond" />
            </label><br /><br />
            <label>Couleur de texte
                <input type="text" name="texte" />
            </label><br />
            <div>
                <input type="submit" value="Envoyer" />&nbsp;&nbsp;
                <input type="reset" value="Effacer" /></div>
        </fieldset>
    </form>
    <p>Contenu de la page principale <br />
        <a href="exo12.7b.php">Lien vers la page B qui aura ces couleurs</a>
    </p>
</div>
</body>
</html>
<?php
if(isset($_POST['fond']) AND isset($POST['texte']))
{
    session_start();
    echo   "F = ", $_POST['fond'];
    $_SESSION['fond'] =  $_POST['fond'];
    $_SESSION['texte'] = $_POST['texte'];

}

?>
Un exemple de page du site cible d’un lien de la page principale (fichier exo12.7b.php). Toutes les pages liées qui récupèrent les paramètres de couleurs doivent contenir le même code PHP.
<?php
session_start();
$fond=$_SESSION['fond'];
$texte=$_SESSION['texte'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Couleurs du site avec des sessions</title>
    <style type="text/css" >
        <!--
        body{background-color: <?php echo $fond ?> ; color: <?php echo $texte ?> ;}
        legend{font-weight:bold;font-family:cursive;}
        label{font-weight:bold;font-style:italic;}
        -->
    </style>
</head>
<body>
<p>Contenu de la page B avec les couleurs choisies <br />
    <a href="exo12.7.php">Retour vers la page principale</a>
</p>
</body>
</html>

<?php
// Exercice 8

// Transformer le script de l’exemple 12-5 (commande en ligne) en permettant les saisies à partir de pages différentes
// et en créant sur chacune un bouton provoquant l’affichage de l’ensemble du panier à chaque demande.
// La modification est très simple à réaliser et peut permettre de créer autant de page que l’on désire,
// chacune étant spécialisée dans une gamme de produits. La première page dédiée à l’achat de livres (fichier exo12.8.php)
// reprend l’essentiel de l’exemple 12.5 en ajoutant simplement un lien vers la deuxième page (repère 1).
?>

<?php
session_start();
if(isset($_POST["envoi"]))
{
    //AJOUTER
    if($_POST["envoi"]=="AJOUTER" && $_POST["code"]!="" && $_POST["article"]!="" &&$_POST["prix"]!="")
    {
        $code=$_POST["code"];
        $article= $_POST["article"];
        $prix= $_POST["prix"];
        $_SESSION['code'][]= $code;
        $_SESSION['article'][]= $article;
        $_SESSION['prix'][]= $prix;
    }
    //VERIFIER
    if($_POST["envoi"]=="VERIFIER")
    {
        $prixtotal = 0;
        echo "<table border=\"1\" >";
        echo "<tr><td colspan=\"3\"><b>Récapitulatif de votre commande</b></td>";
        echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;</th><th>&nbsp;prix&nbsp;</th>";
        for($i=0;$i<count($_SESSION["code"]);$i++)
        {
            echo "<tr> <td>{$_SESSION['code'][$i]}</td> <td>{$_SESSION['article'][$i]} </td><td>{$_SESSION['prix'][$i]}</td>"; $prixtotal+=$_SESSION['prix'][$i];
        }
        echo "<tr> <td colspan=2> PRIX TOTAL </td> <td>".sprintf("%01.2f", $prixtotal)."</td>";
        echo "</table>";
    }
    //ENREGISTRER
    if($_POST["envoi"]=="ENREGISTRER")
    {
        $idfile=fopen("commande.txt",'w');
        echo SID, session_id();
        for($i=0;$i<count($_SESSION["code"]);$i++)
        {
            fwrite($idfile, $_SESSION["code"][$i]." ;".$_SESSION["article"][$i]." ; ".$_SESSION["prix"][$i]."; \n");
        }
        fclose($idfile);
    }
    //LOGOUT
    if($_POST["envoi"]=="LOGOUT")
    {
        session_unset();
        session_destroy();
        echo "<h3>La session est terminée</h3>";
    }
    $_POST["envoi"]="";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Gestion de panier</title>
</head>
<body>
<div>
    <a href="exo12.8b.php"><big>Page des disques</big></a><br />
</div>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><b>Commande de livres</b></legend>
        <table>
            <tbody>
            <tr>
                <th>code : </th>
                <td> <input type="text" name="code" /></td>
            </tr>
            <tr>
                <th>article : </th>
                <td><input type="text" name="article" /></td>
            </tr>
            <tr>
                <th>prix :</th>
                <td> <input type="text" name="prix" /></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="envoi" value="AJOUTER" />
                    <input type="submit" name="envoi" value="VERIFIER" />
                    <input type="submit" name="envoi" value="ENREGISTRER" />
                    <input type="submit" name="envoi" value="LOGOUT" />
                </td>
            </tr>
            </tbody>
        </table>
    </fieldset>
</form>
</body>
</html>
La deuxième page dédiée à l’achat de disques (fichier exo12.8b.php) est pratiquement identique, seuls les intitulés changent ainsi qu’un lien vers la première page (repère 1). Le code PHP commun aux deux pages permet l’affichage des articles commandés et le récapitulatif de toute la commande à partir de n’importe quelle page. Comme indiqué plus haut nous pourrions donc créer sans difficulté, autant de pages que le site comporterait de familles d’articles.
<?php
session_start();
if(isset($_POST["envoi"]))
{
//AJOUTER
    if(isset($_POST["envoi"]) =="AJOUTER" && $_POST["code"]!="" && $_POST["article"]!="" &&$_POST["prix"]!="")
    {
        $code=$_POST["code"];
        $article= $_POST["article"];
        $prix= $_POST["prix"];
        $_SESSION['code'][]= $code;
        $_SESSION['article'][]= $article;
        $_SESSION['prix'][]= $prix;
    }
//VERIFIER
    if($_POST["envoi"]=="VERIFIER")
    {
        $prixtotal = 0;
        echo "<table border=\"1\" >";
        echo "<tr><td colspan=\"3\"><b>Récapitulatif de votre
commande</b></td>";
        echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;</th><th>&nbsp;prix&nbsp;</th>";
        for($i=0;$i<count($_SESSION["code"]);$i++)
        {
            echo "<tr> <td>{$_SESSION['code'][$i]}</td>
<td>{$_SESSION['article'][$i]}
</td><td>{$_SESSION['prix'][$i]}</td>";
            $prixtotal+=$_SESSION['prix'][$i];
        }
        echo "<tr> <td colspan=2> PRIX TOTAL </td> <td>".
            sprintf("%01.2f", $prixtotal)."</td>";
        echo "</table>";
    }
//ENREGISTRER
    if($_POST["envoi"]=="ENREGISTRER")
    {
        $idfile=fopen("commande.txt",w);
        for($i=0;$i<count($_SESSION["code"]);$i++)
        {
            fwrite($idfile, $_SESSION["code"][$i]." ;
".$_SESSION["article"][$i]." ; ".$_SESSION["prix"][$i]."; \n");
        }
        fclose($idfile);
    }
//LOGOUT
    if($_POST["envoi"]=="LOGOUT")
    {
        session_unset();
        session_destroy();
        echo "<h3>La session est terminée</h3>";
    }
    $_POST["envoi"]="";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Gestion de panier</title>
</head>
<body>
<div>
    <a href="exo12.8.php"><big>Page des livres</big></a><br />
</div>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><b>Commande de disques</b></legend>
        <table>
            <tbody>
            <tr>
                <th>code : </th>
                <td> <input type="text" name="code" /></td>
            </tr>
            <tr>
                <th>article : </th>
                <td><input type="text" name="article" /></td>
            </tr>
            <tr>
                <th>prix :</th>
                <td><input type="text" name="prix" /></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="envoi" value="AJOUTER" />
                    <input type="submit" name="envoi" value="VERIFIER" />
                    <input type="submit" name="envoi" value="ENREGISTRER" />
                    <input type="submit" name="envoi" value="LOGOUT" />
                </td>
            </tr>
            </tbody>
        </table>
    </fieldset>
</form>
</body>
</html>
