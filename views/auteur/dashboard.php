<?php
session_start();


if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SESSION['role'] !== 'Auteur') {
    if ($_SESSION['role'] === 'Admin') {
        header("Location: ../admin/dashboard.php");
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
    <title>Articles</title>
    <link rel="icon" type="../../assets/img/logo.png" href="../../assets/img/logo.png">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .custom-scroll::-webkit-scrollbar {
            width: 0px;
        }
    </style>
    
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="custom-scroll">
    <main class="min-h-screen flex custom-scroll">
        <!-- Sidebar -->
        <aside class="custom-scroll w-64 h-screen fixed overflow-auto bg-gradient-to-b from-purple-800 to-purple-900 text-white">
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

                <div id="author-statistics" class="cursor-pointer flex items-center px-6 py-3 bg-purple-700 border-r-4 border-white hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-chart-line mr-3"></i>
                    Dashboard
                </div>

                <div id="author-articles" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-pencil-alt mr-3"></i>
                    Mes Articles
                </div>

                <div id="open-add-article" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
                    <i class="fas fa-plus-circle mr-3"></i>
                    Nouvel Article
                </div>

                <div class="px-6 py-3 mt-6">
                    <p class="text-xs uppercase text-purple-300">Paramètres</p>
                </div>

                <div id="author-profile" class="cursor-pointer flex items-center px-6 py-3 hover:bg-purple-700 transition-colors duration-200">
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
        <section class="custom-scroll ml-64 flex-1 overflow-auto">
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
                                <img src="https://cdn-icons-png.flaticon.com/128/64/64572.png" alt="Profile"
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
            <div id="auth-stat" class="p-8 bg-gray-200">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div
                        class="bg-white rounded-xl shadow-sm p-6 animate__animated animate__fadeIn hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total</p>
                                <?php
                                require_once '../../classes/article.php';

                                $article = new Article();
                                $nbr = $article->countArticles((int) $_SESSION['id_user']);
                                echo '<h3 class="text-2xl font-bold text-gray-800">' . $nbr['nbr_articles'] . '</h3>';
                                ?>
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
                                <?php
                                require_once '../../classes/article.php';
                                $statut = 'Accepté';
                                $article = new Article();
                                $nbr = $article->statusArticles((int) $_SESSION['id_user'], $statut);
                                echo '<h3 class="text-2xl font-bold text-gray-800">' . $nbr['nbr_articles'] . '</h3>';
                                ?>
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
                                <?php
                                require_once '../../classes/article.php';
                                $statut = 'En Attente';
                                $article = new Article();
                                $nbr = $article->statusArticles((int) $_SESSION['id_user'], $statut);
                                echo '<h3 class="text-2xl font-bold text-gray-800">' . $nbr['nbr_articles'] . '</h3>';
                                ?>
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
                                <?php
                                require_once '../../classes/article.php';
                                $statut = 'Refusé';
                                $article = new Article();
                                $nbr = $article->statusArticles((int) $_SESSION['id_user'], $statut);
                                echo '<h3 class="text-2xl font-bold text-gray-800">' . $nbr['nbr_articles'] . '</h3>';
                                ?>
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

                                <?php
                                require_once '../../classes/categorie.php';

                                $cat = new Categorie();
                                $result = $cat->distributeCategories((int) $_SESSION['id_user']);
                                // echo $result;
                                if ($result) {
                                    foreach ($result as $row) {
                                        echo '
                                                <div class="p-4 bg-gray-50 rounded-lg">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center">
                                                            <div
                                                                class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                                                <i class="fa-solid fa-thumbtack text-blue-600"></i>
                                                            </div>
                                                            <span class="ml-3 font-medium text-gray-700">' . $row['nom_categorie'] . '</span>
                                                        </div>
                                                        <span class="text-sm text-gray-500">' . $row['nbr_articles'] . ' articles</span>
                                                    </div>
                                                </div>
                                            ';
                                    }
                                }else{
                                    echo '<h1 class="text-red-600 font-semibold text-lg">Vous n\'avez pas posté AUCUN ARTICLE !</h1>';
                                }

                                ?>
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

                            <?php
                            require_once '../../classes/auteur.php';

                            $auteur = new Auteur();
                            $articles = $auteur->recentArticles((int)$_SESSION['id_user']);

                            if ($articles) {
                                foreach ($articles as $article) {
                                    echo '
                                            <div
                                                class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                                <img src="../../assets/img/default-image.png" alt="Article"
                                                    class="h-16 w-16 rounded-lg object-cover">
                                                <div class="ml-4 flex-1 flex flex-col justify-between">
                                                    <h4 class="text-sm font-semibold text-gray-800">' . $article['titre'] . '</h4>
                                                    <p class="text-sm text-gray-600">' . $article['date_publication'] . '</p>
                                                    <div class="flex items-center mt-1">';

                                    if ($article['statut'] == 'Accepté') {
                                        echo '<span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">' . $article['statut'] . '</span>';
                                    } else if ($article['statut'] == 'En Attente') {
                                        echo '<span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full">' . $article['statut'] . '</span>';
                                    } else {
                                        echo '<span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full">' . $article['statut'] . '</span>';
                                    }
                                    echo '</div>
                                                </div>
                                            </div>
                                        ';
                                }
                            }else{
                                echo '<h1 class="text-red-600 font-semibold text-lg">Vous n\'avez pas posté AUCUN ARTICLE !</h1>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- articles -->
            <div style="display:none;" id="auth-art" class="p-10 flex gap-8 flex-wrap lg:grid lg:grid-cols-2 bg-gray-200">
                <?php

                require_once '../../classes/auteur.php';
                require_once '../../classes/tag.php';

                $auteur = new Auteur();
                $articles = $auteur->ownArticles((int) $_SESSION['id_user']);

                $tg = new Tag();

                // print_r($articles);
                if($articles){
                    foreach ($articles as $art) {
                        $tags = $tg->articleTag((int)$art['id_article']);
                        echo '<article class="relative bg-white shadow-md rounded-md">';
                        echo '<div>
                                    <img src="../../uploads/'. $art['couverture'] .'" class="rounded-t-md" alt="Couverture de l\'Article">
                                </div>';
                        echo '<div class="p-4">';
                        echo '<p class="text-gray-800 font-medium text-sm">' . $art['date_publication'] . ' •</p>';
                        echo '<div class="flex items-center gap-1 mt-2 flex-wrap">';
                        if(is_array($tags)){
                            foreach ($tags as $tag) {
                                if(is_array($tag)) {
                                    echo '<div class="text-xs text-white bg-blue-700 rounded-full py-1 px-3">#  '. $tag['nom_tag'] .'</div>';
                                }
                            }
                        }else{
                            echo '<p class="text-xs font-extralight text-red-400"># Pas de Tags pour Cet Article !</p>';
                        }
                        echo '</div>';
                        echo '<div class="pt-5">
                                        <a href="./article.php?id='. $art['id_article'] .'"><h1 class="text-gray-900 font-semibold text-xl mb-3">' . $art['titre'] . '</h1></a>
                                        <p class="text-gray-700 font-medium text-md">' . substr($art['contenu'], 0, 100) . '...</p>
                                    </div>
                                    <div class="flex justify-end items-center gap-5 mt-5">
                                        <a href="#">
                                            <button type="button" class="py-2 px-5 rounded-sm text-white bg-blue-500 text-sm duration-500 hover:bg-blue-700">Modifier</button>
                                        </a>
                                        <a href="../../actions/deleteArticle.php?id=' . $art['id_article'] . '">
                                            <button type="button" class="py-2 px-5 rounded-sm text-white bg-red-500 text-sm  duration-500 hover:bg-red-700">Supprimer</button>
                                        </a>
                                    </div>
                                </div>
                                <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">' . $art['nom_categorie'] . '</p>';
                                if ($art['statut'] == 'Accepté') {
                                    echo '<span class="absolute top-2 left-2 text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">' . $art['statut'] . '</span>';
                                } else if ($art['statut'] == 'En Attente') {
                                    echo '<span class="absolute top-2 left-2 text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full">' . $art['statut'] . '</span>';
                                } else {
                                    echo '<span class="absolute top-2 left-2 text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full">' . $art['statut'] . '</span>';
                                }
                            echo '</article>';
                    }
                }else{
                    echo '<h1 class="col-span-2 text-red-600 font-semibold text-2xl">Vous n\'avez pas posté AUCUN ARTICLE !</h1>';
                }

                ?>

            </div>

            <!-- New Article Form -->
            <div id="addArticleContainer" style="display:none;" class="z-10 fixed inset-0 bg-gray-900 bg-opacity-80 flex justify-center items-center ">
                <div class="scale-[0.85] max-w-4xl w-full space-y-8 bg-white px-8 py-5 rounded-lg shadow-lg animate__animated animate__fadeIn">
                    <div>
                        <h2 class="text-center text-2xl font-bold text-gray-900">
                            Ajouter un Nouvel Article
                        </h2>
                    </div>
                    <form method="POST" action="../../actions/addArticle.php" id="addArticleForm" class="mt-4 space-y-6" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <div class="rounded-md shadow-sm flex flex-col gap-5">
                            <div>
                                <label for="titre" class="sr-only">Titre</label>
                                <input id="titre" name="titre" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Titre de l'Article">
                            </div>
                            <div>
                                <label for="categorie" class="sr-only">Categorie</label>
                                <select id="categorie" name="categorie" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm">
                                    <?php
                                        require_once '../../classes/categorie.php';

                                        $cat = new Categorie();
                                        $categories = $cat->allCategories();

                                        if (count($categories) > 0) {
                                            foreach ($categories as $categorie) {
                                                echo '<option value="' . $categorie['id_categorie'] . '">' . $categorie['nom_categorie'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="grid grid-cols-4">
                                <?php 
                                    require_once '../../classes/tag.php';

                                    $tg = new Tag();
                                    $tags = $tg->allTags();

                                    if(is_array($tags) && count($tags) > 0) {
                                        foreach ($tags as $tag) {
                                            echo '
                                                <div class="flex items-center gap-1">
                                                    <input type="checkbox" id="tag" name="tags[]" value="'. $tag['id_tag'] .'">
                                                    <label for="tag" class="mr-3">'. $tag['nom_tag'] .'</label>
                                                </div>
                                            ';
                                        }
                                    }
                                ?>
                            </div>
                            <div>
                                <label for="image" class="sr-only">Photo</label>
                                <input 
                                    id="image" 
                                    name="image" 
                                    type="file" 
                                    accept="image/*" 
                                    required 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" 
                                    placeholder="Télécharger une image">
                            </div>
                            <div>
                                <label for="contenu" class="sr-only">Contenu</label>
                                <textarea id="contenu" name="contenu" required class="appearance-none rounded-none relative block w-full h-[25vh] px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Entrer le Contenu de votre Article ici.."></textarea>
                            </div>
                        </div>

                        <div class="flex items-center gap-10">
                            <button type="submit" name="add-article" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium  text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Enregister
                            </button>
                            <button type="button" name="cancel-article" id="cancel-article" class="group relative w-full flex justify-center py-2 px-4 border border-gray-800 text-sm font-medium text-black bg-transparent duration-500 hover:bg-red-700 hover:border-none hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-transparent">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Profile Section -->
            <div style="display:none;" id="auth-profile" class="flex justify-center bg-gray-200 p-10">
                <div class="bg-white rounded-xl shadow-2xl max-w-sm w-full overflow-hidden transition-all duration-300 hover:shadow-indigo-500/50 ">
                    <?php
                        require_once '../../classes/user.php';

                        $user = new User();
                        $auteur = $user->profile((int)$_SESSION['id_user']);

                    ?>
                    <div class="relative h-32 bg-gradient-to-r from-pink-600 to-purple-700">
                        <img src="../../uploads/<?php echo $auteur['photo'] ?>" class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white transition-transform duration-300 hover:scale-105 z-0">
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
                        <button type="button" class="w-full bg-purple-700 text-white py-2 rounded-lg font-semibold hover:bg-purple-900 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:ring-offset-2">
                            Modifier
                        </button>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <script src="../../assets/js/auteur.js"></script>
</body>

</html>