<?php
    session_start();
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
<body class="relative">
    <div id="article-infos" class="z-10 fixed inset-0 bg-black bg-opacity-90 flex justify-center items-center">
        <article class="bg-white rounded-md w-[70vw] h-[90vh] overflow-auto relative">
            


                    <?php
                        require_once '../../classes/article.php';
                        require_once '../../classes/tag.php';
                        $id = $_GET['id'];
                        $article = new Article();
                        $result = $article->getArticle($id);

                        $tg = new Tag();

                        if($result){
                            $tags = $tg->articleTag((int)$result['id_article']);
                            echo ' 
                            <div>
                                <img src="../../uploads/'. $result['couverture'] .'" class="rounded-t-md w-full" alt="Couverture de l\'Article">
                            </div>
                            <div class="p-4">
                                <div class="pt-5">
                            <div class="mb-5 flex items-center justify-between">
                            <p class="text-gray-800 font-medium text-lg">' . $result['date_publication'] . ' •</p>
                            <p class="text-gray-800 font-medium text-lg">Par : ' . $result['prenom'] . ' ' . $result['nom']. '</p>
                            </div>';
                            echo '<div class="flex items-center gap-1 mt-2 mb-4 flex-wrap">';
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
                            echo '<p class="text-gray-700 font-medium text-md text-justify">'. $result['contenu'] .'</p>';
                            echo '<p class="absolute top-5 left-5 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">' . $result['nom_categorie'] . '</p>';
                            if ($result['statut'] == 'Accepté') {
                                echo '<span class="absolute top-5 right-5 text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">' . $result['statut'] . '</span>';
                            } else if ($result['statut'] == 'En Attente') {
                                echo '<span class="absolute top-5 right-5 text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full">' . $result['statut'] . '</span>';
                            } else {
                                echo '<span class="absolute top-5 right-5 text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full">' . $result['statut'] . '</span>';
                            }
                        }
                    ?>
                </div>
            </div>
        </article>
        <a href="./dashboard.php" class="absolute top-5 right-5 text-white px-2 py-1 text-xl"><i class="fa-solid fa-xmark"></i></a>
    </div>
    
</body>
</html>