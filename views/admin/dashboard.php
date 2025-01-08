<?php
session_start();
if ($_SESSION['role'] !== 'Admin') {
    if ($_SESSION['role'] === 'Auteur') {
        header("Location: ../auteur/dashboard.php");
    } else if ($_SESSION['role'] === 'Utilisateur') {
        header("Location: ../user/articles.php");
    } else {
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
    <title>Dadhboard Admin</title>
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
                        <p class="text-purple-300 text-sm">Espace Admin</p>
                    </div>
                </div>
            </div>

            <nav class="mt-6">
                <div class="px-6 py-3">
                    <p class="text-xs uppercase text-purple-300">Menu Principal</p>
                </div>

                <div id="admin-statistics" class="cursor-pointer flex items-center px-6 py-3 bg-purple-700 border-r-4 border-white hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-chart-line mr-3"></i>
                    Dashboard
                </div>

                <div id="admin-categories" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fa-solid fa-layer-group mr-3"></i>
                    Les Catégories
                </div>

                <div id="admin-tags" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fa-solid fa-tag mr-3"></i>
                    Les Tags
                </div>

                <div id="admin-articles" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fa-solid fa-newspaper mr-3"></i>
                    Les Articles
                </div>

                <div id="admin-authors" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fa-solid fa-user-pen mr-3"></i>
                    Les Auteurs
                </div>

                <div id="admin-users" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fa-solid fa-users mr-3"></i>
                    Les Utilisateurs
                </div>

                <div class="px-6 py-3 mt-2">
                    <p class="text-xs uppercase text-purple-300">Paramètres</p>
                </div>

                <div id="admin-profile" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-user-circle mr-3"></i>
                    Profil
                </div>

                <a href="../../actions/logout.php"
                    class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Déconnexion
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <section style="" class="flex-1">
            <!-- Top Navigation -->
            <nav class="bg-white shadow-md">
                <div class="mx-auto px-8 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                                <p class="text-sm text-gray-600">Bienvenue,
                                    <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-bell text-xl"></i>
                            </button>
                            <div class="relative">
                                <img src="../../uploads/<?php echo $_SESSION['photo'] ?>" alt="Profile"
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
            <div id="admin-manage-statistics" class="p-8 ">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div
                        class="bg-white rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total</p>
                                
                            </div>
                            <div class="h-12 w-12 rounded-full bg-yellow-100 flex grayc9nter justify-center">
                                <i class="fas fa-newspaper text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                
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
                            </div>
                        </div>
                    </div>
                    <!-- Recent Articles -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Articles Récents</h3>
                            <button type="button" id="view-all-articles" class="text-purple-600 hover:text-purple-700">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                        <div class="space-y-4">

                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div id="admin-manage-categories" style="display: none;" class="p-8 ">
                <!-- add category button & search bar -->
                <div class="flex justify-between items-center mb-10">
                    <button type="button" id="open-add-cat" class="py-2 px-5 bg-purple-800 text-white hover:bg-purple-700 transition-colors duration-200">
                        Ajouter une Catégorie
                        <i class="fas fa-plus ml-1"></i>
                    </button>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>

                        <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300" placeholder="Search">
                    </div>
                </div>
                <!-- categories table -->
                <div class="min-w-max overflow-visible">
                    <table class="divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-pink-600 to-purple-700 text-white">
                                <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider">Catégorie</th>
                                <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider">Description</th>
                                <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider w-5">Nombre Articles</th>
                                <th class="px-5 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 divide-y divide-gray-200">
                            
                            <?php
                                require_once '../../classes/admin.php';

                                $admin = new Admin();
                                $categories = $admin->showCategories();

                                if (is_array($categories)) {
                                    foreach ($categories as $categorie) {
                                        echo '<tr>
                                                <td class="px-5 py-4 whitespace-nowrap">' . $categorie['nom_categorie'] . '</td>
                                                <td class="px-5 py-4 whitespace-nowrap">' . $categorie['description'] . '</td>
                                                <td class="px-5 py-4 whitespace-nowrap">' . $categorie['nbr_articles'] . '</td>
                                                <td class="px-5 py-4 whitespace-nowrap flex items-center gap-5">
                                                    <a href="./category.php?id='. $categorie['id_categorie'] .'"><i class="fas fa-edit text-blue-600"></i></a>
                                                    <a href="../../actions/deleteCategory.php?id='.$categorie['id_categorie'].'"><i class="fas fa-trash text-red-600"></i></a>
                                                </td>
                                            </tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tags -->
            <div id="admin-manage-tags" style="display: none;" class="p-8 ">
                <!-- add Tag button & search bar -->
                <div class="flex justify-between items-center mb-10">
                    <button type="button" id="open-add-tag" class="py-2 px-5 bg-purple-800 text-white hover:bg-purple-700 transition-colors duration-200">
                        Ajouter un Tag
                        <i class="fas fa-plus ml-1"></i>
                    </button>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>

                        <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300" placeholder="Search">
                    </div>
                </div>
                <!-- Tags Cards -->
                <div class="grid grid-cols-3 gap-5 flex-wrap">

                    <?php
                        require_once '../../classes/tag.php';

                        $tg = new Tag();
                        $tags = $tg->allTags();

                        if (is_array($tags)) {
                            foreach ($tags as $tag) {
                                echo '
                                    <div class="bg-gray-100 rounded-xl shadow-lg p-6 hover:shadow-xl transition duration-300 border border-purple-100 transform hover:-translate-y-1 animate-slideIn">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <span class="w-3 h-3 rounded-full bg-gradient-to-r from-purple-500 to-pink-500"></span>
                                                <h3 class="text-md font-semibold text-purple-900">'. $tag['nom_tag'] .'</h3>
                                            </div>
                                            <span class="text-xs px-3 py-1 rounded-full bg-yellow-100 text-gray-900">'. $tag['nbr_articles'] .' articles</span>
                                        </div>
                                        
                                        <div class="flex justify-end gap-2 mt-4">
                                            <a href="../../actions/editTag.php?id='. $tag['id_tag'] .'"><button class="p-2 text-blue-600 hover:bg-purple-50 rounded-lg transition duration-200 hover:scale-110" 
                                                    title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button></a>
                                            <a href="../../actions/deleteTag.php?id='. $tag['id_tag'] .'"><button class="p-2 text-red-500 hover:bg-pink-50 rounded-lg transition duration-200 hover:scale-110"
                                                    title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button></a>
                                        </div>
                                    </div>
                                ';
                            }
                        }else{
                            echo '<h1 class="col-span-3 text-red-600 font-semibold text-2xl">Vous n\'avez pas ajouté AUCUN TAG !</h1>';
                        }
                    ?>

                    <!-- <div class="bg-gray-100 rounded-xl shadow-lg p-6 hover:shadow-xl transition duration-300 border border-purple-100 transform hover:-translate-y-1 animate-slideIn">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="w-3 h-3 rounded-full bg-gradient-to-r from-purple-500 to-pink-500"></span>
                                <h3 class="text-lg font-semibold text-purple-900">test</h3>
                            </div>
                            <span class="text-sm px-3 py-1 rounded-full bg-yellow-100 text-gray-900">23 articles</span>
                        </div>
                        
                        <div class="flex justify-end gap-2 mt-4">
                            <button class="p-2 text-blue-600 hover:bg-purple-50 rounded-lg transition duration-200 hover:scale-110" 
                                    title="Modifier">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-red-500 hover:bg-pink-50 rounded-lg transition duration-200 hover:scale-110"
                                    title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- Articles -->
            <div id="admin-manage-articles" style="display: none;" class="py-10 px-8 ">
                <!-- Articles En Attente -->
                <div class="flex flex-col justify-center mb-10">
                    <h1 class="font-semibold text-2xl mb-6">Articles <span class="text-yellow-500">En Attente</span></h1>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-purple-700 text-white">
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Couverture</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Auteur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date de Publication</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 divide-y divide-gray-200 text-xs">

                            <?php
                                require_once '../../classes/article.php';

                                $art = new Article();
                                $articles = $art->pendingArticles();

                                if (is_array($articles)) {
                                    foreach ($articles as $article) {
                                        echo '<tr>
                                                <td class="px-6 py-4 whitespace-nowrap"><img src="../../uploads/'. $article['couverture'] .'"></td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . substr($article['titre'], 0, 20) . '...</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['nom_categorie'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['prenom'] . ' ' . $article['nom'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['date_publication'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="./article.php?id='. $article['id_article'] .'"><button class="show-art py-3 px-3 rounded-full border-none text-xl text-blue-500"><i class="fa-solid fa-eye"></i></button></a>
                                                    <a href="../../actions/approveArticle.php?id='. $article['id_article'] .'"><button class="py-3 px-3 rounded-full border-none text-xl text-green-500 "><i class="fa-solid fa-square-check"></i></button></a>
                                                    <a href="../../actions/refuseArticle.php?id='. $article['id_article'] .'"><button class="py-3 px-3 rounded-full border-none text-xl text-red-500 "><i class="fa-solid fa-ban"></i></button></a>
                                                </td>
                                            </tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Articles Refusés -->
                <div class="flex flex-col justify-center mb-10">
                    <h1 class="font-semibold text-2xl mb-6">Articles <span class="text-red-500">Refusés</span></h1>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr class="bg-purple-700 text-white">
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Couverture</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Auteur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date de Publication</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 divide-y divide-gray-200 text-xs">
                            <?php
                                require_once '../../classes/article.php';

                                $art = new Article();
                                $articles = $art->refusedArticles();

                                if (is_array($articles)) {
                                    foreach ($articles as $article) {
                                        echo '<tr>
                                                <td class="px-6 py-4 whitespace-nowrap"><img src="../../uploads/'. $article['couverture'] .'" class="w-2/3"></td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . substr($article['titre'], 0, 20) . '...</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['nom_categorie'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['prenom'] . ' ' . $article['nom'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['date_publication'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="./article.php?id='. $article['id_article'] .'"><button class="show-art py-3 px-3 rounded-full border-none text-xl text-blue-500"><i class="fa-solid fa-eye"></i></button></a>
                                                    <a href="../../actions/approveArticle.php?id='. $article['id_article'] .'"><button class="py-3 px-3 rounded-full border-none text-xl text-green-500 "><i class="fa-solid fa-square-check"></i></button></a>
                                                </td>
                                            </tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Articles Accptés -->
                <div class="flex flex-col justify-center mb-10">
                    <h1 class="font-semibold text-2xl mb-6">Articles <span class="text-green-500">Acceptés</span></h1>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr class="bg-purple-700 text-white">
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Couverture</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Auteur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date de Publication</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 divide-y divide-gray-200 text-xs">
                            <?php
                                require_once '../../classes/article.php';

                                $art = new Article();
                                $articles = $art->allArticles();

                                if (is_array($articles)) {
                                    foreach ($articles as $article) {
                                        echo '<tr>
                                                <td class="px-6 py-4 whitespace-nowrap"><img src="../../uploads/'. $article['couverture'] .'" class="w-2/3"></td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . substr($article['titre'], 0, 20) . '...</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['nom_categorie'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['prenom'] . ' ' . $article['nom'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">' . $article['date_publication'] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="./article.php?id='. $article['id_article'] .'"><button class="show-art py-3 px-3 rounded-full border-none text-xl text-blue-500"><i class="fa-solid fa-eye"></i></button></a>
                                                    <a href="../../actions/refuseArticle.php?id='. $article['id_article'] .'"><button class="py-3 px-3 rounded-full border-none text-xl text-red-500 "><i class="fa-solid fa-ban"></i></button></a>
                                                </td>
                                            </tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Authors -->
            <div id="admin-manage-authors" style="display:none ;" class="p-8 ">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                        require_once '../../classes/auteur.php';

                        $auth = new Auteur() ;
                        $auteurs = $auth->showAuthors();
                        if (is_array($auteurs)) {
                            foreach ($auteurs as $auteur) {
                                $nbr = $auth->countArticles($auteur['id_user']);
                                echo '
                                <div class="bg-purple-100 rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                                    <div class="flex items-center justify-center">
                                        <div class="flex flex-col items-center">
                                            <img src="../../uploads/'. $auteur['photo'] .'" alt="Profile" class="h-16 w-16 rounded-full object-cover mb-4">
                                            <p class="text-lg font-semibold text-gray-800">'. $auteur['prenom'] . ' ' . $auteur['nom'] .'</p>
                                            <p class="text-sm text-gray-600">'. $auteur['email'] .'</p>
                                            <p class="text-sm text-gray-600">Articles: '. $nbr['nbr_articles'] .'</p>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        }
                    ?>
                </div>
            </div>

            <!-- Users -->
            <div id="admin-manage-users" style="display: none;" class="p-8 ">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                    <?php
                        require_once '../../classes/user.php';

                        $user = new User();
                        $users = $user->allUsers('Utilisateur');

                        if (is_array($users)) {
                            foreach ($users as $use) {
                                echo '
                                    <div class="bg-purple-100 rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                                        <div class="flex items-center justify-center">
                                            <div class="flex flex-col items-center">
                                                <img src="../../uploads/'. $auteur['photo'] .'" alt="Profile" class="h-12 w-12 rounded-full object-cover mb-4">
                                                <p class="text-lg font-semibold text-gray-800">'. $use['prenom'] . ' ' . $use['nom'] .'</p>
                                                <p class="text-sm text-gray-600">'. $use['email'] .'</p>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                    ?>
                    
                </div>
            </div>

            <!-- Profile Section -->
            <div id="admin-manage-profile" style="display: none;" class="flex justify-center  p-10">
                <div class="bg-white rounded-xl shadow-2xl max-w-sm w-full overflow-hidden transition-all duration-300 hover:shadow-indigo-500/50 ">
                    <?php
                        require_once '../../classes/user.php';

                        $user = new User();
                        $auteur = $user->profile((int)$_SESSION['id_user']);

                    ?>
                    <div class="relative h-32 bg-gradient-to-r from-pink-600 to-purple-700">
                        <img src="https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg" alt="<?php echo $auteur['prenom'] . ' ' . $auteur['nom']; ?>" class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white transition-transform duration-300 hover:scale-105 z-0">
                    </div>
                    
                    <div class="pt-16 pb-6 px-6 text-center">
                        <h1 class="text-2xl font-bold text-gray-800 mb-1"><?php echo $auteur['prenom'] . ' ' . $auteur['nom']; ?></h1>
                        <p class="text-indigo-600 font-semibold mb-4"><?php echo $auteur['role'] ; ?></p>
                        <p class="text-gray-600 mb-4"><?php echo $auteur['email']; ?></p>
                        <div class="flex justify-center space-x-4 mb-2">
                            <a href="#" class="text-gray-600 hover:text-indigo-800  transition-colors duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-indigo-800  transition-colors duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-indigo-800  transition-colors duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-4">
                        <button class="w-full bg-purple-700 text-white py-2 rounded-lg font-semibold hover:bg-purple-900 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:ring-offset-2">
                            Modifier
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add New Category -->
            <div style="display:none;" id="add-cat-form" class="z-10 fixed inset-0 bg-gray-900 bg-opacity-80 flex justify-center items-center ">
                <div class="max-w-md w-full space-y-8 bg-white px-8 py-5 rounded-lg shadow-lg animate__animated animate__fadeIn">
                    <div>
                        <h2 class="text-center text-3xl font-extrabold text-gray-900">
                            Nouvelle Catégorie
                        </h2>
                    </div>
                    <form method="POST" action="../../actions/addCategory.php" id="addCategoryForm" class="mt-8 space-y-6">
                        <div class="rounded-md shadow-sm flex flex-col gap-5">
                            <div>
                                <label for="nom-cat" class="sr-only">Nom</label>
                                <input id="nom-cat" name="nom-cat" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Nom de Catégorie">
                            </div>
                            <div>
                                <label for="description" class="sr-only">Description</label>
                                <textarea id="description" name="description" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Entrer le Contenu de votre Article ici.."></textarea>
                            </div>
                        </div>

                        <div class="flex items-center gap-10">
                            <button type="submit" name="add-cat" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium  text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Enregister
                            </button>
                            <button type="button" name="cancel-cat" id="cancel-cat" class="group relative w-full flex justify-center py-2 px-4 border border-gray-800 text-sm font-medium text-black bg-transparent duration-500 hover:bg-red-700 hover:border-none hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-transparent">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Add New Tag -->
            <div style="display: none;"  id="add-tag-form" class="z-10 fixed inset-0 bg-gray-900 bg-opacity-80 flex justify-center items-center ">
                <div class="max-w-md w-full space-y-8 bg-white px-8 py-5 rounded-lg shadow-lg animate__animated animate__fadeIn">
                    <div>
                        <h2 class="text-center text-2xl font-extrabold text-gray-900">
                            Nouveau Tag
                        </h2>
                    </div>
                    <form method="POST" action="../../actions/addTag.php" id="addTagForm" class="mt-8 space-y-6">
                        <div class="rounded-md shadow-sm flex flex-col gap-5">
                            <div>
                                <label for="nom-tag" class="sr-only">Nom</label>
                                <input id="nom-tag" name="nom-tag" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Nom du Tag">
                            </div>
                        </div>

                        <div class="flex items-center gap-10">
                            <button type="submit" name="add-tag" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium  text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Enregister
                            </button>
                            <button type="button" name="cancel-tag" id="cancel-tag" class="group relative w-full flex justify-center py-2 px-4 border border-gray-800 text-sm font-medium text-black bg-transparent duration-500 hover:bg-red-700 hover:border-none hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-transparent">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </section>
            
    </main>

    <script src="../../assets/js/admin.js"></script>
</body>

</html>