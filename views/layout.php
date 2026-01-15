<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet AI - Plateforme d'Investissement</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>

<body class="bg-[#1a1a2e] text-white flex flex-col min-h-screen">
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="bg-[#34495ee6] border border-[#ffffff1a] backdrop-blur-md rounded-xl m-3 max-w-7xl mx-auto px-6 py-4 shadow-lg">
            <div class="flex justify-between items-center">

                <a href="home" class="flex items-center gap-2 transition">
                     <span class="font-bold text-xl tracking-tight hidden md:block">The Project AI</span>
                </a>

                <nav class="hidden md:block">
                    <ul class="flex gap-6 text-sm">
                        <li><a href="home" class="px-2 inline-block rounded-lg hover:bg-blue-600 hover:scale-110 p-1 transition">Accueil</a></li>
                        <li><a href="projets" class="px-2 inline-block hover:bg-blue-600 hover:scale-110 rounded-lg p-1 transition">Projets</a></li>
                        <li><a href="#" class="inline-block hover:bg-blue-600 hover:scale-110 px-2 rounded-lg p-1 transition">Qui sommes-nous</a></li>
                        <li><a href="#" class="inline-block hover:bg-blue-600 hover:scale-110 rounded-lg px-2 p-1 transition">Comment ça marche</a></li>
                    </ul>
                </nav>

                <div class="flex items-center gap-3">
                    <?php if (isset($_SESSION['user_id'])): ?>
                         <a href="dashboard" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg text-sm font-bold transition">Mon Espace</a>
                    <?php else: ?>
                        <a href="login" class="text-sm font-bold hover:text-blue-400 transition">Connexion</a>
                        <a href="register" class="font-bold bg-blue-600 px-2 rounded-lg text-sm hover:bg-blue-700 hover:scale-110 transition py-1">Inscription</a>
                    <?php endif; ?>
                </div>

                <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <?= $content ?>
    </main>

    <footer class="bg-[#1e2530] border-t border-gray-800 pt-16 pb-8 text-sm text-gray-400 mt-auto">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold text-white uppercase tracking-wider">Projet IA</h3>
                    <p class="text-gray-500 leading-relaxed">Nous connectons les visions audacieuses aux ressources nécessaires pour changer le monde.</p>
                </div>
                <div class="space-y-4">
                    <h4 class="text-lg text-[#5D8A66] font-bold uppercase tracking-wide">Légal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-[#5D8A66]">Mentions légales</a></li>
                        <li><a href="#" class="hover:text-[#5D8A66]">Confidentialité</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-gray-800 my-8">
            <div class="text-center text-gray-500">
                &copy; 2026 Projet AI. Tous droits réservés.
            </div>
        </div>
    </footer>
</body>
</html>