<?php

// Exercice 2

// pensez à mettre empty a la place de isset pour vérifier quand un champ à été rempli ou pas !!

if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['departement']))
{
    echo "<table border=\"1\">
            <tr>
               <th>Nom</th>
               <th>Prenom</th>
               <th>Adresse</th>
               <th>Ville</th>
               <th>Departement</th>
            </tr>
            <td>" . $_POST['nom'] . "</td>
            <td>" . $_POST['prenom'] . "</td>
            <td>" . $_POST['adresse'] . "</td>
            <td>" . $_POST['ville'] . "</td>
            <td>" . $_POST['departement'] . "</td>
          </table>";
}
else
{
    echo "<script type=\"text/javascript\">";
    echo "alert('Vous n\'avez pas saisi toutes les données nécessaire');";
    echo "window.history.back();";
    echo "</script>";
}

