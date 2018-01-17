Exercice 1<br><br>

Créer une base nommée voitures. Créer ensuite les tables de la base voitures selon le modèle logique défini dans les exercices du chapitre 13. <br>
Omettre volontairement certaines colonnes et faire volontairement quelques erreurs de type de colonne. <br>
Une fois les tables créées, ajouter les colonnes manquantes et corriger les erreurs. Vérifier la structure de chaque table.<br><br>
<br>
A . Création de la table personne (en omettant volontairement le champ codepostal)<br>
CREATE TABLE `proprietaire` (<br>
`id_pers` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT ,<br>
`nom` VARCHAR( 30 ) NOT NULL ,<br>
`prenom` VARCHAR( 30 ) NOT NULL ,<br>
`adresse` VARCHAR( 50 ) NOT NULL ,<br>
`ville` VARCHAR( 40 ) NOT NULL ,<br>
PRIMARY KEY ( `id_pers` )<br>
)<br>
Nous ajoutons le champ codepostal « oublié » lors de la création de la table.<br>
ALTER TABLE `proprietaire` ADD `codepostal` MEDIUMINT( 5 ) UNSIGNED NOT NULL ;<br>
Nous modifions le type du champ id_pers pour avoir un éventail de valeurs plus grand.<br>
ALTER TABLE `proprietaire` CHANGE `id_pers` `id_pers` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT<br>
<br>
B . Création de la table cartegrise<br>
CREATE TABLE `cartegrise` (<br>
`id_pers` MEDIUMINT UNSIGNED NOT NULL ,<br>
`immat` VARCHAR( 6 ) NOT NULL ,<br>
`datecarte` DATE NOT NULL ,<br>
PRIMARY KEY ( `id_pers` , `immat` )<br>
);<br>
C . Nous créons la table voiture.<br>
CREATE TABLE `voitures` (<br>
`immat` VARCHAR( 6 ) NOT NULL ,<br>
`id_modele` VARCHAR( 10 ) NOT NULL ,<br>
`couleur` ENUM( 'claire', 'moyenne', 'foncée' ) NOT NULL ,<br>
`datevoiture` DATE NOT NULL ,<br>
PRIMARY KEY ( `immat` )<br>
);<br>
D . Nous créons la table modele<br>
CREATE TABLE `modele` (<br>
`id_modele` VARCHAR( 10 ) NOT NULL ,<br>
`modele` VARCHAR( 30 ) NOT NULL ,<br>
`carburant` ENUM( 'essence', 'diesel', 'gpl', 'électrique' ) NOT NULL ,<br>
PRIMARY KEY ( `id_modele` )<br>
);<br>
<br><br>
Exercice 2<br>
<br><br>
Exporter les tables de la base voitures dans des fichiers SQL.<br><br>
Nous obtenons les fichiers suivants :<br>
A . Le fichier proprietaire.sql :<br>
-- Base de données: `voitures`<br>
-- Structure de la table `proprietaire`<br>
CREATE TABLE `proprietaire` (<br>
`id_pers` mediumint(8) unsigned NOT NULL auto_increment,<br>
`nom` varchar(30) NOT NULL default '',<br>
`prenom` varchar(30) NOT NULL default '',<br>
`adresse` varchar(50) NOT NULL default '',<br>
`ville` varchar(40) NOT NULL default '',<br>
`codepostal` mediumint(5) unsigned NOT NULL default '0',<br>
PRIMARY KEY (`id_pers`)<br>
) TYPE=MyISAM AUTO_INCREMENT=1 ;<br>
B . Le fichier cartegrise.sql :<br>
-- Base de données: `voitures`<br>
-- Structure de la table `cartegrise`<br>
CREATE TABLE `cartegrise` (<br>
`id_pers` mediumint(8) unsigned NOT NULL default '0',<br>
`immat` varchar(6) NOT NULL default '',<br>
`datecarte` date NOT NULL default '0000-00-00',<br>
PRIMARY KEY (`id_pers`,`immat`)<br>
) TYPE=MyISAM;<br>
C . Le fichier voiture.sql<br>
-- Base de données: `voitures`<br>
-- Structure de la table `voitures`<br>
CREATE TABLE `voiture` (<br>
`immat` varchar(6) NOT NULL default '',<br>
`id_modele` varchar(10) NOT NULL default '',<br>
`couleur` enum('claire','moyenne','foncée') NOT NULL default 'claire',<br>
`datevoiture` date NOT NULL default '0000-00-00',<br>
PRIMARY KEY (`immat`)<br>
) TYPE=MyISAM;<br>
D . Le fichier modele.sql<br>
-- Base de données: `voitures`<br>
-- Structure de la table `modele`<br>
CREATE TABLE `modele` (<br>
`id_modele` varchar(10) NOT NULL default '',<br>
`modele` varchar(30) NOT NULL default '',<br>
`carburant` enum('essence','diesel','gpl','électrique') NOT NULL default 'essence',<br>
PRIMARY KEY (`id_modele`)<br>
) TYPE=MyISAM;<br>
<br><br>
Exercice 3<br>
<br><br>
Supprimer toutes les tables de la base voitures.<br><br>
Le code SQL est le suivant :<br>
DROP TABLE `proprietaire`<br>
DROP TABLE `cartegrise`<br>
DROP TABLE `voiture`<br>
DROP TABLE `modele`<br>
<br><br>
Exercice 4<br>
<br><br>
Recréer les tables de la base voitures en utilisant les fichiers SQL précédents.<br>
Pour recréer avec phpMyAdmin, les tables détruites, choisir successivement la base, <br>
puis l’onglet « SQL », « Emplacement du fichier texte », « Parcourir » pour désigner l’emplacement du fichier .sql, et enfin « Exécuter ». <br>
Les tables sont alors recréées l’une après l’autre.<br><br>

