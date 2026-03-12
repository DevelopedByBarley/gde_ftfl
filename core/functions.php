<?php

use Core\Cookie;
use Core\Response;
use Core\Router;
use Core\Session;
use Core\Template;

function session($entity)
{
  return Session::get($entity);
}

function getRoutes()
{
  return dd((new Router())->getRoutes());
}

function auth($entity, $default = null)
{
  return Session::get($entity, $default);
}

function errors($key, $errors)
{
  if (isset($errors) && !empty($errors)) {
    if (isset($errors[$key]['errors'])) {
      foreach ($errors[$key]['errors'] as $error) {
        echo "<div class='alert alert-danger'>{$error}</div>";
      }
    }
  }
}

function image($path, $fileName) {
    $fullPath = base_path('public' . $path . '/' . $fileName);

    if(file_exists($fullPath) && !empty($fileName)) {
        return "/public" . $path . '/' . $fileName;
    }

}

// Source - https://stackoverflow.com/a
// Posted by Maerlyn, modified by community. See post 'Timeline' for change history
// Retrieved 2026-01-07, License - CC BY-SA 4.0

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}


function dd(...$vars)
{
  // Ha nincs átadott változó, akkor üres dd()-t hívtak meg
  if (empty($vars)) {
    echo '<pre style="background: #18171B; color: #FF6C37; padding: 20px; border-radius: 5px; font-family: \'Fira Code\', monospace; font-size: 14px; line-height: 1.6; border-left: 4px solid #FF6C37;">';
    echo '<strong>dd() called with no arguments</strong>';
    echo '</pre>';
    die(1);
  }

  // Színséma
  $style = "
    <style>
      .dd-container {
        background: #18171B;
        color: #E1E1E6;
        padding: 20px;
        margin: 10px 0;
        border-radius: 8px;
        font-family: 'Fira Code', 'Monaco', 'Consolas', monospace;
        font-size: 14px;
        line-height: 1.6;
        border-left: 4px solid #FF6C37;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      }
      .dd-header {
        color: #FF6C37;
        font-weight: bold;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #2D2C31;
        font-size: 16px;
      }
      .dd-type {
        color: #78DCE8;
        font-weight: bold;
      }
      .dd-string {
        color: #AAD94C;
      }
      .dd-number {
        color: #FFD866;
      }
      .dd-bool {
        color: #FF6188;
      }
      .dd-null {
        color: #AB9DF2;
      }
      .dd-key {
        color: #78DCE8;
      }
      .dd-trace {
        background: #2D2C31;
        padding: 10px;
        margin-top: 15px;
        border-radius: 5px;
        font-size: 12px;
        color: #939293;
      }
      .dd-trace-file {
        color: #A9DC76;
      }
      .dd-trace-line {
        color: #FFD866;
      }
    </style>
  ";

  echo $style;

  foreach ($vars as $index => $var) {
    $varNumber = count($vars) > 1 ? " #" . ($index + 1) : "";

    echo "<div class='dd-container'>";
    echo "<div class='dd-header'>🔍 Debug Output{$varNumber}</div>";

    // Típus meghatározás
    $type = gettype($var);
    echo "<div><span class='dd-type'>" . ucfirst($type) . "</span>";

    // Extra információk típusonként
    if (is_array($var)) {
      echo " <span class='dd-number'>(" . count($var) . " items)</span>";
    } elseif (is_string($var)) {
      echo " <span class='dd-number'>(" . strlen($var) . " chars)</span>";
    } elseif (is_object($var)) {
      echo " <span class='dd-number'>(" . get_class($var) . ")</span>";
    }
    echo "</div>";

    echo "<pre style='margin: 15px 0 0 0; padding: 0; background: transparent; border: none;'>";

    // Formázott kimenet
    if (is_null($var)) {
      echo "<span class='dd-null'>NULL</span>";
    } elseif (is_bool($var)) {
      echo "<span class='dd-bool'>" . ($var ? 'TRUE' : 'FALSE') . "</span>";
    } elseif (is_string($var)) {
      echo "<span class='dd-string'>\"" . htmlspecialchars($var) . "\"</span>";
    } elseif (is_numeric($var)) {
      echo "<span class='dd-number'>" . $var . "</span>";
    } else {
      // Objektumok és tömbök print_r-rel, színezéssel
      $output = print_r($var, true);
      $output = htmlspecialchars($output);

      // Színezés
      $output = preg_replace('/\[(.*?)\]/', '[<span class="dd-key">$1</span>]', $output);
      $output = preg_replace('/=>\s*(\d+)/', '=> <span class="dd-number">$1</span>', $output);
      $output = preg_replace('/=>\s*\'(.*?)\'/', '=> <span class="dd-string">\'$1\'</span>', $output);
      $output = preg_replace('/=>\s*\"(.*?)\"/', '=> <span class="dd-string">"$1"</span>', $output);

      echo $output;
    }

    echo "</pre>";

    // Backtrace - honnan hívták a dd()-t
    $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
    if (isset($trace[0])) {
      $file = $trace[0]['file'] ?? 'unknown';
      $line = $trace[0]['line'] ?? 'unknown';

      // Relatív útvonal
      $file = str_replace(BASE_PATH, '', $file);

      echo "<div class='dd-trace'>";
      echo "📍 Called from: <span class='dd-trace-file'>{$file}</span>:<span class='dd-trace-line'>{$line}</span>";
      echo "</div>";
    }

    echo "</div>";
  }

  // Script leállítása
  die(1);
}

function dbg($label, $data = null)
{
  if ($data !== null) {
    \Core\Log::info($label, print_r($data, true));
    return;
  }

  \Core\Log::info($label);
}

function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

function urlContains($needle)
{
  return strpos($_SERVER['REQUEST_URI'], $needle) !== false;
}

function abort($code = 404)
{
  http_response_code($code);

  require base_path("resources/views/status/{$code}.blade.php");

  die();
}

function base_path($path)
{
  return BASE_PATH . $path;
}


function truncate($text, $chars = 25)
{
  // Null vagy üres szöveg kezelése
  if (empty($text)) {
    return 'Empty text in truncate()';
  }

  // HTML tagek eltávolítása és entitások visszaalakítása
  $text = strip_tags(html_entity_decode($text, ENT_QUOTES | ENT_HTML5));

  // Ha rövidebb mint a limit, visszaadjuk teljes egészében
  if (mb_strlen($text) <= $chars) {
    return $text;
  }

  // Szavakon belül vágunk
  $truncated = mb_substr($text, 0, $chars);
  

  $lastSpace = mb_strrpos($truncated, ' ');
  if ($lastSpace !== false && $lastSpace > $chars * 0.7) { 
    $truncated = mb_substr($truncated, 0, $lastSpace);
  }

  return trim($truncated) . '...';
}

function view($path, $root = '', $params = [], $engine = false): string
{
  // Ha $root üres string, akkor nem adunk hozzá semmit

  if (!empty($root)) {
    $full_root_path = 'components/' . $root;
    $params = array_merge(['root' => $full_root_path], $params);
  }

  static $viewCache = [];

  $cacheKey = $path . md5(json_encode($params)) . ($engine ? '_engine' : '_regular');
  if (isset($viewCache[$cacheKey])) {
    return $viewCache[$cacheKey];
  }

  // Ellenőrizzük, hogy létezik-e a template fájl
  $filePath = base_path('resources/views/' . $path . '.blade.php');
  if (!file_exists($filePath)) {
    throw new \Exception("View file not found: " . $filePath);
  }

  $output = '';

  if ($engine) {
    // Template Engine használata
    if (!class_exists('Template')) {
      require_once base_path('core/Template.php');
    }
    Template::init();
    $output = Template::render($path, $params);
  } else {
    // Hagyományos PHP renderelés
    ob_start();
    extract($params);
    require $filePath;
    $output = ob_get_clean();
  }

  if (!headers_sent()) {
    header("Content-Type: text/html; charset=UTF-8");
  }

  return $viewCache[$cacheKey] = $output;
}

function old($key, $default = '')
{
  return Core\Session::get('old')[$key] ?? $default;
}

function view_path($path)
{
  return BASE_PATH . 'resources/views/' . $path . '.blade.php';
}

function tmpPath($file)
{
  return BASE_PATH . 'resources/views/messages/' . $file . '.tmp.php';
}

function mail_temp_path($path)
{
  return BASE_PATH . 'resources/views/mail/' . $path . '.mt.php';
}


function paginate($paginated, $with_search = false)
{
  require view_path('components/pagination');
}
function extractMapUrl($iframe)
{
  if (!$iframe) {
    return null;
  }

  if (preg_match('/src="([^"]+)"/', $iframe, $matches)) {
    return $matches[1];
  }

  if (str_contains($iframe, 'https://www.google.com/maps/embed?pb=')) {
    return $iframe;
  }

  return null;
}

/**
 * Általános szűrő és szanitizáló függvény.
 *
 * @param mixed $value A bemenet, amit tisztítani szeretnél.
 * @param string $type A bemenet típusa: 'string', 'int', 'email', 'url', stb.
 * @return mixed A szűrt és tisztított érték, vagy false, ha a validáció nem sikerült.
 */
/**
 * Általános szűrő és szanitizáló függvény.
 *
 * @param mixed $value A bemenet, amit tisztítani szeretnél.
 * @return mixed A szűrt és tisztított érték, vagy az eredeti érték, ha nem támogatott típus.
 */
function sanitize($value)
{
  $type = gettype($value);

  switch ($type) {
    case 'string':
      return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
    case 'integer':
      return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    case 'double':
      return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    case 'boolean':
      return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    case 'array':
      return array_map('sanitize', $value);
    case 'NULL':
      return null;
    default:
      return $value;
  }
}

function csrf()
{
  (new \Core\CSRF)->generate()->input();
}

function lang($params)
{
  
  $lang = explode('-', Cookie::get('lang'))[0];
  $keys = explode('__', $params);
  
  [$file_name, $keys_of_arr] = $keys;
  

  $arr_key = explode('.', $keys_of_arr);
  $file = require base_path("langs/{$lang}/{$file_name}.lang.php");

  foreach ($arr_key as $key) {
    if (isset($file[$key])) {
      $file = $file[$key]; // Frissítjük a referencia helyét
    } else {
      return "Translation for '{$keys_of_arr}' not found."; // Ha nem találjuk, hibát dobunk
    }
  }
  return $file;
}

function cookie($key)
{
  return Cookie::get($key);
}

function public_file($path)
{
  return "/public/{$path}";
}

function public_gallery_images(string $relativeDir = 'images/base/gallery'): array
{
  static $cache = [];

  $cacheKey = trim($relativeDir, '/');
  if (isset($cache[$cacheKey])) {
    return $cache[$cacheKey];
  }

  $galleryDir = base_path('public/' . $cacheKey);
  if (!is_dir($galleryDir)) {
    return $cache[$cacheKey] = [];
  }

  $files = [];
  foreach (['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif', 'JPG', 'JPEG', 'PNG', 'WEBP', 'GIF', 'AVIF'] as $ext) {
    $matches = glob($galleryDir . '/*.' . $ext);
    if ($matches !== false) {
      $files = array_merge($files, $matches);
    }
  }

  sort($files, SORT_NATURAL | SORT_FLAG_CASE);

  return $cache[$cacheKey] = array_map(
    static fn($path) => $cacheKey . '/' . basename($path),
    $files
  );
}

function arr_to_obj($arr)
{
  return json_decode(json_encode($arr));
}

function obj_to_arr($obj)
{
  return json_decode(json_encode($obj), true);
}
function isUrl(string $expectedUrl): bool
{
  $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Csak az útvonalat vesszük
  return trim($currentUrl, '/') === trim($expectedUrl, '/');
}


function ud()
{
  echo view('status/ud', []);
}

function deleteImage($path)
{
  $full_path = base_path('public' . $path);
  if (file_exists($full_path)) {
    unlink($full_path);
    echo "Fájl törölve: $full_path";
  } else {
    echo "A fájl nem található: $full_path";
  }
}

function getWeekRange($events)
{
  foreach ($events as $event) {
    $timestamp = strtotime($event->date_time);

    $weekStart = date('Y-m-d', strtotime('monday this week', $timestamp));
    $weekEnd = date('Y-m-d', strtotime('sunday this week', $timestamp));

    $event->week = "$weekStart - $weekEnd";
    $event->week_start = $weekStart;
    $event->week_end = $weekEnd;
  }

  return $events;
}


function config($file = null)
{
  if ($file) {
    $config = require base_path('config/' . $file . '.php');
    return $config;
  }
}

function request($key = null, $default = null)
{
  static $requestData = null;

  // Cache-eljük az eredményt, hogy ne kelljen többször feldolgozni
  if ($requestData === null) {
    // Alapértelmezett adatok
    $requestData = array_merge($_GET, $_POST, $_FILES);

    // Content-Type ellenőrzése
    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
    $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

    // JSON input kezelése
    if (strpos($contentType, 'application/json') !== false) {
      $jsonInput = file_get_contents('php://input');
      if ($jsonInput) {
        $jsonData = json_decode($jsonInput, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($jsonData)) {
          $requestData = array_merge($requestData, $jsonData);
        }
      }
    }
    // Form-encoded data kezelése (PUT, PATCH, DELETE esetén)
    elseif (
      in_array($requestMethod, ['PUT', 'PATCH', 'DELETE']) &&
      (strpos($contentType, 'application/x-www-form-urlencoded') !== false ||
        strpos($contentType, 'multipart/form-data') !== false)
    ) {
      $rawInput = file_get_contents('php://input');
      if ($rawInput) {
        parse_str($rawInput, $parsedData);
        if (is_array($parsedData)) {
          $requestData = array_merge($requestData, $parsedData);
        }
      }
    }
    // Raw input kezelése egyéb esetekben
    elseif (empty($_POST) && !empty($_SERVER['CONTENT_LENGTH'])) {
      $rawInput = file_get_contents('php://input');
      if ($rawInput) {
        // Próbáljuk query string-ként parse-olni
        parse_str($rawInput, $parsedData);
        if (is_array($parsedData)) {
          $requestData = array_merge($requestData, $parsedData);
        }
      }
    }
  }

  if ($key === null) {
    return $requestData;
  }

  return $requestData[$key] ?? $default;
}

/**
 * X-CSRF-Token lekérése a request header-ből
 */
function getCsrfTokenFromHeader($default = null)
{
  // Ellenőrizzük a különböző header formátumokat
  $headers = [
    'HTTP_X_CSRF_TOKEN',
    'HTTP_X_XSRF_TOKEN',
    'HTTP_CSRF_TOKEN'
  ];

  foreach ($headers as $header) {
    if (isset($_SERVER[$header]) && !empty($_SERVER[$header])) {
      return $_SERVER[$header];
    }
  }

  return $default;
}

/**
 * CSRF token lekérése minden lehetséges helyről
 */
function getCsrfToken($default = null)
{
  // 1. Először a header-ből próbáljuk
  $token = getCsrfTokenFromHeader();
  if ($token) {
    return $token;
  }

  // 2. POST adatokból (_token mező)
  $token = request('_token');
  if ($token) {
    return $token;
  }

  // 3. Meta tag-ből (ha van csrf meta tag az oldalon)
  $token = request('csrf_token');
  if ($token) {
    return $token;
  }

  return $default;
}

/**
 * Ellenőrzi hogy a request tartalmaz-e CSRF tokent
 */
function hasCsrfToken(): bool
{
  return getCsrfToken() !== null;
}

/**
 * CSRF token validálása
 */
function validateCsrfToken(): bool
{
  $requestToken = getCsrfToken();

  if (!$requestToken) {
    return false;
  }

  // Ellenőrizzük a session-ben tárolt token-nel
  $sessionToken = Session::get('csrf_token');

  return $requestToken === $sessionToken;
}

/**
 * Authorization Bearer token lekérése
 */
function getBearerToken($default = null)
{
  $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

  if (preg_match('/Bearer\s+(.*)$/i', $authHeader, $matches)) {
    return $matches[1];
  }

  return $default;
}

/**
 * Összes request header lekérése
 */
function getRequestHeaders(): array
{
  if (function_exists('getallheaders')) {
    return getallheaders();
  }

  // Fallback ha nincs getallheaders()
  $headers = [];
  foreach ($_SERVER as $name => $value) {
    if (substr($name, 0, 5) == 'HTTP_') {
      $headerName = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($name, 5)))));
      $headers[$headerName] = $value;
    }
  }

  return $headers;
}

/**
 * Specifikus header lekérése
 */
function getHeader($name, $default = null)
{
  $headers = getRequestHeaders();

  // Case-insensitive keresés
  foreach ($headers as $key => $value) {
    if (strtolower($key) === strtolower($name)) {
      return $value;
    }
  }

  return $default;
}


function getBool($value) {
      if(!isset($value)) {
        return 0;
      }

      return 1;
}
