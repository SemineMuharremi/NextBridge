<?php
// Funksione ndihmëse të përbashkëta për të gjitha faqet.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Escape për output në HTML (mbrojtje nga XSS)
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Token CSRF për format
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(): void
{
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals(csrf_token(), $token)) {
        http_response_code(403);
        exit('Kërkesë e pavlefshme.');
    }
}

function is_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

// Lejon qasje vetëm për adminët, përndryshe dërgon te login
function require_admin(): void
{
    if (($_SESSION['roli'] ?? '') !== 'admin') {
        header('Location: ../login.php');
        exit();
    }
}

// Tabelat e lejuara sipas rolit (whitelist, që emri i tabelës të mos vijë nga përdoruesi)
function role_table(string $role): ?string
{
    $tables = [
        'student'  => 'students',
        'profesor' => 'profesors',
        'admin'    => 'admini',
    ];
    return $tables[$role] ?? null;
}