-- Base de données: `voitures`<br>
-- Structure de la table `cartegrise`<br>
--CREATE TABLE `cartegrise` (<br>
`id_pers` mediumint(8) unsigned NOT NULL default '0',<br>
`immat` varchar(6) NOT NULL default '',<br>
`datecarte` date NOT NULL default '0000-00-00',<br>
PRIMARY KEY (`id_pers`,`immat`)<br>
);<br>
--<br>
-- Structure de la table `modele`<br>
--<br>
CREATE TABLE `modele` (<br>
`id_modele` varchar(10) NOT NULL default '',<br>
`modele` varchar(30) NOT NULL default '',<br>
`carburant` enum('essence','diesel','gpl','électrique') NOT NULL<br>
default 'essence',<br>
PRIMARY KEY (`id_modele`)<br>
);<br>
--<br>
-- Structure de la table `proprietaire`<br>
--<br>
CREATE TABLE `proprietaire` (<br>
`id_pers` mediumint(8) unsigned NOT NULL auto_increment,<br>
`nom` varchar(30) NOT NULL default '',<br>
`prenom` varchar(30) NOT NULL default '',<br>
`adresse` varchar(50) NOT NULL default '',<br>
`ville` varchar(40) NOT NULL default '',<br>
`codepostal` mediumint(5) unsigned NOT NULL default '0',<br>
PRIMARY KEY (`id_pers`)<br>
) AUTO_INCREMENT=1 ;<br>
--<br>
-- Structure de la table `voiture`<br>
--<br>
CREATE TABLE `voiture` (<br>
`immat` varchar(6) NOT NULL default '',<br>
`id_modele` varchar(10) NOT NULL default '',<br>
`couleur` enum('claire','moyenne','foncée') NOT NULL default<br>
'claire',<br>
`datevoiture` date NOT NULL default '0000-00-00',<br>
PRIMARY KEY (`immat`)<br>
);<br>
<br><br>
Exercice 5<br>
<br><br>
Insérer des données dans la table proprietaire de la base voitures puis en vérifier la bonne insertion.<br><br>

