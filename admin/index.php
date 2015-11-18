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
  <link rel='shortcut icon' href='../favicon.ico' type='image/x-icon' />
  <link rel="stylesheet" href="../global.css">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="../media/pop_up.css">
  <style>
    .pop-up .titulo {
      color:#55B5B5;
      margin-bottom: 10px;
    }
  </style>
  
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="../media/pop_up.js"></script>
</head>
  
<body>
  <div id="fondo-negro" onclick="ocultar();" ></div>
  <?php 
  //crear un nuevo producto
  include "create.php";
  //crear un nuevo producto
  include "update.php";
  //borrar producto
  include "delete.php";
  ?>
  
  <header>
    <a href=".." target="_blank" style="border:none: text-decoration:none;">
      <img id="logo" src="media/logow70@2x.png"/>
      <h1>García Mora</h1>
    </a>
    <nav>
      <a href="javascript:mostrar('crear')">+ Añadir producto</a>
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
  $consulta=mysql_query("SELECT product.*, line.name as line FROM line inner join product on line_id = line.id order by line.name, product.name", $conexion) or die(mysql_error());  

  while($filas = mysql_fetch_array($consulta)) {
    $id=$filas['id'];
    $name=$filas['name'];
    $line_id=$filas['line_id'];
    $line=$filas['line'];
    $price=$filas['price'];
    $stock=$filas['stock'];
    $image=$filas['image_url'];
      ?>
      <tr>
        <td> <?php echo "<p class='soft'>".$id."</p>"; ?></td>
        <td> <?php echo "<p>".$name."</p>"; ?></td>
        <td> <?php echo "<p class='$line_id'>".$line."</p>"; ?></td>
        <td> <?php echo "<p class='price'>".$price."</p>"; ?></td>
        <td> <?php echo "<p>".$stock."</p>"; ?></td>
        <td> <?php echo "<a href=\"".$image."\" target='_blank'>Imagen</a>"; ?></td>
        <td><a href="javascript:modif(<?php echo "$id, '$name', '$line_id', '$price', '$stock', '$image'"; ?>)">Modificar</a></td>
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