<?php

// Exercice 1

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['departement']))
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
