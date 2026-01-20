<div class="container mx-auto px-6 py-8">
    
    <div class="bg-[#252540] rounded-xl p-8 border border-[#ffffff1a] shadow-lg mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2">
                Bonjour, <span class="<?= $_SESSION['role'] == 'investisseur' ? 'text-green-400' : 'text-blue-400' ?>">
                    <?= htmlspecialchars($_SESSION['nom'] ?? 'Membre') ?>
                </span> 👋
            </h1>
            <p class="text-gray-400">
                Vous êtes connecté en tant que 
                <span class="uppercase font-bold tracking-wider text-xs bg-white/10 px-2 py-1 rounded ml-1">
                    <?= htmlspecialchars($_SESSION['role']) ?>
                </span>
            </p>
        </div>
        
        <?php if($_SESSION['role'] === 'porteur'): ?>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-bold transition shadow-lg shadow-blue-500/30">
                📤 Ajouter mon Pitch Deck
            </button>
        <?php else: ?>
             <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-bold transition shadow-lg shadow-green-500/30">
                🔍 Chercher des projets
            </button>
        <?php endif; ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="col-span-1 space-y-6">
            <div class="bg-[#252540] rounded-xl p-6 border border-[#ffffff1a]">
                <h3 class="text-xl font-bold text-white mb-4">Mon Profil</h3>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-center gap-3 p-2 bg-white/5 rounded cursor-pointer hover:bg-white/10 transition">
                        <span>👤</span> Modifier mes informations
                    </li>
                    <li class="flex items-center gap-3 p-2 bg-white/5 rounded cursor-pointer hover:bg-white/10 transition">
                        <span>🔒</span> Changer mot de passe
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-span-1 md:col-span-2">
            
            <?php if($_SESSION['role'] === 'porteur'): ?>
                <div class="bg-[#252540] rounded-xl p-8 border border-[#ffffff1a]">
                    <h2 class="text-2xl font-bold text-white mb-4">Mon Projet</h2>
                    
                    <div class="bg-yellow-500/10 border border-yellow-500/50 p-4 rounded-lg mb-6 flex items-start gap-4">
                        <div class="text-2xl">⚠️</div>
                        <div>
                            <h4 class="text-yellow-500 font-bold">Pitch Deck manquant</h4>
                            <p class="text-sm text-yellow-200/70">
                                Pour être visible par les investisseurs, vous devez uploader votre présentation (PDF).
                            </p>
                        </div>
                    </div>

                    <div class="border-2 border-dashed border-gray-600 rounded-xl h-48 flex flex-col items-center justify-center text-gray-500 hover:border-blue-500 hover:text-blue-400 transition cursor-pointer bg-[#1a1a2e]">
                        <span class="text-4xl mb-2">📄</span>
                        <span class="font-medium">Cliquez pour uploader votre PDF</span>
                        <span class="text-xs text-gray-600 mt-1">(Max 10 Mo)</span>
                    </div>
                </div>

            <?php else: ?>
                <div class="bg-[#252540] rounded-xl p-8 border border-[#ffffff1a]">
                    <h2 class="text-2xl font-bold text-white mb-4">Statistiques</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-[#1a1a2e] p-6 rounded-lg text-center border border-gray-700">
                            <span class="block text-3xl font-bold text-white">0</span>
                            <span class="text-gray-500 text-sm">Projets consultés</span>
                        </div>
                        <div class="bg-[#1a1a2e] p-6 rounded-lg text-center border border-gray-700">
                            <span class="block text-3xl font-bold text-white">0</span>
                            <span class="text-gray-500 text-sm">Mises en relation</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>