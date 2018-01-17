<!DOCTYPE>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <style type="text/css">
            fieldset {  border: double medium red;  }
        </style>
    </head>
    <body>
Exercice 1<br><br>

Créer un formulaire comprenant un groupe de champs ayant pour titre "Adresse client".
Le groupe doit permettre la saisie du nom, du prénom, de l’adresse, de la ville et du code postal.
Les données sont ensuite traitées par un fichier PHP séparé récupérant les données et les affichant dans un tableau HTML.<br><br>

    <form action="exercice1.php" method="post">
        <fieldset>
            <legend><b>Adresse client</b></legend>
            <label>Nom : </label><input type="text" name="nom" size="30" maxlength="50" />
            <label>Prenom : </label><input type="text" name="prenom" size="30" maxlength="50" />
            <label>Adresse : </label><input type="text" name="adresse" />
            <label>Ville : </label><input type="text" name="ville" />
            <label>Code postal : </label><input type="text" name="departement" maxlength="5" />
            <br/>
        </fieldset>
        <fieldset>
            <legend>Confirmation</legend>
            <input type="reset" value="Effacer" />
            <input type="submit" value="Envoyer" />
            <br/>
        </fieldset>
    </form>

<hr />
Exercice 2<br><br>

Améliorer le script précédent en vérifiant l’existence des données
et en affichant une boîte d’alerte JavaScript si l’une des données
est manquante.<br><br>

    <form action="exercice2.php" method="post">
        <fieldset>
            <legend><b>Adresse client</b></legend>
            <label>Nom : </label><input type="text" name="nom" size="30" maxlength="50" />
            <label>Prenom : </label><input type="text" name="prenom" size="30" maxlength="50" />
            <label>Adresse : </label><input type="text" name="adresse" />
            <label>Ville : </label><input type="text" name="ville" />
            <label>Code postal : </label><input type="text" name="departement" maxlength="5" />
            <br/>
        </fieldset>
        <fieldset>
            <legend>Confirmation</legend>
            <input type="reset" value="Effacer" />
            <input type="submit" value="Envoyer" />
            <br/>
        </fieldset>
    </form>

<hr />
Exercice 3<br><br>

Le fichier suivant peut-il être enregistré avec l’extension .php ou .htm ? Où se fait le traitement des données ?<br><br>
<!--<!DOCTYPE html>
    <html>
    <head>
        <title> Insertion des données </title>
    </head>
    <body>
    <form method="post" action="ajout.php" >
        //Suite du formulaire
    </form>
    </body>
    </html>-->

Le fichier ne contient que du code HTML donc peut-être enregister en .htm, on peut également l'enregistrer en .php mais pas utile du tout.
Mieux vaut .htm, quant au traitement des données, elle se fait en methode POST dans ajout.php.<br><br>

réponse correcte :<br>

Le fichier ne contient que du code HTML, il peut donc être enregistré av.ec l’extension .htm. Il peut cependant être enregistré avec l’extension .php mais cela est inutile. le traitement des données saisies est fait par le code PHP du fichier externe
« ajout.php ».<br><br>

<hr />

Exercice 4<br><br>

Comment faire pour que les données soient traitées par le même fichier que celui qui contient le formulaire ? Proposer deux solutions.<br><br>

La methode action de form doit ou contenir le nom du fichier dans lequel il se trouve ou alors $_SERVER['PHP_SELF']<br><br>

réponse correcte :<br>

Première solution : l’attribut action de l’élément form doit contenir le nom du fichier qui crée le formulaire.<br>
Deuxième solution : l’attribut action de l’élément form contient le code suivant : "action= " php echo $_SERVER['PHP_SELF'] ?>"<br><br>

<hr />

Exercice 5<br><br>

Créer un formulaire de saisie d’adresse e-mail contenant un champ caché destiné à récupérer le type du navigateur de l’utilisateur.<br>
Le code PHP affiche l’adresse mail et le nom du navigateur dans la même page après vérification de l’existence des données.<br><br>

Voir exercice5.php<br><br>

<hr />

Exercice 6<br><br>

Créer un formulaire demandant la saisie d’un prix HT et d’un taux de TVA.<br>
Le script affiche le montant de la TVA et le prix TTC dans deux zones de texte créées dynamiquement.<br>
Le formulaire maintient les données saisies.<br><br>

voir exercice6.php<br><br>

<hr />

Exercice 7<br><br>

Créer un formulaire n’effectuant que le transfert de fichiers ZIP et d’une taille limitée à 1 Mo.<br>
Le script affiche le nom du fichier du poste client ainsi que la taille du fichier transféré et la confirmation de réception.<br><br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <fieldset>
        <legend>Transfert de fichier</legend>
        <input type="hidden" name="MAX_FILE_SIZE" value="1OOOOO0" />
        <label>Votre fichier : </label><input type="file" name="file" accept="application/zip"/>
        <input type="submit" value="Envoyer" />
    </fieldset>
</form>

<?php
if(isset($_FILES['file']))
{
    if($_POST["MAX_FILE_SIZE"] < $_FILES["file"]["size"])
    {
        echo "Taille trop grande" . "<hr />";
        echo "Taille maximale autorisée :" . $_POST["MAX_FILE_SIZE"] . " octets<hr / >";
        echo "Taille du fichier transféré : " . $_FILES["file"]["size"] . " octets<hr / >";
    }
    else
    {
        $result = move_uploaded_file($_FILES["file"]["tmp_name"], "fichier.zip");

        if($result == TRUE)
        {
            echo "Vous avez bien transféré le fichier<hr />";
            echo "Le nom du fichier est : " . $_FILES["file"]["name"] . "<hr/>";
            echo "Votre fichier a une taille de " . $_FILES["file"]["size"] . "<hr />";
        }
        else {
            echo "Erreur de transfert n°" . $_FILES["file"]["error"];
        }
    }
}
?>
<br><br>
<hr />

Exercice 8<br>

Dans la perspective de création d’un site d’agence immobilière<br>
créer un formulaire comprenant trois boutons Submit nommés « Vendre », « Acheter » et « Louer ». <br>
En fonction du choix effectué par le visiteur, le rediriger vers une page spécialisée dont le contenu réponde au critère choisi.<br><br>

<?php
switch($_POST["choix"])
{
    case "Vendre":
        header("location:pagevente.htm");
        break;
    case "Acheter":
        header("location:pageachat.htm");
        break;
    case "Louer":
        header("location:pagelocation.htm");
        break;
}
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
    <fieldset>
        <legend><b>Faites votre choix </b></legend>
        <table border="0" >
            <tr>
                <td><input type="submit" name="choix" value="Vendre" /></td>
                <td><input type="submit" name="choix" value="Acheter"
                    /></td>
                <td><input type="submit" name="choix" value="Louer" /></td>
            </tr>
        </table>
    </fieldset>
</form>
<br><br>

<b><h1>RESUTATS OBTENUS : 8/8</h1></b>
<b><h2>OBSERVATIONS : maitrise des formulaires asquises</h2></b>
    </body>
</html>

