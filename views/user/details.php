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
                        <h2 class="text-lg text-gray-800"><span class="font-semibold">• Auteur :</span> Marie Dubois</h2>
                        <h2 class="text-lg text-gray-800"><span class="font-semibold">• Catégorie :</span> Peinture</h2>
                        <h2 class="text-lg text-gray-800"><span class="font-semibold">• Date de Publication :</span> 2025-01-01</h2>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-sm shadow-md h-min">
                    <div class="flex flex-col gap-3">
                        <h1 class="text-pink-500 text-2xl font-semibold">Autres Articles</h1>
                        <a href="#"><p class="text-sm text-gray-900">• Lorem ipsum dolor sit, amet consectetur.</p></a>
                        <a href="#"><p class="text-sm text-gray-900">• Lorem ipsum dolor sit, amet consectetur.</p></a>
                        <a href="#"><p class="text-sm text-gray-900">• Lorem ipsum dolor sit, amet consectetur.</p></a>
                        <a href="#"><p class="text-sm text-gray-900">• Lorem ipsum dolor sit, amet consectetur.</p></a>
                    </div>
                </div>
            </div>
            <!-- Articles -->
            <div class="col-span-2 flex gap-5 flex-wrap">
                <article class="bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1579541671172-43429ce17aca?q=80&w=2065&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <div class="pt-5">
                            <h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1>
                            <p class="text-gray-700 font-medium text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum doloremque amet minus at minima, tenetur suscipit, quo cupiditate itaque explicabo inventore maiores modi quod! Ducimus porro quis numquam ratione explicabo. Provident nisi rerum ut omnis autem eligendi hic eius laboriosam animi dolores cum quos mollitia, perspiciatis eaque et ipsum tempore quasi neque inventore eum illum? Nisi ea exercitationem beatae quasi doloremque, in quo totam tempore perferendis minima debitis reprehenderit. Itaque voluptates numquam animi culpa fuga minus inventore consequuntur unde optio? Suscipit, vel fuga! Amet reprehenderit ullam eaque nemo, nisi ipsum reiciendis facere quisquam nihil odit sunt illum laboriosam corporis adipisci?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic odio nostrum amet soluta laboriosam, rem adipisci, perferendis at dolorum labore consequatur. Recusandae explicabo quisquam quidem odit ullam officiis autem tempore accusantium? Sed ab quae eveniet, iste officia quisquam harum ducimus repudiandae laboriosam. Ipsam, mollitia! Maiores, esse eveniet? Eveniet, id eligendi!</p>
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