<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Thoth LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Connexion Étudiant</h2>

        <?php if (isset($error)) echo "<p class='text-red-500 mb-4 text-center'>$error</p>"; ?>

        <form action="/login" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" placeholder="email@exemple.com" required
                    class="w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" placeholder="********" required
                    class="w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-200 font-semibold">
                Se connecter
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Pas encore de compte ?
            <a href="/register" class="text-indigo-600 hover:underline">Inscrivez-vous</a>
        </p>
    </div>

</body>

</html>