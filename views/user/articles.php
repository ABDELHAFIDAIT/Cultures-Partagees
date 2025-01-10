<?php
    session_start();
    if($_SESSION['role'] !== 'Utilisateur'){
        if($_SESSION['role'] === 'Admin'){
            header("Location: ../admin/dashboard.php");
        }else if($_SESSION['role'] === 'Auteur'){
            header("Location: ../auteur/dashboard.php");
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
    <!-- Navbar -->
    <?php include_once '../../includes/navbar.php' ?>

    <!-- Articles -->
    <main class="bg-gray-200 p-10">
        <!-- Filter -->
        <div class="flex flex-col gap-5">
            <h1 class="font-semibold text-2xl">Catégories</h1>
            <ul class="flex items-center gap-5 flex-wrap">
                <li class="bg-purple-700 text-white rounded-full py-2 px-5 duration-500 hover:bg-purple-700 hover:text-white cursor-pointer">Toutes</li>

                <?php
                    require_once '../../classes/categorie.php';

                    $categorie = new Categorie();
                    $categories = $categorie->allCategories();

                    if($categories){
                        foreach($categories as $cat){
                            echo '<li class="bg-white text-purple-700 rounded-full py-2 px-5 duration-500 hover:bg-purple-700 hover:text-white cursor-pointer">'. $cat['nom_categorie'] .'</li>';
                        }
                    }
                ?>
            </ul>
        </div>
        <div class="grid grid-cols-4 gap-5 mt-10">
            <!-- Articles -->
            <div class="col-span-3 flex gap-5 flex-wrap lg:grid lg:grid-cols-2">

                <?php
                
                    require_once '../../classes/article.php';
                    require_once '../../classes/tag.php';

                    $article = new Article();
                    $articles = $article->allArticles();

                    $tg = new Tag();

                    if($articles){
                        foreach($articles as $art){
                            $tags = $tg->articleTag((int)$art['id_article']);
                            echo '<article class="relative bg-white shadow-md rounded-md">';
                            echo'<div>
                                    <img src="../../uploads/'. $art['couverture'] .'" class="rounded-t-md" alt="Couverture de l\'Article">
                                </div>';
                            echo '<div class="p-4">';
                            echo '<p class="text-gray-800 font-medium text-sm">'. $art['date_publication'] .' •</p>';
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
                                        <a href="#"><h1 class="text-gray-900 font-semibold text-xl mb-3">'. $art['titre'] .'</h1></a>
                                        <p class="text-gray-700 font-medium text-md">'. substr($art['contenu'], 0, 100) .'...</p>
                                    </div>
                                    <div class="flex justify-between items-center mt-5">
                                        <h1 class="text-gray-700 font-medium text-sm">Par '. $art['prenom'] . ' ' . $art['nom'] .'</h1>
                                        <a href="./details.php?id='. $art['id_article'] .'" class="text-pink-600">Lire la Suite →</a>
                                    </div>
                                </div>
                                <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">'. $art['nom_categorie'] .'</p>
                            </article>';
                        }
                    }else{
                        echo "<h1 class='text-gray-900 font-semibold text-xl mb-3'>Aucun Article Trouvé</h1>";
                    }
                ?>
            </div>
            <!-- Authors -->
            <div class="bg-white p-5 rounded-sm shadow-md h-min">


                <?php
                
                    require_once '../../classes/auteur.php';

                    $auteur = new Auteur();
                    $authors = $auteur->showAuthors();
                    

                    if($authors){
                        foreach($authors as $author){
                            $articles = $auteur->acceptedArticles($author['id_user']);
                                echo '
                                    <div>
                                        <h1 class="text-purple-900 font-semibold text-xl mb-4 ">'. $author['prenom'] . ' ' . $author['nom'] .'</h1>
                                        <ul class="flex flex-col text-gray-700 font-medium text-sm gap-2">';
                                        if(!$articles){
                                            echo '<li class="text-red-600">Aucun Article n\'est trouvé !</li>';
                                        }else{
                                            for ($i=0; $i < count($articles) ; $i++) { 
                                                echo '<li>• '. $articles[$i]['titre'] .'</li>';
                                            }
                                        }
                                echo '</ul>
                                    </div>
                                    <hr class="border border-gray-300 my-4">';
                        }
                    }
                
                ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once '../../includes/footer.php' ?>
</body>

</html>