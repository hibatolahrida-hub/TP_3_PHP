<?php
// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$login = htmlspecialchars($_SESSION["login"]);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>

<h1>Bienvenue</h1>

<p>Bonjour <?php echo $login; ?> ! Vous êtes connecté.</p>

<a href="deconnexion.php">Se déconnecter</a>

</body>
</html>
