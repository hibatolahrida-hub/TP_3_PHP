<?php
// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026

echo "<h2>Experience avec include</h2>";

include "includes/menu_inc.php";
include "includes/menu_inc.php";

/*
Observation :
Avec include, le fichier menu_inc.php est inclus deux fois.
Donc le menu peut s'afficher deux fois.
*/

echo "<h2>Experience avec include_once</h2>";

include_once "includes/menu_inc.php";
include_once "includes/menu_inc.php";

/*
Observation :
Avec include_once, le fichier menu_inc.php est inclus une seule fois,
même si on l'appelle deux fois.
*/

?>