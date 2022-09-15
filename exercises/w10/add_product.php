<?php
  $items = [
    ['edu','Bachelor of Information Technology','RMIT',2020,2023],
    ['edu','Doctor of Philosophy in CS','Harvard',2028,2033],
    ['edu','Master of Cyber Security','RMIT',2024,2026],
    ['exp','Software Engineer','Google',2022,2024,
    ['exp','Principal Software Engineer','Boeing',2030,2035],
    ['exp','Senior Software Engineer','Amazon',2025,2028]
  ];


?>

<form method="post" action="add_product.php">
  Product name <input type="text" name="product_name"><br>
  Price <input type="text" name="price"><br>
  Sizes <input type="checkbox" name="sizes[]" value="XS"> XS
    <input type="checkbox" name="sizes[]" value="S"> S
    <input type="checkbox" name="sizes[]" value="M"> M
    <input type="checkbox" name="sizes[]" value="L"> L
    <input type="checkbox" name="sizes[]" value="XL"> XL<br>
  <input type="submit" name="act" value="Add Product">
</form>

<div>
  <div><a href="products.php?choice=save">Save Products</a></div>
  <div><a href="products.php?choice=load">Load Products</a></div>
</div>

<?php
  if (isset($_SESSION['products'])) {
    echo '<pre>';
    print_r($_SESSION['products']);
    echo '</pre>';
  }

?>