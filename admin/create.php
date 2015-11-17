<title>Crear un nuevo Producto</title>
<form name="product" method="post" >
  <input type="text" name="name" placeholder="nombre..." required />
  
  <select name="line" required>
  <option value="">linea</option>
    <?php 
  include("connection.php");

  $consulta= mysql_query("SELECT id,name FROM line ORDER BY name");
    
      while($filas = mysql_fetch_array($consulta)) {
        $name=$filas['name'];
        $id=$filas['id'];
          echo "<option value='$id'>$name</option>";
        }
?>
  </select>
  
  <input type="number" min="0" step="0.1" name="price" placeholder="Precio..." required/>
  <input type="number" min="0" name="stock" placeholder="Stock..." value="1" required/>
  <input type="url" name="image" placeholder="Imagen..." required/>
  <input type="submit" name="send" value= "Enviar" required/>
</form>


<?php

  if(isset($_POST['send']))
    {
    if (valid_post('name') && valid_post('line') && valid_post('price') &&
        valid_post('stock') && valid_post('image')) {
      $name=$_POST['name'];
      $line=$_POST['line'];
      $price=$_POST['price'];
      $stock=$_POST['stock'];
      $image=$_POST['image'];
      
      mysql_query ("insert into product (name,line_id,price,stock,image_url) VALUES('$name','$line','$price','$stock','$image')", $conexion) or die(mysql_error());
      echo "<p style='color:green;'> inserción realizada con éxito </p>";
    }
    else
      {
      echo "<p style='color:red;'>Inserción fallida </p>";
    }
  }
  
?>
<br/>
<br/>
<br/>
  <a href="index.php">Regresar</a>