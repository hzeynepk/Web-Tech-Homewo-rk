<?php
session_start();

if (!isset($_SESSION['form_data'])) {
    header('Location: iletisim.html');
    exit();
}

$form_data = $_SESSION['form_data'];

unset($_SESSION['form_data']);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Bilgileri</title>
</head>
<body>
    <h1>İletişim Bilgileriniz</h1>
    <p><strong>Adınız:</strong> <?php echo htmlspecialchars($form_data['name']); ?></p>
    <p><strong>E-posta:</strong> <?php echo htmlspecialchars($form_data['email']); ?></p>
    <p><strong>Telefon:</strong> <?php echo htmlspecialchars($form_data['phone']); ?></p>
    <p><strong>Mesajınız:</strong> <?php echo nl2br(htmlspecialchars($form_data['message'])); ?></p>
    <p><strong>Şehir:</strong> <?php echo htmlspecialchars($form_data['city']); ?></p>
    <p><strong>Cinsiyet:</strong> <?php echo htmlspecialchars($form_data['gender']); ?></p>
    <p><strong>Doğum Tarihi:</strong> <?php echo htmlspecialchars($form_data['dob']); ?></p>
    <p><strong>Yüklenen Dosya:</strong> <a href="uploads/<?php echo htmlspecialchars($form_data['file']); ?>" download><?php echo htmlspecialchars($form_data['file']); ?></a></p>
</body>
</html>
