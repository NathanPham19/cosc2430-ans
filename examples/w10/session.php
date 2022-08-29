<?php
  session_start();
  // has a secret number yet?
  if (isset($_SESSION['secret_number'])) {
    die('Your secret number is: ' . $_SESSION['secret_number'] . ' and you cannot change it');
  }
  if (isset($_POST['act'])) {
    $_SESSION['secret_number'] = $_POST['your_number'];
    die('You chose: ' . $_SESSION['secret_number'] . ' and you cannot change it');
  } 
?>
<form method="post" action="session.php">
  <input type="text" name="your_number" placeholder="Enter a random number"><br>
  <input type="submit" name="act" value="OK">
</form>