<?php
    session_start();
    if($_SESSION['role'] !== 'Auteur'){
        if($_SESSION['role'] === 'Admin'){
            header("Location: ../admin/dashboard.php");
        }else if($_SESSION['role'] === 'Utilisateur'){
            header("Location: ../user/articles.php");
        }else{
            header("Location: ../../index.php");
        }
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="icon" type="../../assets/img/logo.png" href="../../assets/img/logo.png">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-purple-800 to-purple-900 text-white">
            <div class="p-6">
                <div class="flex items-center space-x-3">
                    <div>
                        <h1 class="text-2xl font-bold">Culture<span class="text-black">Connect</span></h1>
                        <p class="text-purple-300 text-sm">Espace Auteur</p>
                    </div>
                </div>
            </div>

            <nav class="mt-6">
                <div class="px-6 py-3">
                    <p class="text-xs uppercase text-purple-300">Menu Principal</p>
                </div>
                <a href="author-dashboard.html"
                    class="flex items-center px-6 py-3 bg-purple-700 border-r-4 border-white">
                    <i class="fas fa-chart-line mr-3"></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-pencil-alt mr-3"></i>
                    Mes Articles
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-plus-circle mr-3"></i>
                    Nouvel Article
                </a>
                <div class="px-6 py-3 mt-6">
                    <p class="text-xs uppercase text-purple-300">Paramètres</p>
                </div>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-user-circle mr-3"></i>
                    Profil
                </a>
                <a href="../../actions/logout.php"
                    class="flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Déconnexion
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <section class="flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Top Navigation -->
            <nav class="bg-white shadow-md">
                <div class="mx-auto px-8 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                                <p class="text-sm text-gray-600">Bienvenue, <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-bell text-xl"></i>
                            </button>
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Profile"
                                    class="h-10 w-10 rounded-full object-cover">
                                <div
                                    class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-green-400 border-2 border-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Dashboard -->
            <div class="hidden p-8 bg-gray-200">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div
                        class="bg-white rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total</p>
                                <h3 class="text-2xl font-bold text-gray-800">24</h3>
                            </div>
                            <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-newspaper text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Approuvés</p>
                                <h3 class="text-2xl font-bold text-gray-800">18</h3>
                            </div>
                            <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">En Attente</p>
                                <h3 class="text-2xl font-bold text-gray-800">6</h3>
                            </div>
                            <div class="h-12 w-12 rounded-full bg-yellow-100 flex items-center justify-center">
                                <i class="fas fa-hourglass-half text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Refusés</p>
                                <h3 class="text-2xl font-bold text-gray-800">6</h3>
                            </div>
                            <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center">
                                <i class="fa-solid fa-ban text-red-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories & Recent Articles -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Category Distribution -->
                    <div class="">
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-semibold text-gray-800">Distribution par Catégorie</h3>
                            </div>
                            <div class="flex flex-col gap-4">
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div
                                                class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                                <i class="fas fa-palette text-blue-600"></i>
                                            </div>
                                            <span class="ml-3 font-medium text-gray-700">Art</span>
                                        </div>
                                        <span class="text-sm text-gray-500">8 articles</span>
                                    </div>
                                </div>

                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div
                                                class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center">
                                                <i class="fas fa-music text-purple-600"></i>
                                            </div>
                                            <span class="ml-3 font-medium text-gray-700">Musique</span>
                                        </div>
                                        <span class="text-sm text-gray-500">6 articles</span>
                                    </div>
                                </div>

                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div
                                                class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                                <i class="fas fa-book text-green-600"></i>
                                            </div>
                                            <span class="ml-3 font-medium text-gray-700">Littérature</span>
                                        </div>
                                        <span class="text-sm text-gray-500">5 articles</span>
                                    </div>
                                </div>

                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div
                                                class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                                                <i class="fas fa-film text-red-600"></i>
                                            </div>
                                            <span class="ml-3 font-medium text-gray-700">Cinéma</span>
                                        </div>
                                        <span class="text-sm text-gray-500">5 articles</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recent Articles -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Articles Récents</h3>
                            <button class="text-purple-600 hover:text-purple-700">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                        <div class="space-y-4">
                            <div
                                class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <img src="https://images.unsplash.com/photo-1579783901586-d88db74b4fe4" alt="Article"
                                    class="h-16 w-16 rounded-lg object-cover">
                                <div class="ml-4 flex-1 flex flex-col justify-between">
                                    <h4 class="text-sm font-semibold text-gray-800">L'Art Moderne au 21ème Siècle</h4>
                                    <p class="text-sm text-gray-600">2025-01-01</p>
                                    <div class="flex items-center mt-1">
                                        <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full">Refusé
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d" alt="Article"
                                    class="h-16 w-16 rounded-lg object-cover">
                                <div class="ml-4 flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800">La Renaissance de la Musique
                                        Classique</h4>
                                    <p class="text-sm text-gray-600">2025-01-01</p>
                                    <div class="flex items-center mt-1">
                                        <span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full">En
                                            attente
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" alt="Article"
                                    class="h-16 w-16 rounded-lg object-cover">
                                <div class="ml-4 flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800">Les Nouveaux Formats de la
                                        Littérature</h4>
                                    <p class="text-sm text-gray-600">2025-01-01</p>
                                    <div class="flex items-center mt-1">
                                        <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">
                                            Approuvé
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- articles -->
            <div class="p-10 flex items-center gap-8 flex-wrap lg:grid lg:grid-cols-2 bg-gray-200">
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1579541671172-43429ce17aca?q=80&w=2065&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <a href="#"><h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1></a>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-end items-center gap-5 mt-5">
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-blue-500 text-sm duration-500 hover:bg-blue-700">Modifier</button>
                            </a>
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-red-500 text-sm  duration-500 hover:bg-red-700">Supprimer</button>
                            </a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1579541671172-43429ce17aca?q=80&w=2065&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <a href="#"><h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1></a>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-end items-center gap-5 mt-5">
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-blue-500 text-sm duration-500 hover:bg-blue-700">Modifier</button>
                            </a>
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-red-500 text-sm duration-500 hover:bg-red-700">Supprimer</button>
                            </a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1579541671172-43429ce17aca?q=80&w=2065&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <a href="#"><h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1></a>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-end items-center gap-5 mt-5">
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-blue-500 text-sm duration-500 hover:bg-blue-700">Modifier</button>
                            </a>
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-red-500 text-sm duration-500 hover:bg-red-700">Supprimer</button>
                            </a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1579541671172-43429ce17aca?q=80&w=2065&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <a href="#"><h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1></a>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-end items-center gap-5 mt-5">
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-blue-500 text-sm duration-500 hover:bg-blue-700">Modifier</button>
                            </a>
                            <a href="#">
                                <button type="button" class="py-2 px-5 rounded-sm text-white bg-red-500 text-sm duration-500 hover:bg-red-700">Supprimer</button>
                            </a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
            </div>
        </section>
    </main>
</body>

</html>