<?php
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  // Validate the form data
  if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo "Please fill in all fields.";
    exit;
  }

  $to = "your_email@example.com";
  $subject = "New Form Submission";
  $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
  mail($to, $subject, $body);

  echo "Form submitted successfully!";
?>
create a form that asks user for the name and favourite color and then displays the message with color and on clicking submit button " Hi $name your fav color is $color"