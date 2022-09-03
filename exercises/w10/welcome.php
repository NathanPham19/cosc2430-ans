<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  if (!isset($_COOKIE['last_visit'])) {
    setcookie('last_visit', time());
    echo '<p>Welcome, please bookmark this page for future visits</p>';
    die();
  }
  $date_format = date("Y-m-d H:i:s", $_COOKIE['last_visit']);
  // update last visit time
  setcookie('last_visit', time(), time() - 1);
  echo "<p>We have not seen you since $date_format</p>";
