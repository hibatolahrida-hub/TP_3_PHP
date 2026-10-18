<?php
session_start();

// Si le formulaire est soumis en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    if (!empty($login)) {
        $_SESSION['login'] = $login;
        // Création d'un cookie valable 24h
        setcookie("dernier_login", $login, time() + 86400, "/");
        header("Location: profil.php");
        exit;
    }
}

$cookie_login = $_COOKIE['dernier_login'] ?? '';
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="login.php" method="post">
        <label>Login :</label>
        <input type="text" name="login" value="<?php echo htmlspecialchars($cookie_login); ?>" required><br><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>