<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Thoth LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Créer un compte Étudiant</h2>
        
        <form action="/thoth-lms/public/register" method="POST" class="space-y-4">
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom Complet</label>
                <input type="text" name="name" placeholder="Ex: Anas Alami" required 
                    class="w-full px-4 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

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
                S'inscrire
            </button>

        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Déjà un compte ? 
            <a href="/thoth-lms/public/login" class="text-indigo-600 hover:underline">Connectez-vous</a>
        </p>
    </div>

</body>
</html>