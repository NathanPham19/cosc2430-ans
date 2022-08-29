<?php
  echo '$_COOKIE before setcookie: ' . print_r($_COOKIE, true) . '<br>';
  setcookie('myname', 'Tri', time() + 3600);  // expire after 1 hour
  echo '$_COOKIE after setcookie: ' . print_r($_COOKIE, true) . '<br>';
?>
