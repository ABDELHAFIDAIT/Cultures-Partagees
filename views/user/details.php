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
        <div class="grid grid-cols-3 gap-5 my-10">
            <!-- Infos -->
            <div class="col-span-1 flex flex-col gap-5">
                <div class="bg-white p-5 rounded-sm shadow-md h-min">
                    <div class="flex flex-col gap-3">
                        <h1 class="text-pink-500 text-2xl font-semibold">A Propos</h1>
                        <?php
                            require_once '../../classes/article.php';
                            $id = $_GET['id'];
                            $article = new Article();
                            $result = $article->showArticle($id);

                            if($result){
                                echo "<h2 class='text-lg text-gray-800'><span class='font-semibold'>• Auteur :</span> ".$result['prenom']. ' ' .$result['nom']."</h2>";
                                echo "<h2 class='text-lg text-gray-800'><span class='font-semibold'>• Catégorie :</span> ".$result['nom_categorie']."</h2>";
                                echo "<h2 class='text-lg text-gray-800'><span class='font-semibold'>• Date de Publication :</span> ".$result['date_publication']."</h2>";
                            }
                        ?>

                    </div>
                </div>
                <div class="bg-white p-5 rounded-sm shadow-md h-min">
                    <div class="flex flex-col gap-3">
                        <h1 class="text-pink-500 text-2xl font-semibold">Autres Articles</h1>

                        <?php
                            require_once '../../classes/article.php';

                            $article = new Article();
                            $articles = $article->allArticles();

                            if($articles){
                                foreach($articles as $art){
                                    echo '<a href="?id='. $art['id_article'] .'"><p class="text-sm text-gray-900">• '. $art['titre'] .'</p></a>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Articles -->
            <div class="col-span-2 flex gap-5 flex-wrap">
                <article class="bg-white shadow-md rounded-md">
                    <div>
                        <img src="../../assets/img/default-image.png" class="rounded-t-md w-full" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <div class="pt-5">


                            <?php
                                require_once '../../classes/article.php';
                                $id = $_GET['id'];
                                $article = new Article();
                                $result = $article->showArticle($id);

                                if($result){
                                    echo '<h1 class="text-gray-900 font-semibold text-xl mb-3">'. $result['titre'] .'</h1>';
                                    echo '<p class="text-gray-700 font-medium text-md">'. $result['contenu'] .'</p>';
                                }
                            ?>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once '../../includes/footer.php' ?>
</body>

</html>