<?php
declare(strict_types=1);
session_start();

// Cargar configuración
$config = require __DIR__ . '/config.php';
$db = $config['db'];

// Parámetros de validación y seguridad
$maxNameLen = 50;
$maxMsgLen  = 500;
$minIntervalSeconds = 10;

// CSRF token
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
}
$csrf = $_SESSION['csrf'];

// Conexión a la base de datos
try {
    $pdo = new PDO(
        "mysql:host={$db['host']};dbname={$db['name']};charset={$db['charset']}",
        $db['user'],
        $db['pass'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (Throwable $e) {
    http_response_code(500);
    echo "<h1>Error al conectar con la base de datos</h1><pre>" .
         htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</pre>";
    exit;
}

// --- Enrutamiento básico ---
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$route = trim(str_replace($base, '', $path), '/');

// Helper para escapar texto
function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

// --- API JSON ---
if ($route === 'api/lista') {
    header('Content-Type: application/json; charset=utf-8');
    // ...resto del código...
}
// ...resto del código...
