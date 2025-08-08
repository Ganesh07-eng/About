<?php
// Your receiving email address
$receiving_email_address = 'contact@example.com';

// Include PHP Email Form library (only if the file exists)
$library_path = '../assets/vendor/php-email-form/php-email-form.php';

if (file_exists($library_path)) {
  include($library_path);
} else {
  die('Unable to load the PHP Email Form library!');
}

// Create new form handler
$contact_form = new PHP_Email_Form;
$contact_form->ajax = true;

// Form settings
$contact_form->to = $receiving_email_address;
$contact_form->from_name = $_POST['name'];
$contact_form->from_email = $_POST['email'];
$contact_form->subject = $_POST['subject'];

// Add submitted message fields
$contact_form->add_message($_POST['name'], 'Name');
$contact_form->add_message($_POST['email'], 'Email');
$contact_form->add_message($_POST['message'], 'Message', 10);

// Send email and output result
echo $contact_form->send();
?>
