<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet AI - Plateforme d'Investissement</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-[#1a1a2e]">
        <div class="absolute top-4 left-4">
        <a href="home" class="text-gray-400 hover:text-white flex items-center gap-2 text-sm">
            ← Retour au site
        </a>
    </div>
    <div class="max-w-md w-full space-y-8 bg-[#252540] p-8 rounded-xl border border-[#ffffff1a] shadow-2xl">

            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-white">
                    Inscription
                    <span class="text-blue-500">
                        <?= (isset($_GET['role']) && $_GET['role'] === 'investisseur') ? 'Investisseur' : 'Porteur de Projet' ?>
                    </span>
                </h2>
                <p class="mt-2 text-sm text-gray-400">
                    Ou <a href="login" class="font-medium text-blue-500 hover:text-blue-400">connectez-vous à votre compte</a>
                </p>
            </div>

            <form class="mt-8 space-y-6" action="register" method="POST">

                <input type="hidden" name="role" value="<?= htmlspecialchars($_GET['role'] ?? 'porteur') ?>">

                <div class="rounded-md shadow-sm space-y-4">

                    <div>
                        <label for="email" class="text-sm font-medium text-gray-300">Adresse Email</label>
                        <input id="email" name="email" type="email" required
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mt-1">
                    </div>

                    <div>
                        <label for="password" class="text-sm font-medium text-gray-300">Mot de passe</label>
                        <input id="password" name="password" type="password" required
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mt-1">
                    </div>

                    <?php if (!isset($_GET['role']) || $_GET['role'] !== 'investisseur'): ?>
                        <div>
                            <label for="nom_complet" class="text-sm font-medium text-gray-300">Votre Nom complet</label>
                            <input id="nom_complet" name="nom_complet" type="text" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mt-1">
                        </div>
                        <div>
                            <label for="titre_projet" class="text-sm font-medium text-gray-300">Nom du Projet</label>
                            <input id="titre_projet" name="titre_projet" type="text" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mt-1">
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['role']) && $_GET['role'] === 'investisseur'): ?>
                        <div>
                            <label for="nom_complet" class="text-sm font-medium text-gray-300">Nom (ou Nom de l'organisme)</label>
                            <input id="nom_complet" name="nom_complet" type="text" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mt-1">
                        </div>
                        <div>
                            <label for="ticket" class="text-sm font-medium text-gray-300">Ticket moyen d'investissement</label>
                            <select id="ticket" name="ticket_moyen" class="block w-full px-3 py-2 border border-gray-600 bg-[#1a1a2e] text-white rounded-lg focus:outline-none focus:border-blue-500 sm:text-sm mt-1">
                                <option value="1k-10k">1k€ - 10k€</option>
                                <option value="10k-50k">10k€ - 50k€</option>
                                <option value="50k-100k">50k€ - 100k€</option>
                                <option value="+100k">+ 100k€</option>
                            </select>
                        </div>
                    <?php endif; ?>

                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition transform hover:scale-105">
                        Créer mon compte
                    </button>
                </div>

                <div class="text-center text-xs text-gray-500 mt-4">
                    <?php if (isset($_GET['role']) && $_GET['role'] === 'investisseur'): ?>
                        <a href="register?role=porteur" class="hover:text-white underline">Je suis plutôt porteur de projet</a>
                    <?php else: ?>
                        <a href="register?role=investisseur" class="hover:text-white underline">Je suis plutôt investisseur</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>