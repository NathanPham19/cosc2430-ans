<?php
function add($n1, $n2) {
  return $n1 + $n2;
}

function display() {
  // comment/uncomment the statement below
  // to treat $shared as a local/global variable
  // global $shared;
  echo '<p>Value of $shared in display() function: ' . $shared . '</p>';
}
