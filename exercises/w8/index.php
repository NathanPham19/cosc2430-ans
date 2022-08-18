<?php
require('functions.php');

echo '<p>Call add() function: add(5, 7) = ' . add(5, 7) . '</p>';

$shared = 123;

echo '<p>Value of $shared on index page: ' . $shared . '</p>';

display();
