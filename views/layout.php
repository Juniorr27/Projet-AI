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
                        <a href="dashboard" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg text-sm font-bold transition">
                            Mon Espace
                        </a>

                        <a href="logout" class="bg-red-600 hover:bg-red-700 font-bold hover:scale-105 transition text-sm rounded-lg px-3 py-2">
                            Se déconnecter
                        </a>
                    <?php else: ?>
                        <a href="login" class="text-sm font-bold hover:text-blue-400 transition">Connexion</a>
                        <a href="register" class="font-bold bg-blue-600 px-2 rounded-lg text-sm hover:bg-blue-700 hover:scale-110 transition py-1">Inscription</a>
                    <?php endif; ?>
                </div>
                <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
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
                    <p class="text-gray-500 leading-relaxed">
                        Nous connectons les visions audacieuses aux ressources nécessaires pour changer le monde.
                    </p>
                </div>

                <div class="space-y-4">
                    <h4 class="text-lg text-[#5D8A66] font-bold uppercase tracking-wide">Plateforme</h4>
                    <ul class="space-y-2">
                        <li><a href="#projets" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Projets</a></li>
                        <li><a href="#investisseurs" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Investisseurs</a></li>
                        <li><a href="#comment" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Comment ça marche</a></li>
                        <li><a href="#about" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Qui sommes-nous</a></li>
                    </ul>
                </div>

                <div class="space-y-4">
                    <h4 class="text-lg text-[#5D8A66] font-bold uppercase tracking-wide">Ressources</h4>
                    <ul class="space-y-2">
                        <li><a href="#blog" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Blog & Actualités</a></li>
                        <li><a href="#faq" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">FAQ</a></li>
                        <li><a href="#coaching" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Coaching</a></li>
                        <li><a href="#contact" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Contact</a></li>
                    </ul>
                </div>

                <div class="space-y-4">
                    <h4 class="text-lg text-[#5D8A66] font-bold uppercase tracking-wide">Légal</h4>
                    <ul class="space-y-2">
                        <li><a href="#cgu" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">CGU</a></li>
                        <li><a href="#mentions" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Mentions légales</a></li>
                        <li><a href="#confidentialite" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Confidentialité</a></li>
                        <li><a href="#cookies" class="hover:text-[#5D8A66] hover:translate-x-1 transition-all inline-block">Cookies</a></li>
                    </ul>
                </div>

            </div>

            <hr class="border-gray-800 my-8">

            <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                <div class="text-gray-500">
                    &copy; 2025 Projet IA. Tous droits réservés.
                </div>

                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[#0077b5] hover:text-white transition duration-300">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>

                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[#E1306C] hover:text-white transition duration-300">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </footer>
</body>

</html>