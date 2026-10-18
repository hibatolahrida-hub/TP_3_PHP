// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026
<?php
require "config.php";

echo "<h3>Exercice 2.1: if/elseif/else </h3>";
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

echo mention(18) . "<br>";
echo mention(15) . "<br>";
echo mention(13) . "<br>";
echo mention(10) . "<br>";
echo mention(8) . "<br>";
echo "<hr>";

echo "<h3>Exercice 2.2 :Switch</h3>";
$mois = date("m");
switch ($mois) {
    case "01": echo "Janvier"; break;
    case "02": echo "Février"; break;
    case "03": echo "Mars"; break;
    case "04": echo "Avril"; break;
    case "05": echo "Mai"; break;
    case "06": echo "Juin"; break;
    case "07": echo "Juillet"; break;
    case "08": echo "Août"; break;
    case "09": echo "Septembre"; break;
    case "10": echo "Octobre"; break;
    case "11": echo "Novembre"; break;
    case "12": echo "Décembre"; break;
    default: echo "Mois inconnu";
}
echo "<hr>";
echo "<h3>Exercice 2.3.1 : Triangle</h3>";


echo "<pre>";

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}

echo "</pre>";
echo "<hr>";
echo "<h3>Exercice 2.3.2 : While</h3>";

$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo $i . "<br>";
    }

    $i += 2;
}
echo "<hr>";
echo "<h3>Exercice 2.3.3 : For et continue</h3>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }

    echo $i . "<br>";
}
echo "<hr>";
echo "<h3>Exercice 2.3.4 : while switch et break</h3>";

$i = 1;

while ($i <= 12) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;

        default:
            echo $i . "<br>";
    }

    $i++;
}
echo "<hr>";
echo "<h3>Exercice 2.3.5 : do-while</h3>";

$i = 0;

do {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo $i . "<br>";
    }

    $i += 2;

} while ($i <= 20);

// do-while exécute le bloc au moins une fois.
// while vérifie la condition avant l'exécution.
?>