Exemple de code d’insertion :<br>
INSERT INTO `proprietaire` ( `id_pers` , `nom` , `prenom` ,`adresse` , `ville` , `codepostal` ) VALUES ('', 'Zouk', 'Julia', '56 Boulevard Nez', 'Paris', '75011');<br>
<br><br>
Exercice 6<br>
<br><br>
Créer un fichier texte contenant une liste de modèles de voitures avec autant de données par ligne que de colonnes dans la table modele de la base voitures.<br><br>
Insérer ces données dans la base.<br>
Exemple de fichier texte contenant des modèles : le fichier modele.txt<br>
"17C92853AZ";"Citroën C5";"diesel"<br>
"178524ER45";"Citroën Picasso";"essence"<br>
"7499RF5679";"Renault Mégane Scénic";"diesel"<br>
"33356677PO";"Peugeot 206";"électrique"<br>
"563339GH56";"Citroën C3";"essence"<br>
"83321TY455";"Renault Espace";"diesel"<br>
Pour revoir la méthode d’insertion à partir d’un fichier texte avec phpMyAdmin, voir la page 419 et suivantes.<br>
<br><br>

Exercice 7<br>
<br><br>
Créer un fichier Excel ou OpenOffice contenant une liste de modèles de voitures avec autant de données par ligne que de colonnes dans la table modele.<br>
L’enregistrer au format CSV et insérer les données dans la base.<br>
La feuille du tableur à l’aspect type suivant :<br>
<br><br>
L’insertion des données se fait selon la même procédure que celle utilisée pour un fichier texte. Après l’insertion la table modele a le contenu suivant :<br>
<br><br>
Exercice 8<br>
<br><br>
Insérer des données dans les autres tables de la base voitures. Effectuer des mises à jour en modifiant certaines valeurs.<br><br>
<br>
Trivial avec phpMyAdmin.<br>
<br><br>
Exercice 9<br>
<br><br>
Dans la base magasin, sélectionner les articles dont le prix est inférieur à 1 500 €.<br><br>
Requête SQL :<br>
SELECT id_article, designation, prix<br>
FROM article<br>
WHERE prix <1500<br>
<br><br>
Exercice 10<br>
<br><br>
Dans la base magasin, sélectionner les articles dont le prix est compris entre 100 et 500 €.<br><br>
Requête SQL :<br>
SELECT id_article, designation, prix<br>
FROM article<br>
WHERE prix<br>
BETWEEN 100<br>
AND 500<br>
<br><br>
Exercice 11<br>
<br><br>
Dans la base magasin, sélectionner tous les articles de marque Nikon (dont la désignation contient ce mot).<br><br>
Requête SQL :<br>
SELECT id_article, designation, prix<br>
FROM article<br>
WHERE designation LIKE '%Nikon%'<br>
<br><br>
Exercice 12<br>
<br><br>
Dans la base magasin, sélectionner tous les caméscopes, leur prix et leur référence.<br><br>
Requête SQL :<br>
SELECT id_article, designation, prix<br>
FROM article<br>
WHERE designation LIKE '%caméscope%'<br>
On peut également écrire :<br>
SELECT id_article, designation, prix<br>
FROM article<br>
WHERE categorie = 'vidéo'<br>
<br><br>
Exercice 13<br>
<br><br>
Dans la base magasin, sélectionner tous les produits de la catégorie informatique et afficher leur code, leur désignation et leur prix par ordre décroissant de prix.<br><br>
Requête SQL :<br>
SELECT id_article, designation, prix<br>
FROM article<br>
WHERE categorie = 'informatique '<br>
ORDER BY prix DESC<br>
<br><br>
Exercice 14<br>
<br><br>
Dans la base magasin, sélectionner tous les clients de moins de 40 ans et ordonner les résultats par ville en ordre alphabétique.<br><br>
Requête SQL :<br>
SELECT nom, prenom, age, ville<br>
FROM CLIENT WHERE age <40<br>
ORDER BY ville ASC<br>
<br><br>
Exercice 15<br>
<br>
Dans la base magasin, calculer le prix moyen de tous les articles.<br><br>
Requête SQL :<br>
SELECT avg( prix )<br>
FROM article<br>
<br><br>
Exercice 16<br>
<br>
Dans la base magasin, calculer le nombre d’e-mails non NULL et distincts l’un de l’autre.<br><br>
Requête SQL :<br>
SELECT count( DISTINCT mail) FROM client<br>
<br><br>
Exercice 17<br>
<br><br>
Dans la base magasin, afficher les coordonnées des clients ayant la même adresse (même adresse et même ville).<br><br>
Requête SQL :<br>
SELECT nom,prenom,adresse,ville,mail FROM client WHERE adresse='75 Bd Hochimin' AND ville='Lille'<br>
Avec PHP, si l’adresse et la ville étaient contenues respectivement dans les variables $adresse et $ville on aurait le code suivant :<br>
SELECT nom,prenom,adresse,ville,mail FROM client WHERE adresse='$adresse' AND ville='$ville'<br>
<br><br>
Exercice 18<br>
<br><br>
Dans la base magasin, sélectionner tous les articles commandés par chaque client.<br><br>
Requête SQL :<br>
SELECT nom,prenom,article.id_article,designation<br>
FROM `client` ,commande,article,ligne<br>
WHERE client.id_client=commande.id_client<br>
AND ligne.id_comm=commande.id_comm<br>
AND ligne.id_article=article.id_article<br>
ORDER BY nom<br>
<br><br>
Exercice 19<br>
<br><br>
Dans la base magasin, sélectionner tous les clients dont le montant d’une commande dépasse 1 500 €.<br><br>
Requête SQL :<br>
SELECT nom,prenom, ligne.id_comm, sum(prixunit*quantite) AS 'total'<br>
FROM client,ligne,commande<br>
WHERE ligne.id_comm=commande.id_comm<br>
AND commande.id_client=client.id_client<br>
GROUP BY ligne.id_comm<br>
HAVING sum(prixunit*quantite)>1500<br>
<br><br>
Exercice 20<br>
<br><br>
Dans la base magasin, sélectionner tous les clients dont le montant total de toutes les commandes dépasse 5 000 €.<br><br>
Requête SQL :<br>
SELECT client.id_client, ligne.id_comm, sum(prixunit*quantite)<br>
FROM client,ligne,commande<br>
WHERE ligne.id_comm=commande.id_comm<br>
AND commande.id_client=client.id_client<br>
GROUP BY client.id_client<br>
HAVING sum(prixunit*quantite)>5000<br>
<br><br>
Exercice 21<br>
<br><br>
Dans la base voitures, sélectionner tous les véhicules d’une personne donnée.<br><br>
Requête SQL : Nous cherchons par exemple tous les véhicules de M. Algout.<br>
SELECT cartegrise.immat,modele,proprietaire.id_pers<br>
FROM voiture,modele,proprietaire,cartegrise<br>
WHERE proprietaire.nom='Algout'<br>
AND proprietaire.id_pers=cartegrise.id_pers<br>
AND cartegrise.immat=voiture.immat<br>
AND voiture.id_modele=modele.id_modele<br>
<br><br>
Exercice 22<br>
<br><br>
Dans la base voitures, sélectionner toutes les personnes ayant le même modèle de voiture.<br><br>
Requête SQL : Nous cherchons par exemple tous les propriétaires de véhicules de type « Picasso ».<br>
SELECT<br>
proprietaire.nom,proprietaire.prenom,modele.modele,modele.carburant<br>
FROM voiture,modele,proprietaire,cartegrise<br>
WHERE modele LIKE '%Picasso'<br>
AND voiture.id_modele=modele.id_modele<br>
AND cartegrise.immat=voiture.immat<br>
AND proprietaire.id_pers=cartegrise.id_pers<br>
<br><br>
Exercice 23<br>
<br><br>
Dans la base voitures, sélectionner tous les véhicules ayant plusieurs copropriétaires.<br><br>
Requête SQL :<br>
SELECT cartegrise.immat FROM cartegrise<br>
GROUP BY immat<br>
HAVING count(*) >1<br>