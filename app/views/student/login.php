<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conxion - THOTH LMS </title>
</head>

<body>
    <h2>Connexion Étudiant</h2>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="/login" method="post">
        <input type="email" name="email" placeholder="Email" required> <br><br>
        <input type="password" name="password" placeholder="Mot de passe" required> <br><br>
        <button type="submit">Se connecter</button>
    </form>
    <p><a href="/register">Pas encore de compte ? Inscrivez-vous</a></p>

</body>

</html>