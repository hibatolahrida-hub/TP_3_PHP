<?php
// Objectif : traiter le formulaire GET

$nom = trim($_GET["nom"] ?? "");
$prenom = trim($_GET["prenom"] ?? "");
$sexe = $_GET["sexe"] ?? "";

if ($nom === "" || $prenom === "") {
    exit("Veuillez remplir tous les champs.");
}

if ($sexe === "M") {
    $salutation = "Bonjour Monsieur";
} elseif ($sexe === "F") {
    $salutation = "Bonjour Madame";
} else {
    exit("Sexe invalide.");
}

echo htmlspecialchars(
    "$salutation $prenom $nom",
    ENT_QUOTES,
    "UTF-8"
);