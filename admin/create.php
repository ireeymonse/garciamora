<?php include_once "connection.php"; ?>

<!-- pop-up de creacion de producto -->
<div id="crear" class="pop-up" style="width:300px;">
  <div class="cerrar" onclick="ocultar();" ></div>
  <div class="titulo">Añadir producto</div>
  
  <form name="product" method="post" >
    <input type="text" name="name" placeholder="nombre..." required />
    <select name="line" required>
      <option value=''>Elige una línea...</option>
      <?php
        $consulta= mysql_query("SELECT id,name FROM line ORDER BY name");
        while($filas = mysql_fetch_array($consulta)) {
          $name=$filas['name'];
          $id=$filas['id'];
          echo "<option value='$id'>$name</option>";
        }
      ?>
    </select>

    <input type="number" min="1" step="0.1" name="price" placeholder="Precio..." required/>
    <input type="number" min="1" name="stock" placeholder="Stock..." value="1" required/>
    <input type="text" name="image" placeholder="Imagen..." pattern="http:\/\/[A-Za-z]+" required/>
    <input type="submit" name="create" value="Crear"/>
  </form>
</div>

<?php
  //creacion del producto
  if(isset($_POST['create'])) {
    if (valid_post('name') && valid_post('line') && valid_num_post('price') &&
        valid_num_post('stock') && valid_post('image')) {
      $name=$_POST['name'];
      $line=$_POST['line'];
      $price=$_POST['price'];
      $stock=$_POST['stock'];
      $image=$_POST['image'];
      
      mysql_query ("insert into product (name,line_id,price,stock,image_url) VALUES('$name','$line','$price','$stock','$image')", $conexion) or die(mysql_error());
      echo "<p style='color:green;'>Inserción realizada con éxito</p>";
    }
    else echo "<p style='color:red;'>Inserción fallida</p>";
  }

?>