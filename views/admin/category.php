<?php
    session_start();

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

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
    <title>Catégorie</title>
    <link rel="icon" type="../../assets/img/logo.png" href="../../assets/img/logo.png">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
        require_once '../../classes/categorie.php';

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $cat = new Categorie();
            $categorie = $cat->showCategorie($id);

            if($categorie){
                echo '
                    <div class="z-10 fixed inset-0 bg-black bg-opacity-90 flex justify-center items-center ">
                        <div class="max-w-md w-full space-y-8 bg-white px-8 py-5 rounded-lg shadow-lg animate__animated animate__fadeIn">
                            <div>
                                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                                    Modifier Catégorie
                                </h2>
                            </div>
                            <form method="POST" action="../../actions/updateCategory.php" class="mt-8 space-y-6">
                                <input type="hidden" name="csrf_token" value="'. $_SESSION['csrf_token'] .'">
                                <div class="rounded-md shadow-sm flex flex-col gap-5">
                                    <div>
                                        <label for="nom-cat" class="sr-only">Nom</label>
                                        <input value="'. $categorie['nom_categorie'] .'" id="nom-cat" name="nom-cat" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Nom de Catégorie">
                                    </div>
                                    <div>
                                        <label for="description" class="sr-only">Description</label>
                                        <textarea id="description" name="description" required class="appearance-none rounded-none relative block h-[40vh] w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Entrer le Contenu de votre Article ici..">'. $categorie['description'].'</textarea>
                                    </div>
                                    <div class="hidden">
                                        <label for="id" class="sr-only">id</label>
                                        <input value="'. $categorie['id_categorie'].'" id="id" name="id" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Entrer le Contenu de votre Article ici..">
                                    </div>
                                </div>

                                <div class="flex items-center gap-10">
                                    <button type="submit" name="update-cat" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium  text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                        Enregister
                                    </button>
                                    <a href="./dashboard.php"><button type="button" name="cancel-cat" id="cancel-cat" class="group relative w-full flex justify-center py-2 px-4 border border-gray-800 text-sm font-medium text-black bg-transparent duration-500 hover:bg-red-700 hover:border-none hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-transparent">
                                        Annuler
                                    </button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                ';
            }
        }
    ?>
</body>
</html>