<?php
// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026

// Commentaire sur une ligne avec //
# Commentaire sur une ligne avec #

/*
Commentaire sur plusieurs lignes
avec les symboles /* et */
echo "<h3>Exercice 1.1 : Bases</h3>";
?>
<?php echo 'Hello PHP'; ?>
<br><br>
<?php
require "config.php";

// Exercice 1.1 : Noms de variables
//$x       : Valide (commence par une lettre)
// $_x      : Valide (commence par un tirage au sort / underscore)
// $2x      : Invalide (ne peut pas commencer par un chiffre)
// $x-y     : Invalide (le tiret '-' est un opérateur de soustraction)
// $Prix_HT : Valide (lettres, chiffres et underscores autorisés)
// $prix ht : Invalide (les espaces sont interdits)
// $état    : Valide en PHP (caractères accentués acceptés), mais déconseillé
$x = 10;
$_x = 20;
$Prix_HT = 60;
$état = "valide";
// Démonstration de la sensibilité à la casse (case sensitivity)
$a = "Minuscule";
$A = "Majuscule";
echo "Variable \$a : $a | Variable \$A : $A <br><br>";
echo "<hr>";

echo "<h3>Exercice 1.2 : Constantes</h3>";
echo ETABLISSEMENT . "<br>";
echo NOTE_MIN . "<br>";
echo NOTE_MAX . "<br>";
echo SEUIL . "<br><br>";

var_dump(defined("SEUIL"));
echo "<br>";
var_dump(defined("INCONNUE"));
/*
  Réponses aux questions :
  1. Si on affiche une constante non définie, PHP lève une erreur de type Warning / Error selon la version.
  2. 'const' est défini au moment de la compilation (ne peut pas être utilisé dans des blocs conditionnels if),
    alors que 'define()' : peut s'écrire n'importe où (même à l'intérieur d'un if) car il est évalué pendant que le script s'exécute
*/
echo "<hr>";
echo "<h3>Exercice 1.3 : Calcul</h3>";
$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht * (1 + $tva / 100);;
echo "Le prix TTC du produit est de " . $prix_ttc . " €.<br>";
echo "<hr>";

echo "<h3>Exercice 1.4 : Types et conversions</h3>";
$test = 42;
$test = (string) $test;
echo "<pre>";
var_dump($test);
var_dump((bool) 0);
var_dump((bool) 0.0);
var_dump((bool) "0");
var_dump((bool) "");
var_dump((bool) "abc");
var_dump((bool) []);
var_dump((bool) null);

var_dump((int) 3.9);
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);

echo "<p>Décimal : 255</p>";
echo "<p>Hexadécimal : 0xFF</p>";
echo "<p>Octal : 0377</p>";
echo "<p>Binaire : 0b11111111</p>";
echo "</pre>";
echo "<hr>";

echo "<h3>Exercice 1.5 : Chaînes de caractères et variables</h3>";

$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"' . "<br>";
echo 'Voulez-vous supprimer C:\.?' . "<br>";
echo 'Ceci n\'affichera pas \n de nouvelle ligne' . "<br>";
echo 'Les variables ne seront pas $traitees $ici' . "<br>";
echo "Les variables seront $traitees $ici<br><br>";
echo "<hr>";
$chaine = "Bonjour les développeurs";
echo trim($chaine, "*") . "<br><br>";

$texte = "PHP";
for ($i = 0; $i < strlen($texte); $i++) {
    echo $texte[$i] . "<br>";
}