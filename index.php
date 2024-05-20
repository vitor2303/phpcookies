<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php
class CookieManager {
    public static function setCookie($name, $value, $expire = 0, $path = '/', $domain = null, $secure = false, $httponly = false) {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    public static function getCookie($name) {
        return $_COOKIE[$name] ?? null;
    }

    public static function deleteCookie($name) {
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
            setcookie($name, '', time() - 3600, '/');
        }
    }
}

session_start();

if (!isset($_SESSION['login']) && !CookieManager::getCookie('login')) {
    if (isset($_POST['acao'])) {
        $login = 'vitinho123@gmail.com';
        $senha = '123';

        $loginForm = $_POST['login'];
        $senhaForm = $_POST['senha'];

        if ($login == $loginForm && $senha == $senhaForm) {
            $_SESSION['login'] = true;
            if (isset($_POST['lembrar']) && $_POST['lembrar'] == 'on') {
                CookieManager::setCookie('login', $login, time() + (86400 * 30), "/"); // Cookie válido por 30 dias
            }
            header('Location: index.php');
            exit();
        } else {
            header('Location: index.php?erro=credenciais_incorretas');
            exit();
        }
    }
    include('login.php');
} else {
    include('home.php');
}
?>

</body>
</html>
