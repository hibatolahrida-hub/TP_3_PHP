<?php
// Auteur : Hibatolah Rida
// Objectif : Tester les bases de PHP
// Date : 17/10/2026
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["login"]) && !empty(trim($_POST["login"]))) {
        $_SESSION["login"] = trim($_POST["login"]);

        header("Location: profil.php");
        exit;
    }

    $erreur = "Veuillez saisir votre login.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<?php
if (isset($erreur)) {
    echo "<p>" . htmlspecialchars($erreur) . "</p>";
}
?>

<form action="login.php" method="POST">
    <label for="login">Votre login :</label>
    <input type="text" id="login" name="login" required>
    <button type="submit">Se connecter</button>
</form>

</body>
</html>
