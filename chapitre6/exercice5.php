<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <style type="text/css">
            fieldset { border: double medium red; }
        </style>
    </head>
    <body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <fieldset>
            <legend>Adresse Mail</legend>
            <label>Adresse Mail : </label><input type="email" name="mail" />
            <input type="hidden" name="server" value="<?php $_SERVER['HTTP_USER_AGENT'] ?>" />
            <input type="submit" value="Envoyer" />
        </fieldset>
    </form>

    <?php
    if(!empty($_POST['mail']) && isset($_POST['mail']))
    {
        echo "Votre adresse mail est : " . htmlspecialchars($_POST['mail']) . " et vous naviguez sur " . $_SERVER['HTTP_USER_AGENT'];
    }
    else
    {
        echo "vous n'avez pas rempli le champ";
    }
    ?>
    </body>
</html>