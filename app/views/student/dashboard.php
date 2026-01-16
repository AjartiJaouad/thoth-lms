<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Thoth LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen">

    <nav class="bg-indigo-600 p-4 text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-tight">THOTH <span class="font-light text-indigo-200">LMS</span></h1>
            <div class="flex items-center gap-4">
                <span class="bg-indigo-500 px-3 py-1 rounded-full text-sm">👤 <?php echo $_SESSION['user_name']; ?></span>
                <a href="/thoth-lms/public/logout" class="hover:text-red-300 transition-colors">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-10 px-4">

        <div class="mb-12">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6 border-l-4 border-indigo-600 pl-4">📚 Cours Disponibles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (!empty($data['available_courses'])): ?>
                    <?php foreach ($data['available_courses'] as $course): ?>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo htmlspecialchars($course->title); ?></h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3"><?php echo htmlspecialchars($course->description); ?></p>
                                <form action="/thoth-lms/public/course/enroll" method="POST">
                                    <input type="hidden" name="course_id" value="<?php echo $course->id; ?>">
                                    <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors">
                                        S'inscrire maintenant
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-full bg-yellow-50 text-yellow-700 p-4 rounded-lg border border-yellow-200">
                        Aucun nouveau cours disponible pour le moment.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6 border-l-4 border