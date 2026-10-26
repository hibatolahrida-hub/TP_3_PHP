<?php
// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026

require "config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Traitement des notes</title>
</head>
<body>

<h1>Résultat du formulaire</h1>

<?php
if (
    isset($_POST["nom"], $_POST["note_info"], $_POST["note_math"]) &&
    !empty(trim($_POST["nom"])) &&
    $_POST["note_info"] !== "" &&
    $_POST["note_math"] !== ""
) {
    $nom = trim($_POST["nom"]);
    $note_info = $_POST["note_info"];
    $note_math = $_POST["note_math"];

    if (
        is_numeric($note_info) &&
        is_numeric($note_math) &&
        $note_info >= NOTE_MIN &&
        $note_info <= NOTE_MAX &&
        $note_math >= NOTE_MIN &&
        $note_math <= NOTE_MAX
    ) {
        $nom = htmlspecialchars($nom);
        $note_info = (float) $note_info;
        $note_math = (float) $note_math;

        $fichier = fopen("data/notes.csv", "a");

        if ($fichier !== false) {
            fputcsv($fichier, [$nom, $note_info, $note_math], ";");
            fclose($fichier);

            echo "<p>Les notes ont été enregistrées dans le fichier CSV.</p>";
        } else {
            echo "<p>Erreur : impossible d'ouvrir le fichier CSV.</p>";
        }

        echo "<h2>Récapitulatif</h2>";
        echo "Nom : " . $nom . "<br>";
        echo "Note informatique : " . $note_info . "/20<br>";
        echo "Note mathématiques : " . $note_math . "/20<br>";
        echo "<p>Les données sont valides.</p>";
    } else {
        echo "<p>Erreur : les notes doivent être des nombres compris entre "
            . NOTE_MIN . " et " . NOTE_MAX . ".</p>";
    }
} else {
    echo "<p>Erreur : veuillez remplir tous les champs du formulaire.</p>";
}
?>

<p><a href="saisie.html">Retour au formulaire</a></p>

</body>
</html>
