<?php
// ============================================================================
// ЛАБОРАТОРНАЯ РАБОТА 14
// Тема: Метод GET, Модификаторы доступа, Типы данных
// Проект: Веб-студия ESLL
// Выполнил: Топчий
// ============================================================================

// --------------------------------------------------------------------------
// Базовый класс страницы
// --------------------------------------------------------------------------
class Page {
    private string $name;
    protected string $template;
    public string $imageUrl;

    public function __construct(string $name, string $template, string $imageUrl = '') {
        $this->name = $name;
        $this->template = $template;
        $this->imageUrl = $imageUrl;
    }

    public function render(): void {
        echo $this->template;
    }

    public function getName(): string {
        return $this->name;
    }
}

// --------------------------------------------------------------------------
// Страница "Главная"
// --------------------------------------------------------------------------
class HomePage extends Page {
    public function __construct() {
        // Ваше изображение из интернета
        $img = 'https://i.ibb.co/nMM0tTn8/image.png';
        parent::__construct(
            'home',
            "<div class='card'>
                <img src='{$img}' alt='ESLL Studio' class='hero-img'>
                <h2 style='color: #2c3e50;'>👋 Добро пожаловать в веб-студию ESLL!</h2>
                <p>Мы создаем современные и быстрые сайты для вашего бизнеса.</p>
                <ul>
                    <li>✅ Индивидуальный дизайн</li>
                    <li>✅ Адаптивная верстка</li>
                    <li>✅ Поддержка 24/7</li>
                </ul>
            </div>",
            $img
        );
    }
}

// --------------------------------------------------------------------------
// Страница "Услуги"
// --------------------------------------------------------------------------
class ServicesPage extends Page {
    public function __construct() {
        // Используем то же изображение или можно другое
        $img = 'https://i.ibb.co/nMM0tTn8/image.png';
        parent::__construct(
            'services',
            "<div class='card'>
                <img src='{$img}' alt='Web Services' class='hero-img'>
                <h2 style='color: #2980b9;'>🛠 Наши Услуги</h2>
                <div style='display: flex; gap: 10px; flex-wrap: wrap;'>
                    <div class='service-item'>🌐 Разработка сайтов</div>
                    <div class='service-item'>🔍 SEO-продвижение</div>
                    <div class='service-item'>🎨 UI/UX Дизайн</div>
                </div>
            </div>",
            $img
        );
    }
}

// --------------------------------------------------------------------------
// Страница "Портфолио"
// --------------------------------------------------------------------------
class PortfolioPage extends Page {
    public function __construct() {
        // Используем то же изображение
        $img = 'https://i.ibb.co/nMM0tTn8/image.png';
        parent::__construct(
            'portfolio',
            "<div class='card'>
                <img src='{$img}' alt='Our Projects' class='hero-img'>
                <h2 style='color: #27ae60;'>📂 Наши работы</h2>
                <p>Последние проекты студии ESLL:</p>
                <ul>
                    <li>Интернет-магазин 'ТехноМир'</li>
                    <li>Корпоративный сайт 'СтройИнвест'</li>
                    <li>Лендинг для курса по PHP</li>
                </ul>
            </div>",
            $img
        );
    }
}

// --------------------------------------------------------------------------
// Роутинг через $_GET
// --------------------------------------------------------------------------
$pageAction = isset($_GET['page']) ? (string)$_GET['page'] : 'home';

