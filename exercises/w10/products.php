<?php
session_start();

function read_from_file() {
  $file_name = 'products.csv';
  $fp = fopen($file_name, 'r');
  // first row => field names
  $first = fgetcsv($fp);
  $products = [];
  while ($row = fgetcsv($fp)) {
    $i = 0;
    $product = [];
    foreach ($first as $col_name) {
      $product[$col_name] =  $row[$i];
      // treat sizes differently
      // make it an array
      if ($col_name == 'sizes') {
        $product[$col_name] = explode(',', $product[$col_name]);
      }
      $i++;
    }
    $products[] = $product;
  }
  // overwrite the session variable
  $_SESSION['products'] = $products;
}

function save_to_file() {
  $file_name = 'products.csv';
  $fp = fopen($file_name, 'w');
  $fields = ['name', 'price', 'sizes', 'created_time'];
  fputcsv($fp, $fields);
  if (is_array($_SESSION['products'])) {
    foreach ($_SESSION['products'] as $product) {
      // for the sizes, store them as a comma separated string
      $product['sizes'] = implode(',', $product['sizes']);
      fputcsv($fp, $product);
    }
  }
}

if ($_GET['choice'] == 'save') {
  save_to_file();
}
if ($_GET['choice'] == 'load') {
  read_from_file();
}

if (isset($_SESSION['products'])) {
  echo '<pre>';
  print_r($_SESSION['products']);
  echo '</pre>';
}

