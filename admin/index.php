<!--?php
  for($i=0; $i<50; $i++){
    echo "<p>hola mundo cruel $i </p>"; 
  }
?-->

<!doctype html>
<html>
<head>
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width' />
  <title>Garc&iacute;aMora &nbsp;|&nbsp; Administrador</title>
  <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
  <link rel="stylesheet" href="global.css">
  <link rel="stylesheet" href="main.css">
  
  <script>
    function del(id, name) {
      if (confirm("¿Estás seguro de borrar el producto '"+name+"'?")) {
        var form = document.forms[0];
        form.elements["delete_id"].value = id;
        form.submit();
      }
    }
  </script>
</head>
<body>
  <form method="post">
    <input type="hidden" name="delete_id" />
  </form>
  
  <?php
  include("connection.php");

  //borrar elemento si es necesario
  include("delete.php");
  ?>
  
  <header>
    <img id="logo" src="media/logow70@2x.png"/>
    <h1>García Mora</h1>
    <nav>
      <a href="create.php">+ Añadir producto</a>
      <a href="reports_prod.php" target="_blank">Reportes por modelo</a>
      <a href="reports_stock.php" target="_blank">Reportes por existencias</a>
    </nav>
  </header>

  <main>
  <table>
    <tr>
      <th></th>
      <th> Nombre </th>
      <th> Linea </th>
      <th> Precio </th>
      <th> Stock </th>
    </tr>
    
  <?php
  $consulta=mysql_query("SELECT product.*, line.name as line FROM line inner join product on line_id = line.id", $conexion) or die(mysql_error());  

  while($filas = mysql_fetch_array($consulta)) {
    $id=$filas['id'];
    $name=$filas['name'];
    $line=$filas['line'];
    $price=$filas['price'];
    $stock=$filas['stock'];
    $image=$filas['image_url'];
      ?>
      <tr>
        <td> <?php echo "<p class='soft'>".$id."</p>"; ?></td>
        <td> <?php echo "<p>".$name."</p>"; ?></td>
        <td> <?php echo "<p>".$line."</p>"; ?></td>
        <td> <?php echo "<p class='price'>".$price."</p>"; ?></td>
        <td> <?php echo "<p>".$stock."</p>"; ?></td>
        <td> <?php echo "<a href=\"".$image."\" target='_blank'>Imagen</a>"; ?></td>
        <td><a href="update.php?id=<?php echo $id; ?>"> Modificar </a></td>
        <td><a href="javascript:del(<?php echo "$id, '$name'"; ?>)">Eliminar</a></td>
      </tr>
  <?php
  }
  ?>
  </table>
  <br/>
  <a href="#">Arriba</a>
  </main>
</body></html>