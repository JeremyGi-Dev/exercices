<form method="post" action="exercice6.php">
    <fieldset>
        <legend>Calcul du taux et de la TVA</legend>
        <label>Prix HT : </label><input type="number" name="prix" step="1" value="<?php if(isset($_POST['prix'])) echo $_POST['prix'];?>"/>
        <label>TVA : </label><input type="number" name="tva" step="0.1" value="<?php if(isset($_POST['tva'])) echo $_POST['tva'];?>"/>
        <input type="submit" value="envoyer" />
    </fieldset>
</form>

<?php
if(!empty($_POST['prix']) && !empty($_POST['tva']))
{
    echo "Montant de la TVA : " . round($_POST['prix']*$_POST['tva']/100, 2) . "<br>";

    echo "Prix TTC : " .round($_POST['prix']*(1+$_POST['tva']/100),2);
}
else
{
    echo "<b>Le formulaire est incomplet!</b>";
}
?>