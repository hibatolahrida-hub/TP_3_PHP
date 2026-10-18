<?php
require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

if (isset($_POST['nom'], $_POST['note_info'], $_POST['note_math']) && 
    trim($_POST['nom']) !== '' && 
    $_POST['note_info'] !== '' && 
    $_POST['note_math'] !== '') {

    $nom = htmlspecialchars(trim($_POST['nom']));
    $note_info = (float) $_POST['note_info'];
    $note_math = (float) $_POST['note_math'];

    // Vérification des plages de notes définies dans config.php
    if ($note_info >= NOTE_MIN && $note_info <= NOTE_MAX && $note_math >= NOTE_MIN && $note_math <= NOTE_MAX) {
        $moyenne = ($note_info + $note_math) / 2;
        
        // 1. Écriture dans le fichier CSV (Partie 5.1)
        $handle = fopen('data/notes.csv', 'a');
        if ($handle) {
            fputcsv($handle, [$nom, $note_info, $note_math, $moyenne], ';');
            fclose($handle);
        }

        echo "<h3>Données valides reçues et enregistrées avec succès !</h3>";
        echo "<ul>";
        echo "<li><strong>Nom :</strong> $nom</li>";
        echo "<li><strong>Note Info :</strong> $note_info</li>";
        echo "<li><strong>Note Math :</strong> $note_math</li>";
        echo "<li><strong>Moyenne :</strong> " . round($moyenne, 2) . "</li>";
        echo "</ul>";
    } else {
        echo "<p style='color: red;'>Erreur : Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX . ".</p>";
    }
} else {
    echo "<p style='color: red;'>Erreur : Tous les champs doivent être remplis.</p>";
}

include 'includes/pied_inc.php';
?>