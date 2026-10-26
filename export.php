
<?php
$fichier_csv = "data/notes.csv";
$fichier_json = "data/notes.json";

$resultats = array();

if (!file_exists($fichier_csv)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

$handle = fopen($fichier_csv, "r");

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir notes.csv.");
}

while (($ligne = fgetcsv($handle, 1000, ";")) !== false) {

    if (
        count($ligne) < 3 ||
        !is_numeric($ligne[1]) ||
        !is_numeric($ligne[2])
    ) {
        continue;
    }

    $nom = $ligne[0];
    $note_info = (float) $ligne[1];
    $note_math = (float) $ligne[2];
    $moyenne = ($note_info + $note_math) / 2;

    $resultats[] = array(
        "nom" => $nom,
        "note_info" => $note_info,
        "note_math" => $note_math,
        "moyenne" => $moyenne
    );
}

fclose($handle);

// 1. Convertir le tableau en JSON
$json = json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// 2. Ecrire le JSON dans notes.json
if ($json !== false) {
    if (file_put_contents($fichier_json, $json) !== false) {
        echo "<h2>Fichier JSON enregistré</h2>";
        echo "<p>Les résultats ont été enregistrés.</p>";
    } else {
        exit("Erreur : impossible d'écrire dans notes.json.");
    }
} else {
    exit("Erreur : conversion JSON impossible.");
}

// 3. Relire le fichier JSON
$json_lu = file_get_contents($fichier_json);
$donnees = json_decode($json_lu, true);

echo "<h2>Contenu du fichier JSON</h2>";
echo "<pre>";
echo htmlspecialchars(print_r($donnees, true));
echo "</pre>";

// 4. Comparer serialize() et json_encode()
echo "<h2>Comparaison serialize() et json_encode()</h2>";

echo "<h3>Résultat de serialize()</h3>";
echo "<pre>";
echo htmlspecialchars(serialize($resultats));
echo "</pre>";

echo "<h3>Résultat de json_encode()</h3>";
echo "<pre>";
echo htmlspecialchars(json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
));
echo "</pre>";
?>
