<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="video/video projet X.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-[#1a1a2e] opacity-50"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#1a1a2e] via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-6">
        <span class="inline-block py-1 px-3 rounded-full bg-blue-500/20 border border-blue-500/50 text-blue-300 text-xs font-semibold mb-6 uppercase tracking-wider">
            Votre plateforme de mise en relation IA
        </span>
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
            Connectez votre projet avec les investisseurs qui croient en vous
        </h1>

        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="register?role=porteur" class="bg-white text-[#1a1a2e] hover:bg-gray-100 py-3 px-8 rounded-lg font-bold transition transform hover:scale-105 flex items-center justify-center gap-2">
                Je suis un porteur de projet
            </a>
            <a href="register?role=investisseur" class="bg-transparent border-2 border-white text-white rounded-lg transition transform hover:bg-white/10 py-3 px-8 hover:scale-105 font-bold flex items-center justify-center">
                Je suis un investisseur
            </a>
        </div>
    </div>
</section>

<section class="relative px-4 pb-20 -mt-48 z-10">
    <div class="bg-[#252540] mx-auto p-6 shadow-2xl w-full md:w-3/4 lg:w-1/2 rounded-xl border-2 border-double border-[#ffffff1a] max-w-6xl">
        <h2 class="text-xl text-white text-center font-semibold mb-4">
            Trouvez une opportunité par secteur
        </h2>
        
        <form action="home" method="GET" class="flex flex-col md:flex-row gap-4">
            
            <div class="flex-1">
                <label for="domaine" class="block text-xs text-gray-400 mb-2 ml-1">Domaine IA</label>
                <select name="domaine" id="domaine" class="w-full bg-[#1a1a2e] text-white rounded-lg border border-[#ffffff1a] px-4 py-2.5 focus:outline-none focus:border-blue-500 transition">
                    <option value="">Tous les domaines</option>
                    <?php if(isset($domaines_list)): ?>
                        <?php foreach($domaines_list as $d): ?>
                            <option value="<?= $d['id'] ?>" <?= (isset($_GET['domaine']) && $_GET['domaine'] == $d['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($d['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            
            <div class="flex-1">
                <label for="stade" class="block text-xs text-gray-400 mb-2 ml-1">Stade du projet</label>
                <select name="stade" id="stade" class="w-full bg-[#1a1a2e] text-white rounded-lg border border-[#ffffff1a] px-4 py-2.5 focus:outline-none focus:border-blue-500 transition">
                    <option value="">Tout stade</option>
                    <option value="idée">Idée</option>
                    <option value="prototype">Prototype</option>
                    <option value="early stage">Early Stage</option>
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="rounded bg-blue-600 px-6 py-2.5 hover:scale-105 hover:bg-blue-700 transition-all duration-300 text-white font-semibold shadow-lg whitespace-nowrap">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-[#5D8A66] text-3xl text-center mb-8 font-bold">Comment ça marche</h2>
        
        <div class="rounded-lg p-6 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <h3 class="font-bold text-2xl mb-4 text-white text-center">Pour les Porteurs</h3>
                    
                    <div class="border-l-4 border-blue-500 pl-4 rounded-lg bg-white py-3 shadow-sm">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Étape <span class="bg-blue-500 text-white px-2 rounded text-sm">1</span> : Créez votre profil</h4>
                        <p class="text-gray-600 text-sm">→ Décrivez votre projet et uploadez votre pitch deck</p>
                    </div>
                    
                    <div class="border-l-4 border-blue-500 pl-4 rounded-lg bg-white py-3 shadow-sm">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Étape <span class="bg-blue-500 text-white px-2 rounded text-sm">2</span> : Contactez les investisseurs</h4>
                        <p class="text-gray-600 text-sm">→ Ciblez les investisseurs intéressés par votre domaine</p>
                    </div>

                    <div class="flex justify-center mt-4">
                        <a href="register?role=porteur" class="bg-blue-500 text-white hover:bg-blue-600 py-2 px-6 rounded-lg font-bold transition transform hover:scale-105">
                            Créer mon profil
                        </a>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="font-bold text-2xl mb-4 text-white text-center">Pour les Investisseurs</h3>
                    
                    <div class="border-l-4 border-green-500 pl-4 rounded-lg bg-white py-3 shadow-sm">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Étape <span class="bg-green-500 text-white px-2 rounded text-sm">1</span> : Définissez vos critères</h4>
                        <p class="text-gray-600 text-sm">→ Précisez vos domaines IA et ticket d'entrée</p>
                    </div>
                    
                    <div class="border-l-4 border-green-500 pl-4 rounded-lg bg-white py-3 shadow-sm">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Étape <span class="bg-green-500 text-white px-2 rounded text-sm">2</span> : Explorez le catalogue</h4>
                        <p class="text-gray-600 text-sm">→ Accédez aux projets vérifiés et innovants</p>
                    </div>

                    <div class="flex justify-center mt-4">
                        <a href="register?role=investisseur" class="bg-green-500 text-white hover:bg-green-600 py-2 px-6 rounded-lg font-bold transition transform hover:scale-105">
                            Devenir Investisseur
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>