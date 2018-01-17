<?php

// Exercice 1

// Créez une image de 500 x 300 pixels avec une couleur de fond rouge. Écrivez un texte de bienvenue en blanc avec une police PHP.

header ("Content-type: image/png");
$idimg=imagecreate(500,300);
$fond=imagecolorallocate($idimg,255,0,0);
$blanc=imagecolorallocate($idimg,255,255,255);
$texte="Bienvenus chez PHP 5";
imagestring($idimg,5,160,140,$texte,$blanc);
imagepng($idimg,"bienvenu.png");
imagepng($idimg);
imagedestroy($idimg);

// Exercice 2

// Créez une image de 400 x 200 pixels avec un fond transparent. Dessinez une suite de rectangles emboîtés de couleurs différentes.

header ("Content-type: image/png");
$idimg=imagecreate(400,200);
$fond=imagecolorallocate($idimg,150,160,170);
$id=imagecolortransparent($idimg,$fond);
//Création d'un tableau des couleurs
$tabcolor[]=imagecolorallocate($idimg,255,0,255);
$tabcolor[]=imagecolorallocate($idimg,255,255,255);
$tabcolor[]=imagecolorallocate($idimg,0,0,255);
$tabcolor[]=imagecolorallocate($idimg,0,255,0);
$tabcolor[]=imagecolorallocate($idimg,255,0,0);
$tabcolor[]=imagecolorallocate($idimg,0,0,0);
//Dessin des rectangles
for($i=0,$j=0,$k=0;$i<200,$j<100;$i+=40,$j+=20,$k++)
{
    imagerectangle($idimg,200-$i,100-$j,200+$i,100+$j,$tabcolor[$k]);
}
imagepng($idimg,"rectangle.png");
imagepng($idimg);
imagedestroy($idimg);

// Exercice 3

// Créez une image de 800 x 600 pixels avec une couleur de fond verte. Tracez un trapèze isocèle rempli de jaune, et écrivez le mot « trapèze » au centre.

header ("Content-type: image/gif");
$idimg=imagecreate(800,600);
$vert=imagecolorallocate($idimg,0,255,0);
$jaune=imagecolorallocate($idimg,255,255,0);
//Dessin des rectangles
//Coordonnées du quadrilatère
$tab=array (200,150,600,150,700,450,100,450);
//Tracé du quadrilatère
imagefilledpolygon($idimg,$tab,4,$jaune);
$texte="TRAPEZE";
imagestring($idimg,5,360,296,$texte,$vert);
imagegif($idimg,"trapeze.gif");
imagegif($idimg);
imagedestroy($idimg);

// Exercice 4

// Créez une image de 601 x 601 pixels avec un fond transparent. Déterminez le centre O de l’image, et tracez des cercles concentriques centrés en O avec des rayons variant de 30 pixels jusqu’au bord de l’image. Attribuez à chaque cercle une couleur différente.
// Comme nous devons tracer vingt cercles, nous créons un tableau de couleurs aléatoires à l’aide d’une boucle (repère 1). Les coordonnées du centre sont obtenues en utilisant les fonctions imagesx() et imagesy() qui fournissent les dimensions de l’image (repères 2 et 3) . Si nous changeons la taille de l’image nous aurons ainsi toujours son centre. Le tracé des cercles est réalisé au moyen d’une boucle double, la variable $i désignant le rayon et la variable $j le numéro de la couleur (repère 4)

header ("Content-type: image/png");
$idimg=imagecreate(601,601);
$fond=imagecolorallocate($idimg,225,5,5);
imagecolortransparent($idimg,$fond);
$noir=imagecolorallocate($idimg,0,0,0);
//Création d'un tableau de 20 couleurs aléatoires
for($i=0;$i<20;$i++)//1
{
    $R= rand(0,255);
    $V= rand(0,255);
    $B= rand(0,255);
    $tabcolor[]=imagecolorallocate($idimg,$R,$V,$B);
}
//Coordonnées du centre de l'image
$XO=imagesx($idimg)/2;//2
$YO=imagesy($idimg)/2;//3
//Tracé du centre
imageline($idimg,$XO-5,$YO,$XO+5,$YO,$noir);
imageline($idimg,$XO,$YO-5,$XO,$YO+5,$noir);
//Tracé des cercles
for($i=0,$j=0;$i<600,$j<20;$i+=30,$j++)//4
{
    imageellipse($idimg,$XO,$YO,$i,$i,$tabcolor[$j]);
}
imagepng($idimg,"cercles.png");
imagepng($idimg);
imagedestroy($idimg);

