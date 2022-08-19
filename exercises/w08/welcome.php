<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
  </head>
  <body>
    <h1>
<?php
      echo date('Y-m-d H:i:s e');
      
      // the difference is (maybe) due to the timezone not set correctly
      // use the date_default_timezone_set() to set the system timezone
      // you can use the date_default_timezone_get() to view the current timezone
      // the list of supported timezone is given at
      // https://www.php.net/manual/en/timezones.php

?>
    </h1>
  </body>
</html>
