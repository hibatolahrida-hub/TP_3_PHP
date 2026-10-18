<?php

require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Exercice 5.4 : Sérialisation</h2>";

// 1. Construction du tableau associatif
$resultats = array(
    array(
        "nom" => "Ahmed",
        "notes" => array(15, 12, 18),
        "moyenne" => 15
    ),
    array(
        "nom" => "Sara",
        "notes" => array(14, 16, 13),
        "moyenne" => 14.33
    ),
    array(
        "nom" => "Youssef",
        "notes" => array(10, 11, 12),
        "moyenne" => 11
    )
);

echo "<h3>1. Tableau des résultats</h3>";
echo "<pre>";
print_r($resultats);
echo "</pre>";

// 2. Écriture dans le fichier JSON
$json = json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents('data/notes.json', $json);

echo "<h3>2. Contenu du fichier JSON</h3>";
echo "<pre>";
echo htmlspecialchars($json);
echo "</pre>";

// 3. Lecture et décodage du fichier JSON
$json_lu = file_get_contents('data/notes.json');
$resultats_lus = json_decode($json_lu, true);

echo "<h3>3. Résultats après json_decode()</h3>";
echo "<pre>";
print_r($resultats_lus);
echo "</pre>";

// 4. Comparaison entre serialize() et json_encode()
echo "<h3>4. Comparaison entre serialize() et json_encode()</h3>";

$donnees_serialize = serialize($resultats);
$donnees_json = json_encode($resultats);

echo "<h4>Résultat de serialize()</h4>";
echo "<pre>";
echo htmlspecialchars($donnees_serialize);
echo "</pre>";

echo "<h4>Résultat de json_encode()</h4>";
echo "<pre>";
echo htmlspecialchars($donnees_json);
echo "</pre>";

// Question
echo "<h3>Question</h3>";
echo "<p>Le format JSON est directement exploitable par une application JavaScript.</p>";

include 'includes/pied_inc.php';

?>