// Exercice 5

// Créez une image à partir d’un fichier JPEG existant sur votre poste (ici romy.jpg). Écrivez une légende de votre choix, d’abord en noir puis dans une autre couleur, en la décalant de 1 pixel en X et en Y afin de créer un effet d’ombre. Pour utiliser les polices TTF il faut qu'elles soient présentes dans le répertoire du fichier PHP ou donner leur adresse complète sinon.

header ("Content-type: image/jpeg");
$idimg=imagecreatefromjpeg("romy.jpg");
$fond=imagecolorallocate($idimg,225,5,5);
$blanc=imagecolorallocate($idimg,255,255,255);
$noir=imagecolorallocate($idimg,0,0,0);
$titre="Romy the star";
imagettftext($idimg,40,0,249,399,$noir,"Elephnt.ttf",$titre);
imagettftext($idimg,40,0,250,400,$blanc,"Elephnt.ttf",$titre);
imagejpeg($idimg,"romy2.jpg");
imagejpeg($idimg);
imagedestroy($idimg);

//Le texte est affiché avec une police TrueType. Notez que le deuxième (en blanc) affichage recouvre le premier (en noir).

// Exercice 6

// Créez une image de 1 024 x 768 pixels. Tracez la fonction f(x)=x2, avec x compris entre – 50 et + 50, et tracez les axes. Le tracé doit occuper la plus grande surface possible de l’image.

header ("Content-type: image/png");
$idimg=imagecreate(1024,768);
$blanc=imagecolorallocate($idimg,255,255,255);
$noir=imagecolorallocate($idimg,0,0,0);
//Tracé des axes
imageline($idimg,0,750,1024,750,$noir);
imageline($idimg,512,768,512,0,$noir);
//Graduations des abscisses
for($x=-500;$x<=500;$x+=50)
{
    $X=512+$x;
    imageline($idimg,$X,745,$X,755,$noir);
    $texte=(string) ($x/10);
    imagestring($idimg,5,$X-10,730,$texte,$noir);
}
//Graduations des ordonnées
for($y=30;$y<=750;$y+=30)
{
    $Y=750-$y;
    imageline($idimg,507,$Y,517,$Y,$noir);
    $texte=(string) ($y*10/3);
    imagestring($idimg,5,470,$Y-10,$texte,$noir);
}
//Tracé de la courbe point par point
for($x=-500;$x<500;$x+=1)
{
    $X=512+$x;
    $Y=(250000-$x*$x)*0.003;
    imagesetpixel($idimg,$X,$Y,$noir);
//Doublement du trait pour une meilleure visibilité
    imagesetpixel($idimg,$X,$Y+1,$noir);
}
//Affichage du titre
$titre="Fonction f(x)=x^2";
imagettftext($idimg,15,0,550,400,$noir,"Elephnt.ttf",$titre);
imagepng($idimg,"carre.png");
imagepng($idimg);
imagedestroy($idimg);

// Exercice 7
// Ouvrir une image quelconque et en découper un carré de dimensions au choix, centré dans l’image.
// Nous utilisons l'image de format PNG créée dans l'exemple 10-3 pour y découper un carré centré.

//Ouverture de l'image
$img=imagecreatefrompng("rayons.png");
//Définition des dimensions de la coupe
$tabcoup = array('x' =>300, 'y' =>100, 'width' =>200, 'height'=>200);
//Coupe et récupération dans la variable $coupe
$coupe=imagecrop($img,$tabcoup);
//Création de l'image coupe.png
imagepng($coupe,"coupe.png");
//<img src="coupe.png" />