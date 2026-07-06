<?php
$lang = $_GET['lang'] ?? 'fr';
$translations = [
    'fr' => ['Trouvez votre logement idéal'=>'Trouvez votre logement idéal','Les meilleures activités et hébergements'=>'Les meilleures activités et hébergements','Explorer les logement'=>'Explorer les logements','Se connecter'=>'Se connecter','Notre communauté en chiffres'=>'Notre communauté en chiffres','Visiteurs par mois'=>'Visiteurs par mois','Logements'=>'Logements','Note moyenne'=>'Note moyenne','Pourquoi choisir StayEase'=>'Pourquoi choisir StayEase','Une expérience unique'=>'Une expérience unique','Expérience personnalisée'=>'Expérience personnalisée','Des recommandations adaptées'=>'Des recommandations adaptées','Logements variés'=>'Logements variés','Hôtel, maisons, fermes'=>'Hôtel, maisons, fermes','Service rapide'=>'Service rapide','Réservation en quelques clics'=>'Réservation en quelques clics','Données sécurisées'=>'Données sécurisées','Vos informations sont protégées'=>'Vos informations sont protégées','Expérience depuis 6 ans'=>'Expérience depuis 6 ans','Une expertise reconnue'=>'Une expertise reconnue','Destinations populaires'=>'Destinations populaires','Les lieux les plus visités'=>'Les lieux les plus visités','Prêt à explorer la Tunisie?'=>'Prêt à explorer la Tunisie?','Réservez votre prochain séjour'=>'Réservez votre prochain séjour','Découvrir les logement'=>'Découvrir les logements','Accueil'=>'Accueil','Hébergements'=>'Hébergements','Avis'=>'Avis','Espace propriétaire'=>'Espace propriétaire','Se connecter_title'=>'Se connecter'],
    'en' => ['Trouvez votre logement idéal'=>'Find your ideal accommodation','Les meilleures activités et hébergements'=>'The best activities and accommodations','Explorer les logement'=>'Explore accommodations','Se connecter'=>'Sign in','Notre communauté en chiffres'=>'Our community in numbers','Visiteurs par mois'=>'Visitors per month','Logements'=>'Lodgings','Note moyenne'=>'Average rating','Pourquoi choisir StayEase'=>'Why choose StayEase','Une expérience unique'=>'A unique experience','Expérience personnalisée'=>'Personalized experience','Des recommandations adaptées'=>'Tailored recommendations','Logements variés'=>'Varied lodgings','Hôtel, maisons, fermes'=>'Hotels, houses, farms','Service rapide'=>'Quick service','Réservation en quelques clics'=>'Booking in a few clicks','Données sécurisées'=>'Secure data','Vos informations sont protégées'=>'Your information is protected','Expérience depuis 6 ans'=>'Experience for 6 years','Une expertise reconnue'=>'Recognized expertise','Destinations populaires'=>'Popular destinations','Les lieux les plus visités'=>'Most visited places','Prêt à explorer la Tunisie?'=>'Ready to explore Tunisia?','Réservez votre prochain séjour'=>'Book your next stay','Découvrir les logement'=>'Discover lodgings','Accueil'=>'Home','Hébergements'=>'Accommodations','Avis'=>'Reviews','Espace propriétaire'=>'Owner space','Se connecter_title'=>'Sign in'],
    'ar' => ['Trouvez votre logement idéal'=>'ابحث عن الإقامة المثالية','Les meilleures activités et hébergements'=>'أفضل الأنشطة والإقامات','Explorer les logement'=>'استكشف الإقامات','Se connecter'=>'تسجيل الدخول','Notre communauté en chiffres'=>'مجتمعنا بالأرقام','Visiteurs par mois'=>'زوار شهرياً','Logements'=>'الإقامات','Note moyenne'=>'التقييم المتوسط','Pourquoi choisir StayEase'=>'لماذا تختار StayEase','Une expérience unique'=>'تجربة فريدة','Expérience personnalisée'=>'تجربة شخصية','Des recommandations adaptées'=>'توصيات مخصصة','Logements variés'=>'إقامات متنوعة','Hôtel, maisons, fermes'=>'فنادق، بيوت، مزارع','Service rapide'=>'خدمة سريعة','Réservation en quelques clics'=>'الحجز بضع نقرات','Données sécurisées'=>'بيانات آمنة','Vos informations sont protégées'=>'معلوماتك محمية','Expérience depuis 6 ans'=>'خبرة منذ 6 سنوات','Une expertise reconnue'=>'خبرة معترف بها','Destinations populaires'=>'الوجهات الشائعة','Les lieux les plus visités'=>'الأماكن الأكثر زيارة','Prêt à explorer la Tunisie?'=>'مستعد لاستكشاف تونس؟','Réservez votre prochain séjour'=>'احجز إقامتك القادمة','Découvrir les logement'=>'اكتشف الإقامات','Accueil'=>'الرئيسية','Hébergements'=>'الإقامات','Avis'=>'التقييمات','Espace propriétaire'=>'مساحة المالك','Se connecter_title'=>'تسجيل الدخول']
];
function t($key) { global $lang, $translations; return $translations[$lang][$key] ?? $key; }
require_once 'db.php';
$stats = ['visitors'=>'4 000 000+','lodgings'=>'12 500+','rating'=>'4.8/5'];
if(isset($pdo)){ $r=$pdo->query("SELECT COUNT(*) as c FROM logement")->fetch(); if($r)$stats['lodgings']=number_format($r['c'],0,',',' ').'+'; }
?><!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<body>
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-hotel-dark px-6 py-3 flex items-center justify-between text-white">
        <a href="index.php" class="text-2xl font-bold" style="font-family:'Playfair Display',serif">StayEase</a>
        <div class="flex items-center gap-6">
            <a href="index.php" class="text-white/80 hover:text-white"><?php echo t('Accueil'); ?></a>
            <a href="hotels.php" class="text-white/80 hover:text-white"><?php echo t('Hébergements'); ?></a>
            <a href="avis.php" class="text-white/80 hover:text-white"><?php echo t('Avis'); ?></a>
            <a href="proprietaire.php" class="text-white/80 hover:text-white"><?php echo t('Espace propriétaire'); ?></a>
            <a href="connexion.php" class="bg-white text-hotel-dark px-4 py-2 rounded-lg hover:bg-gray-100"><?php echo t('Se connecter_title'); ?></a>
        </div>
        <div class="flex gap-2">
            <a href="?lang=fr" class="px-2 py-1 rounded text-white hover:text-primary <?php echo $lang=='fr'?'bg-hotel-gold':''; ?>">FR</a>
            <a href="?lang=en" class="px-2 py-1 rounded text-white hover:text-primary <?php echo $lang=='en'?'bg-hotel-gold':''; ?>">EN</a>
            <a href="?lang=ar" class="px-2 py-1 rounded text-white hover:text-primary <?php echo $lang=='ar'?'bg-hotel-gold':''; ?>">AR</a>
        </div>
    </nav>

    <!-- Hero -->
    <section class="relative h-[70vh] min-h-[500px] flex items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1920&h=1080&fit=crop" id="heroImg" class="absolute inset-0 w-full h-full object-cover animate-ken-burns" alt="Hotel">
        <div class="absolute inset-0 bg-hotel-dark/60"></div>
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20">
            <button onclick="changeHero(0)" class="hero-dot w-2 h-2 rounded-full bg-hotel-gold/50 transition-all"></button>
            <button onclick="changeHero(1)" class="hero-dot w-2 h-2 rounded-full bg-hotel-gold/50 transition-all"></button>
            <button onclick="changeHero(2)" class="hero-dot w-2 h-2 rounded-full bg-hotel-gold/50 transition-all"></button>
        </div>
        <div class="relative z-10 text-center px-4 max-w-3xl animate-fade-in text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-4" style="font-family:'Playfair Display',serif"><?php echo t('Trouvez votre logement idéal'); ?></h1>
            <p class="text-xl text-white/80 mb-8"><?php echo t('Les meilleures activités et hébergements'); ?></p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="hotels.php" class="bg-primary px-8 py-4 rounded-lg text-lg font-bold hover:opacity-90"><?php echo t('Explorer les logement'); ?></a>
                <a href="connexion.php" class="border-2 border-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-hotel-dark"><?php echo t('Se connecter'); ?></a>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-16 bg-card">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Notre communauté en chiffres'); ?></h2>
                <p class="text-gray-500"><?php echo t('Visiteurs par mois'); ?></p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
                <div class="bg-card rounded-lg p-6 text-center shadow-sm border border-gray-200">
                    <div class="text-4xl font-bold text-primary mb-2"><?php echo $stats['visitors']; ?></div>
                    <div class="text-gray-500"><?php echo t('Visiteurs par mois'); ?></div>
                </div>
                <div class="bg-card rounded-lg p-6 text-center shadow-sm border border-gray-200">
                    <div class="text-4xl font-bold text-primary mb-2"><?php echo $stats['lodgings']; ?></div>
                    <div class="text-gray-500"><?php echo t('Logements'); ?></div>
                </div>
                <div class="bg-card rounded-lg p-6 text-center shadow-sm border border-gray-200">
                    <div class="text-4xl font-bold text-primary mb-2"><?php echo $stats['rating']; ?></div>
                    <div class="text-gray-500"><?php echo t('Note moyenne'); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Pourquoi choisir StayEase'); ?></h2>
                <p class="text-gray-500"><?php echo t('Une expérience unique'); ?></p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="bg-card rounded-xl p-6 shadow-md border border-gray-200 text-center">
                    <div class="text-3xl mb-3">🏅</div>
                    <h3 class="font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Expérience personnalisée'); ?></h3>
                    <p class="text-gray-500 text-sm"><?php echo t('Des recommandations adaptées'); ?></p>
                </div>
                <div class="bg-card rounded-xl p-6 shadow-md border border-gray-200 text-center">
                    <div class="text-3xl mb-3">🏠</div>
                    <h3 class="font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Logements variés'); ?></h3>
                    <p class="text-gray-500 text-sm"><?php echo t('Hôtel, maisons, fermes'); ?></p>
                </div>
                <div class="bg-card rounded-xl p-6 shadow-md border border-gray-200 text-center">
                    <div class="text-3xl mb-3">⚡</div>
                    <h3 class="font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Service rapide'); ?></h3>
                    <p class="text-gray-500 text-sm"><?php echo t('Réservation en quelques clics'); ?></p>
                </div>
                <div class="bg-card rounded-xl p-6 shadow-md border border-gray-200 text-center">
                    <div class="text-3xl mb-3">🔒</div>
                    <h3 class="font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Données sécurisées'); ?></h3>
                    <p class="text-gray-500 text-sm"><?php echo t('Vos informations sont protégées'); ?></p>
                </div>
                <div class="bg-card rounded-xl p-6 shadow-md border border-gray-200 text-center">
                    <div class="text-3xl mb-3">👥</div>
                    <h3 class="font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Expérience depuis 6 ans'); ?></h3>
                    <p class="text-gray-500 text-sm"><?php echo t('Une expertise reconnue'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations -->
    <section class="py-16 bg-card">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold mb-2" style="font-family:'Playfair Display',serif"><?php echo t('Destinations populaires'); ?></h2>
                <p class="text-gray-500"><?php echo t('Les lieux les plus visités'); ?></p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php $dests = [['n'=>'Hammamet','r'=>'Nabeul','i'=>'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=300&fit=crop'],['n'=>'Sidi Bou Saïd','r'=>'Tunis','i'=>'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&h=300&fit=crop'],['n'=>'Djerba','r'=>'Médenine','i'=>'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=400&h=300&fit=crop'],['n'=>'Sousse','r'=>'Sousse','i'=>'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=400&h=300&fit=crop']]; 
                foreach($dests as $d): ?>
                <div class="group relative overflow-hidden rounded-xl cursor-pointer">
                    <img src="<?php echo $d['i']; ?>" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="<?php echo $d['n']; ?>">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 text-white">
                        <div class="font-bold"><?php echo $d['n']; ?></div>
                        <div class="text-xs text-white/70"><?php echo $d['r']; ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-primary text-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-4" style="font-family:'Playfair Display',serif"><?php echo t('Prêt à explorer la Tunisie?'); ?></h2>
            <p class="text-lg mb-8 text-white/90"><?php echo t('Réservez votre prochain séjour'); ?></p>
            <a href="hotels.php" class="inline-block px-8 py-4 bg-white text-black font-bold rounded-lg text-lg hover:bg-gray-100 shadow-lg"><?php echo t('Découvrir les logement'); ?></a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-hotel-dark text-gray-300 py-8 text-center">
        <p>&copy; 2026 StayEase - StayEase.tn</p>
    </footer>

    <script>
    const heroImages = [
        'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1920&h=1080&fit=crop',
        'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=1920&h=1080&fit=crop',
        'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1920&h=1080&fit=crop'
    ];
    let currentHero = 0;
    function changeHero(index) {
        currentHero = index;
        document.getElementById('heroImg').src = heroImages[index];
        document.querySelectorAll('.hero-dot').forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }
    setInterval(() => { 
        currentHero = (currentHero + 1) % heroImages.length; 
        changeHero(currentHero); 
    }, 5000);
    </script>
</body>
</html>