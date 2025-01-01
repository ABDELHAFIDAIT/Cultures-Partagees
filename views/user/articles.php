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
                <li class="bg-white text-purple-700 rounded-full py-2 px-5 duration-500 hover:bg-purple-700 hover:text-white cursor-pointer">Peinture</li>
                <li class="bg-white text-purple-700 rounded-full py-2 px-5 duration-500 hover:bg-purple-700 hover:text-white cursor-pointer">Musique</li>
                <li class="bg-white text-purple-700 rounded-full py-2 px-5 duration-500 hover:bg-purple-700 hover:text-white cursor-pointer">Littérature</li>
                <li class="bg-white text-purple-700 rounded-full py-2 px-5 duration-500 hover:bg-purple-700 hover:text-white cursor-pointer">Théâtre</li>
                <li class="bg-white text-purple-700 rounded-full py-2 px-5 duration-500 hover:bg-purple-700 hover:text-white cursor-pointer">Cinéma</li>
            </ul>
        </div>
        <div class="grid grid-cols-4 gap-5 mt-10">
            <!-- Articles -->
            <div class="col-span-3 flex gap-5 flex-wrap lg:grid lg:grid-cols-2">
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1579541671172-43429ce17aca?q=80&w=2065&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-between items-center mt-5">
                            <h1 class="text-gray-700 font-medium text-sm">Par Marie Dubois</h1>
                            <a href="./details.php" class="text-pink-600">Lire la Suite →</a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fG11c2lxdWV8ZW58MHwwfDB8fHwy" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-between items-center mt-5">
                            <h1 class="text-gray-700 font-medium text-sm">Par Marie Dubois</h1>
                            <a href="./details.php" class="text-pink-600">Lire la Suite →</a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1513106580091-1d82408b8cd6?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8VGglQzMlQTlhdHJlfGVufDB8MHwwfHx8Mg%3D%3D" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-between items-center mt-5">
                            <h1 class="text-gray-700 font-medium text-sm">Par Marie Dubois</h1>
                            <a href="./details.php" class="text-pink-600">Lire la Suite →</a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
                <article class="relative bg-white shadow-md rounded-md">
                    <div>
                        <img src="https://images.unsplash.com/photo-1542509058-4b08b0a5a828?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y2luJUMzJUE5bWF8ZW58MHwwfDB8fHwy" class="rounded-t-md" alt="Couverture de l'Article">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800 font-medium text-sm">2025-01-01 •</p>
                        <div class="pt-5">
                            <h1 class="text-gray-900 font-semibold text-xl mb-3">L'Art Moderne au 21ème Siècle</h1>
                            <p class="text-gray-700 font-medium text-md">Une exploration des tendances actuelles dans l'art moderne...</p>
                        </div>
                        <div class="flex justify-between items-center mt-5">
                            <h1 class="text-gray-700 font-medium text-sm">Par Marie Dubois</h1>
                            <a href="./details.php" class="text-pink-600">Lire la Suite →</a>
                        </div>
                    </div>
                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs">Peinture</p>
                </article>
            </div>
            <!-- Authors -->
            <div class="bg-white p-5 rounded-sm shadow-md h-min">
                <div>
                    <h1 class="text-purple-900 font-semibold text-xl mb-4 ">Amelia Anderson</h1>
                    <ul class="flex flex-col text-gray-700 font-medium text-sm gap-1">
                        <li>• Lorem ipsum dolor sit amet.</li>
                        <li>• Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <hr class="border border-gray-300 my-4">
                <div>
                    <h1 class="text-purple-900 font-semibold text-xl mb-4 ">Amelia Anderson</h1>
                    <ul class="flex flex-col text-gray-700 font-medium text-sm gap-1">
                        <li>• Lorem ipsum dolor sit amet.</li>
                        <li>• Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <hr class="border border-gray-300 my-4">
                <div>
                    <h1 class="text-purple-900 font-semibold text-xl mb-4 ">Amelia Anderson</h1>
                    <ul class="flex flex-col text-gray-700 font-medium text-sm gap-1">
                        <li>• Lorem ipsum dolor sit amet.</li>
                        <li>• Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <hr class="border border-gray-300 my-4">
                <div>
                    <h1 class="text-purple-900 font-semibold text-xl mb-4 ">Amelia Anderson</h1>
                    <ul class="flex flex-col text-gray-700 font-medium text-sm gap-1">
                        <li>• Lorem ipsum dolor sit amet.</li>
                        <li>• Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <hr class="border border-gray-300 my-4">
                <div>
                    <h1 class="text-purple-900 font-semibold text-xl mb-4 ">Amelia Anderson</h1>
                    <ul class="flex flex-col text-gray-700 font-medium text-sm gap-1">
                        <li>• Lorem ipsum dolor sit amet.</li>
                        <li>• Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once '../../includes/footer.php' ?>
</body>

</html>