$pageObj = match($pageAction) {
    'services' => new ServicesPage(),
    'portfolio' => new PortfolioPage(),
    default => new HomePage(),
};
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Веб-студия ESLL - <?= $pageObj->getName() ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'SF Pro Display', 'Helvetica Neue', sans-serif;
            background: #000;
            min-height: 100vh;
            width: 100vw;
            overflow-x: hidden;
            position: relative;
        }
        .bg-layer { position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 0; pointer-events: none; }
        .gradient-bg { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: #000; }
        .gradient-blob { position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.7; animation: blobFloat 8s ease-in-out infinite; }
        .blob-1 { width: 600px; height: 600px; background: radial-gradient(circle, #8B2252 0%, #6B1D3E 50%, transparent 70%); top: 5%; left: -10%; animation-delay: 0s; }
        .blob-2 { width: 500px; height: 700px; background: radial-gradient(circle, #C4523A 0%, #8B3A2A 50%, transparent 70%); top: 20%; right: -15%; animation-delay: -2s; animation-duration: 10s; }
        .blob-3 { width: 560px; height: 560px; background: radial-gradient(circle, #7B2D4E 0%, #4A1A2E 50%, transparent 70%); top: 45%; left: 10%; animation-delay: -4s; animation-duration: 12s; }
        .blob-4 { width: 400px; height: 400px; background: radial-gradient(circle, #5B3D5E 0%, #2E1A35 50%, transparent 70%); bottom: 10%; right: 5%; animation-delay: -1s; animation-duration: 9s; }
        .blob-5 { width: 360px; height: 360px; background: radial-gradient(circle, #6B4226 0%, #3E2415 50%, transparent 70%); top: 70%; left: -5%; animation-delay: -3s; animation-duration: 11s; }
        .blob-6 { width: 440px; height: 440px; background: radial-gradient(circle, #9B3D5E 0%, #5E1A35 50%, transparent 70%); top: 10%; right: 20%; animation-delay: -5s; animation-duration: 7s; }
        @keyframes blobFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(20px, -15px) scale(1.05); }
            50% { transform: translate(-10px, 20px) scale(0.95); }
            75% { transform: translate(15px, 10px) scale(1.02); }
        }
        .noise-overlay { position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.03; background-image: url("image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E"); background-repeat: repeat; background-size: 256px 256px; pointer-events: none; }
        .main-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
            padding: 48px 16px 32px 16px;
        }
        header { background: rgba(44,62,80,0.95); color: white; padding: 20px; text-align: center; border-radius: 18px; margin-bottom: 20px; box-shadow: 0 4px 24px rgba(0,0,0,0.18); }
        nav { display: flex; justify-content: center; gap: 15px; margin-bottom: 30px; flex-wrap: wrap; z-index: 2; position: relative; }
        nav a { text-decoration: none; background: #34495e; color: white; padding: 10px 20px; border-radius: 8px; transition: 0.3s; font-weight: 600; font-size: 1.08em; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        nav a:hover, nav a.active { background: #e74c3c; }
        .card { background: rgba(255,255,255,0.07); padding: 24px; border-radius: 18px; box-shadow: 0 2px 18px rgba(0,0,0,0.18); max-width: 700px; margin: 0 auto 24px auto; color: #fff; position: relative; z-index: 2; }
        .hero-img { width: 100%; height: 250px; object-fit: cover; border-radius: 12px; margin-bottom: 15px; box-shadow: 0 4px 16px rgba(0,0,0,0.18); }
        .service-item { background: rgba(255,255,255,0.13); padding: 10px; border-radius: 8px; flex: 1; text-align: center; min-width: 140px; color: #fff; font-weight: 500; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        h2, h3, h4, h5, h6 { color: #fff; text-shadow: 0 2px 20px rgba(255,255,255,0.08); }
        ul, ol { color: #eee; margin-bottom: 18px; }
        li { margin-bottom: 4px; }
        p, li, strong { color: #f3f3f3; font-size: 1.08em; }
        .main-content ul { background: rgba(255,255,255,0.04); border-radius: 12px; padding: 12px 20px; }
        .main-content p { margin-bottom: 10px; }
        .main-content h1 { font-size: 2.5em; font-weight: 800; margin-bottom: 10px; }
        .main-content h2 { font-size: 1.5em; font-weight: 700; margin-top: 28px; margin-bottom: 10px; }
        .main-content h3 { font-size: 1.2em; font-weight: 600; margin-top: 18px; margin-bottom: 8px; }
        body::-webkit-scrollbar { width: 10px; background: #181818; }
        body::-webkit-scrollbar-thumb { background: #333; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="bg-layer">
        <div class="gradient-bg"></div>
        <div class="gradient-blob blob-1"></div>
        <div class="gradient-blob blob-2"></div>
        <div class="gradient-blob blob-3"></div>
        <div class="gradient-blob blob-4"></div>
        <div class="gradient-blob blob-5"></div>
        <div class="gradient-blob blob-6"></div>
        <div class="noise-overlay"></div>
    </div>
    <div class="main-content">
        <header><h1>🚀 Веб-студия ESLL</h1></header>
        <nav>
            <a href="lab14.php?page=home" class="<?= $pageAction === 'home' ? 'active' : '' ?>">🏠 Главная</a>
            <a href="lab14.php?page=services" class="<?= $pageAction === 'services' ? 'active' : '' ?>">🛠 Услуги</a>
            <a href="lab14.php?page=portfolio" class="<?= $pageAction === 'portfolio' ? 'active' : '' ?>">📂 Портфолио</a>
        </nav>
        <?php $pageObj->render(); ?>
    </div>
</body>
</html>