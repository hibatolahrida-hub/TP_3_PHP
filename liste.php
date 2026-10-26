<?php
// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026

$fichier = "data/notes.csv";

if (!file_exists($fichier)) {
    echo "Erreur : le fichier notes.csv n'existe pas.";
    exit;
}

$handle = fopen($fichier, "r");

if ($handle === false) {
    echo "Erreur : impossible d'ouvrir le fichier notes.csv.";
    exit;
}

$total_moyennes = 0;
$nombre_apprenants = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des apprenants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #e5edf7;
        }
    </style>
</head>
<body>

<h1>Liste des apprenants</h1>

<table>
    <tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
    </tr>

    <?php
    while (($ligne = fgetcsv($handle, 1000, ";")) !== false) {

        if (count($ligne) < 3 ||
            !is_numeric($ligne[1]) ||
            !is_numeric($ligne[2])) {
            continue;
        }

        $nom = $ligne[0];
        $note_info = (float) $ligne[1];
        $note_math = (float) $ligne[2];

        $moyenne = ($note_info + $note_math) / 2;

        if ($moyenne >= 16) {
            $mention = "Très bien";
        } elseif ($moyenne >= 14) {
            $mention = "Bien";
        } elseif ($moyenne >= 12) {
            $mention = "Assez bien";
        } elseif ($moyenne >= 10) {
            $mention = "Passable";
        } else {
            $mention = "Insuffisant";
        }

        $total_moyennes += $moyenne;
        $nombre_apprenants++;

        echo "<tr>";
        echo "<td>" . htmlspecialchars($nom) . "</td>";
        echo "<td>" . $note_info . "</td>";
        echo "<td>" . $note_math . "</td>";
        echo "<td>" . number_format($moyenne, 2) . "</td>";
        echo "<td>" . $mention . "</td>";
        echo "</tr>";
    }

    fclose($handle);
    ?>

</table>

<h2>Moyenne générale de la classe</h2>

<?php
if ($nombre_apprenants > 0) {
    $moyenne_generale = $total_moyennes / $nombre_apprenants;
    echo "Moyenne générale : " . number_format($moyenne_generale, 2) . "/20";
} else {
    echo "Aucun apprenant enregistré.";
}
?>

</body>
</html>
