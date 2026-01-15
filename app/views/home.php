<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Thoth LMS - Accueil</title>
</head>
<body>
    <h1>Bienvenue sur Thoth LMS</h1>

    <?php if(isset($_SESSION['user_id'])) : ?>
        <p>Bonjour <strong><?php echo $_SESSION['user_name']; ?></strong> !</p>
        <a href="/logout">Se déconnecter</a>
    <?php else : ?>
        <p>Veuillez vous identifier :</p>
        <a href="/login">Connexion</a> | <a href="/register">Inscription</a>
    <?php endif; ?>
</body>
</html>