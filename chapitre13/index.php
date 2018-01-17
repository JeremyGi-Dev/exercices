Exercice 1

Créez le MCD d’une base de données voiture qui enregistre les certificats d’immatriculation des véhicules en circulation (carte grise). Elle doit répondre aux contraintes suivantes :
A . Un véhicule est d’un modèle donné identifié par un numéro de type.
B . Un véhicule peut avoir un ou plusieurs propriétaires simultanément (copropriété).
C . Les recherches effectuées sur la base doivent permettre de retrouver, par exemple, tous les véhicules d’une personne, la ou les personnes propriétaires d’un véhicule dont on connaît l’immatriculation et tous les propriétaires d’un modèle de voiture donné.

Cardinalités :
1 . Un propriétaire peut avoir une ou plusieurs voitures : pour l’association possède la cardinalité du côté de l’entité proprietaire est donc 1.N.
2 . Une voiture peut être la propriété d’une ou plusieurs personnes : pour l’association possède la cardinalité du côté de l’entité voiture est donc 1.N.
3 . Une voiture est d’un seul modèle : pour l’association est du modèle la cardinalité du coté de l’entité voiture est donc 1.1.
4 . A un modèle peuvent correspondrent une ou plusieurs voitures : pour l’association est du modèle la cardinalité du côté de l’entité modele est donc 1.N.


Exercice 2

Créez le MLD de la base voiture à partir du MCD de l’exercice 1. Vérifiez la conformité du modèle par rapport aux formes normales.
En application des règles nous obtenons le MLD suivant :



Exercice 3

Créez le MCD d’une base de données tournoi permettant d’enregistrer les participants à un tournoi de tennis et l’ensemble des matches joués en trois sets au maximum. La base doit enregistrer les participants d’un match donné, ainsi que le gagnant et le score de chaque set.
La relation rencontre est réflexive. Il existerait également une autre solution en créant une entité joueurs et une entité match reliées par l’association jouer.


Exercice 4

Créez le MLD de la base tournoi, et vérifiez sa conformité.
Le MLD correspondant est :



Exercice 5

Créez le MCD d’une base permettant à un groupe de gérer les droits d’auteur des livres publiés par ses différentes maisons d’édition. Elle doit répondre aux contraintes suivantes :
A . Un livre peut être écrit par un ou plusieurs auteurs. Un auteur peut écrire un ou plusieurs livres. Chaque auteur touche un pourcentage des droits totaux d’un livre en fonction de sa
participation.
B . Un livre est publié par un seul éditeur.


Exercice 6

Créez le MLD correspondant à la base de l’exercice 5, et vérifiez sa conformité.