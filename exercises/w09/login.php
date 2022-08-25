<?php
  session_start();

  define('VALID_PASSWORD', 'p4ssw0rd');

  if (isset($_POST['act'])) {
    if (isset($_POST['password']) && $_POST['password'] == VALID_PASSWORD) {
      $_SESSION['loggedin'] = true;
      header('location: add_product.php');
    } else {
      $error = 'Invalid username/password';
    }
  }

  if (isset($error)) {
    echo "<p>$error</p>";
  }  

?>

<form method="post" action="login.php">
  Username <input type="text" name="username"><br>
  Password <input type="password" name="password"><br>
  <input type="submit" name="act" value="Login">
</form>