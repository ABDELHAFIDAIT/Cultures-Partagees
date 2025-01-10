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
                            <?php
                                require_once '../../classes/article.php';
                                require_once '../../classes/tag.php';
                                $id = $_GET['id'];
                                $article = new Article();
                                $result = $article->showArticle($id);
                                
                                $tg = new Tag();

                                if($result){
                                    $tags = $tg->articleTag((int)$result['id_article']);
                                    echo '
                                    <div>
                                        <img src="../../uploads/'. $result['couverture'] .'" class="rounded-t-md w-full" alt="">
                                    </div>
                                    <div class="px-5 py-3">
                                        <div class="pt-3">';
                                    echo '<div class="flex items-center gap-1 mb-5 flex-wrap">';
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
                                    echo '<h1 class="text-gray-900 font-semibold text-xl mb-3">'. $result['titre'] .'</h1>';
                                    echo '<p class="text-gray-700 font-medium text-md">'. $result['contenu'] .'</p>';
                                    echo '<div class="flex items-center justify-end mt-3">';
                                    


                                    echo'       <i id="favoris" class="fa-regular fa-heart text-3xl text-red-500 cursor-pointer mr-5"></i>
                                            <i class="fa-solid fa-file-arrow-down text-3xl text-green-700 cursor-pointer mr-5"></i>
                                        </div>';
                                }

                                //fa-solid
                            ?>

                        </div>
                    </div>
                </article>

                <!-- Les Commentaires -->

                <?php
                    require_once '../../classes/user.php';

                    $use = new User();
                    $id = $_SESSION['id_user'];

                    $user = $use->profile($id);
                ?>
                
                <div class="bg-white w-full px-8 py-4 shadow-md rounded-md">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="../../uploads/<?php echo $user['photo']; ?>" alt="<?php echo $user['prenom'] . ' ' . $user['nom'];  ?>" class="rounded-full w-12 h-12">
                            <div>
                                <h1 class="text-sm font-semibold"><?php echo $user['prenom'] . ' ' . $user['nom'];  ?></h1>
                                <p class="text-sm text-gray-700"><?php echo $user['email'];  ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Add Comment -->
                    <?php $id_article = $_GET['id']; ?>
                    <form method="POST" action="../../actions/addComment.php" class="flex flex-col py-4 gap-2">
                        <textarea class="bg-gray-100 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-700 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" name="comment" id="comment" placeholder="Commenter Ici ..."></textarea>
                        <input class="hidden" name="id" type="text" value="<?php echo $id_article; ?>">
                        <div class="flex items-center justify-end">
                            <button type="submit" name="publish" class="py-1 px-4 bg-blue-600 text-white">Publier</button>
                        </div>
                    </form>
                </div>

                <!-- Show Comments -->
                <div class="w-full flex items-center justify-between">
                    <h1 class="ml-2 text-xl font-semibold">Commentaires</h1>
                    <i id="comments-arrow" class="fa-solid fa-chevron-down cursor-pointer text-xl mr-2 font-semibold"></i>
                </div>

                <div id="comments" class="hidden w-full">
                
                <?php
                
                    require_once '../../classes/comment.php';

                    $cmt = new Comment();

                    $etat = 1;
                    $article = $_GET['id'];

                    $comments = $cmt->articleComments($etat, $article);

                    if(is_array($comments)){
                        foreach($comments as $comment){
                            echo '
                            <div class="bg-white w-full px-8 py-4 shadow-md rounded-md">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <img src="../../uploads/'. $comment['photo'] .'" alt="'. $comment['prenom']. ' ' . $comment['nom'] .'" class="rounded-full w-12 h-12">
                                        <div>
                                            <h1 class="text-sm font-semibold">'. $comment['prenom']. ' ' . $comment['nom'] .'</h1>
                                            <p class="text-sm text-gray-700">Publié le '. $comment['date_soumission']. '</p>
                                        </div>
                                    </div>
                                    <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
                                </div>
                                <div class="py-3">
                                    <p class="text-md text-gray-700">'. $comment['comment']. '</p>
                                </div>
                                <div class="mb-1">
                                    <p class="cursor-pointer font-semibold text-sm pt-2 text-gray-900">Afficher la Traduction</p>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-2 cursor-pointer text-blue-500">
                                        <i class="fa-regular fa-thumbs-up"></i>Like
                                    </div>
                                    <div class="flex items-center gap-2 cursor-pointer text-purple-500">
                                        <i class="fa-regular fa-comment-dots"></i>Répondre
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    }else{
                        echo '<div class="bg-white w-full px-8 py-4 shadow-md rounded-md">
                            <p class="text-md text-gray-700">Soyez le Premier à Commenter cet Article 🙂 </p>
                        </div>';
                    }
                ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once '../../includes/footer.php' ?>

    <script>
        const icon_fav = document.getElementById('favoris');

        icon_fav.addEventListener('click', function(){
            icon_fav.classList.remove('fa-regular');
            icon_fav.classList.add('fa-solid');
        })

        const arrow = document.getElementById('comments-arrow');
        const comments = document.getElementById('comments');

        arrow.addEventListener('click', function(){
            if(arrow.classList.contains('fa-chevron-down')){
                arrow.classList.remove('fa-chevron-down');
                arrow.classList.add('fa-chevron-up');

                comments.classList.remove('hidden');
                comments.classList.add('animate__animated', 'animate__fadeInDown');
                comments.classList.remove('animate__fadeOutUp');
            }else if(arrow.classList.contains('fa-chevron-up')){
                arrow.classList.remove('fa-chevron-up');
                arrow.classList.add('fa-chevron-down');

                comments.classList.add('animate__fadeOutUp');
                comments.classList.remove('animate__fadeInDown');
                setTimeout(() => {
                    comments.classList.add('hidden');
                    comments.classList.remove('animate__fadeOutUp');
                }, 500);
            }
        })
    </script>

</body>

</html>