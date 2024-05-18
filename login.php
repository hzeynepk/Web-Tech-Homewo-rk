<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the input fields
    if (empty($username) || empty($password)) {
        header('Location: login.html?error=Kullanıcı adı ve şifre alanları boş bırakılamaz.');
        exit();
    }

    // Validate the username as an email address
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        header('Location: login.html?error=Geçerli bir e-posta adresi giriniz.');
        exit();
    }

    // Check if the domain is correct
    if (!preg_match('/@sakarya.edu.tr$/', $username)) {
        header('Location: login.html?error=Geçerli bir Sakarya Üniversitesi e-posta adresi giriniz.');
        exit();
    }

    // Extract the student number from the email
    $studentNumber = strstr($username, '@', true);

    // Check if the password matches the student number
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
