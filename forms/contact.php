<?php
ini_set('display_errors', 1); // Aktifkan error reporting
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$receiving_email_address = 'pikrgemasunilam@gmail.com';

$php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
} else {
    die('Unable to load the "PHP Email Form" Library! Path: ' . $php_email_form_path); // Sertakan path untuk debugging
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Contoh add_attachment yang benar (ganti dengan path server yang benar)
$attachmentPath = '/path/ke/file/resume.pdf'; // GANTI INI DENGAN PATH SERVER YANG BENAR
if (file_exists($attachmentPath)) {
  try {
    $contact->add_attachment($attachmentPath, 20, array('pdf', 'doc', 'docx', 'rtf'));
  } catch (Exception $e) {
    echo "Error attaching file: " . $e->getMessage();
  }
} else {
  echo "File not found: " . $attachmentPath;
}


try {
    echo $contact->send();
} catch (Exception $e) {
    echo "Error sending email: " . $e->getMessage();
}

?>
