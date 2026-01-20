<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Projet AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>

<body class="bg-[#1a1a2e] text-white">

    <div class="absolute top-4 left-4">
        <a href="home" class="text-gray-400 hover:text-white flex items-center gap-2 text-sm">
            ← Retour au site
        </a>
    </div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-[#252540] p-8 rounded-xl border border-[#ffffff1a] shadow-2xl">
            
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-white">Connexion</h2>
                <p class="mt-2 text-sm text-gray-400">
                    Ou <a href="register" class="font-medium text-blue-500 hover:text-blue-400">créer un nouveau compte</a>
                </p>
            </div>

            <?php if (isset($error)): ?>
                <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded relative text-sm" role="alert">
                    <span class="block sm:inline">⚠️ <?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="login" method="POST">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email" class="text-sm font-medium text-gray-300">Adresse Email</label>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mt-1" 
                            placeholder="exemple@email.com">
                    </div>
                    <div>
                        <div class="flex justify-between">
                            <label for="password" class="text-sm font-medium text-gray-300">Mot de passe</label>
                            <a href="#" class="text-xs text-blue-500 hover:text-blue-400">Oublié ?</a>
                        </div>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mt-1">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition transform hover:scale-105">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>