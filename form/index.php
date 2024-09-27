<h1>FORM </>
<link rel="stylesheet" type="text/css" href="styles.css">

<form action="process_form.php" method="post">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone"><br><br>
  <label for="message">Message:</label>
  <textarea id="message" name="message"></textarea><br><br>
  <input type="submit" value="Submit">
</form>