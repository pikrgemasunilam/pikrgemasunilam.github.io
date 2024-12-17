<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email tujuan
    $to = "pikrgemasunilam@gmailcom";
    $subject = "Form Kontak dari " . $name;
    $body = "Nama: $name\nEmail: $email\nPesan:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "Pesan berhasil dikirim.";
    } else {
        echo "Gagal mengirim pesan.";
    }
} else {
    echo "Akses tidak diizinkan.";
}
?>
