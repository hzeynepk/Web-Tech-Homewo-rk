<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header('Location: login.html?error=Kullanıcı adı ve şifre alanları boş bırakılamaz.');
        exit();
    }

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        header('Location: login.html?error=Geçerli bir e-posta adresi giriniz.');
        exit();
    }

    if (!preg_match('/@sakarya.edu.tr$/', $username)) {
        header('Location: login.html?error=Geçerli bir Sakarya Üniversitesi e-posta adresi giriniz.');
        exit();
    }

    $studentNumber = strstr($username, '@', true);

    if ($password === $studentNumber) {
        echo "Hoşgeldiniz, $studentNumber!";
    } else {
        header('Location: login.html?error=Kullanıcı adı veya şifre yanlış.');
        exit();
    }
} else {
    header('Location: login.html');
    exit();
}
?>
