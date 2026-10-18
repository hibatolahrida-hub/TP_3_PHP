<?php
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

if (isset($_GET['nom'], $_GET['prenom'], $_GET['sexe'])) {
    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $sexe = $_GET['sexe'];

    if ($sexe === 'M') {
        echo "<h3>Bonjour Monsieur $prenom $nom</h3>";
    } else {
        echo "<h3>Bonjour Madame $prenom $nom</h3>";
    }
} else {
    echo "<p>Veuillez remplir le formulaire.</p>";
}

include 'includes/pied_inc.php';
?>