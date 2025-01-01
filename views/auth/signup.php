<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureConnect - Register</title>
    <link rel="icon" type="../assets/img/logo.png" href="../../assets/img/logo.png">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <main class="redirection flex justify-center items-center h-screen">
        <div class="max-w-md w-full space-y-8 bg-white py-5 px-8 rounded-lg shadow-lg animate__animated animate__fadeIn">
            <div>
                <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">
                    Créez votre compte
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Ou
                    <a href="login.php" class="font-medium text-purple-600 hover:text-purple-500">
                        connectez-vous à votre compte existant
                    </a>
                </p>
            </div>
            <form id="registerForm" class="mt-8 space-y-6">
                <div class="rounded-md shadow-sm flex flex-col gap-5">
                    <div>
                        <label for="prenom" class="sr-only">Prenom</label>
                        <input id="prenom" name="prenom" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Prenom">
                    </div>
                    <div>
                        <label for="nom" class="sr-only">Nom</label>
                        <input id="nom" name="nom" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Nom">
                    </div>
                    <div>
                        <label for="role" class="sr-only">Identité</label>
                        <select name="role" id="role" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm">
                            <option>Utilisateur</option>
                            <option>Auteur</option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="sr-only">Adresse email</label>
                        <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Adresse email">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Mot de passe">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        Créer un compte
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>