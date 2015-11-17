<?php
include("connection.php");

  $product_id=$_GET["id"];
  
  //modificar producto
  if (isset($_POST['modificar'])){
    if (isset($_POST['namemod']) && !empty($_POST['namemod']) && isset($_POST['linemod']) &&             !empty($_POST['linemod']) && isset($_POST['pricemod']) && !empty($_POST['pricemod']) && isset($_POST['stockmod']) && !empty($_POST['stockmod']) && isset($_POST['imagemod']) && !empty($_POST['imagemod']))
    {
      $name=$_POST['namemod'];
      $line=$_POST['linemod'];
      $price=$_POST['pricemod'];
      $stock=$_POST['stockmod'];
      $image=$_POST['imagemod'];

      mysql_query ("update product set name='$name',line_id='$line',price='$price',stock='$stock', image_url='$image' WHERE id= '$product_id'", $conexion) or die(mysql_error());

      header('refresh:1; url=index.php');
      echo "<p style='color:green;'> modificación realizada con éxito </p>";
    }
    else echo "<p style='color:red;'> modificación fallida </p>";
  }

  //mostrar datos actuales
  $consulta= mysql_query("SELECT * FROM product WHERE id= $product_id", $conexion) or die(mysql_error());
  if($filas = mysql_fetch_array($consulta)) {
    $name=$filas['name'];
    $line=$filas['line_id'];
    $price=$filas['price'];
    $stock=$filas['stock'];
    $image=$filas['image_url'];
   }
?>

<form name="formulario" method="post">
  <input placeholder="" type="text" name="namemod" value="<?php echo $name; ?>"required>

  <select name="linemod">  
  <?php 
  $consulta= mysql_query("SELECT id,name FROM line ORDER BY name");

  while($filas = mysql_fetch_array($consulta)) {
    $name=$filas['name'];
    $id=$filas['id'];
    if($id==$line){
      echo "<option value='$id' selected>$name</option>";
    }
    else echo "<option value='$id'>$name</option>";
  } 
  ?>
  </select> 
  
  <input placeholder="" type="number" min="0" step="0.1" name="pricemod" value="<?php echo $price; ?>" required>
  <input placeholder="" type="number" min="0" name="stockmod" value="<?php echo $stock; ?>" required>
  <input placeholder="" type="url" name="imagemod" value="<?php echo $image; ?>" required>  
  <input type="submit" value="modificar" name="modificar" required>
</form>





