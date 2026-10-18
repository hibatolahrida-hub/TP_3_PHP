// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026
<?php
require "config.php";

   Fonction utilisée pour calculer les mentions.
function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}
echo "<h3>Exercice 3.1 :Creation</h3>";

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$modules = ["PHP", "UML", "Programmation C"];
echo "<strong>Affichage avec foreach:</strong><br>";
foreach ($modules as $module) {
    echo $module . "<br>";
}
echo "<br><strong>Affichage par leur indice :</strong><br>";
echo "indice 0 : $modules[0] <br>";
echo "indice 1 : $modules[1] <br>";
echo "indice 2 : $modules[2] <br>";
echo "<hr>";

    Fonction demandée pour afficher un tableau.
function afficher_tableau($tab, $titre) {
    echo "<strong>$titre :</strong><br>";
    foreach ($tab as $k => $v) {
        echo "$k => $v | ";
    }
    echo "<br><br>";
}

   Exercice 3.2

echo "<h3>Exercice 3.2 :Notes et mentions</h3>";

echo "<table border='1'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    echo "<tr>";

    if ($note < SEUIL) {
        echo "<td style='color:red'>$nom</td>";
        echo "<td style='color:red'>$note</td>";
        echo "<td style='color:red'>" . mention($note) . "</td>";
    } else {
        echo "<td>$nom</td>";
        echo "<td>$note</td>";
        echo "<td>" . mention($note) . "</td>";
    }

    echo "</tr>";
}

echo "</table>";
echo "<hr>";
echo "<h3>Exercice 3.3 :statistiques</h3>";
$somme = 0;
$meilleure = $notes["Mohamed"];
$faible = $notes["Mohamed"];
$effectifs = [];

foreach ($notes as $nom => $note) {
    $somme += $note;

    if ($note > $meilleure) {
        $meilleure = $note;
    }

    if ($note < $faible) {
        $faible = $note;
    }

    $m = mention($note);

    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }

    $effectifs[$m]++;
}

$moyenne = $somme / count($notes);

echo "<h3>Statistiques</h3>";
echo "Somme : $somme<br>";
echo "Moyenne : " . $moyenne . "<br>";
echo "Meilleure note : $meilleure<br>";
echo "Plus faible note : $faible<br>";
echo "<h3> verification </h3>";
echo "Vérification avec array_sum : " . array_sum($notes) . "<br>";
echo "Moyenne : " . round(array_sum($notes) / count($notes), 2) . "<br>";
echo "Maximum : " . max($notes) . "<br>";
echo "Minimum : " . min($notes) . "<br>";

echo "<h3>Effectifs par mention</h3>";
$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}
echo "<strong>Effectifs par mention :</strong><br>";
foreach ($effectifs as $mention => $count) {
    echo "- $mention : $count apprenant(s)<br>";
}
echo "<hr>";
echo "<h3>Exercice 3.4 :tri</h3>";

$tri = $notes;
ksort($tri);
afficher_tableau($tri, "Noms croissants ksort");

$tri = $notes;
arsort($tri);
afficher_tableau($tri, "Notes décroissantes arsort");

$tri = $notes;
krsort($tri);
afficher_tableau($tri, "Noms décroissants krsort");

$tri = $notes;
asort($tri);
afficher_tableau($tri, "Notes croissantes asort");
   Pour un tableau indexé, on peut utiliser sort().
echo "<hr>";
echo "<h3>Exercice 3.5 : Opérateurs de tableaux</h3>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<strong>\$a + \$b :</strong><br>";
echo "<pre>"; print_r($a + $b); echo "</pre>";

echo "<strong>\$a == \$b (égalité des valeurs et clés) :</strong> ";
var_dump($a == $b);

echo "<br><strong>\$a === \$b (égalité stricte : même ordre et types) :</strong> ";
var_dump($a === $b);

// + : union des tableaux.
?>