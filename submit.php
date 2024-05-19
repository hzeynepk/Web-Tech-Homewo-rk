<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = $_POST;
    $_SESSION['form_data']['file'] = $_FILES['file']['name'];

    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);

    header('Location: display.php');
    exit();
} else {
    header('Location: iletisim.html');
    exit();
}
?>
