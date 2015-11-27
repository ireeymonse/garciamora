<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
  <link rel='shortcut icon' href='../favicon.ico' type='image/x-icon' />
  <title>Garc&iacute;aMora &nbsp;|&nbsp; Productos</title>
  <link rel="stylesheet" href="../global.css">
  <link rel="stylesheet" href="../media/pop_up.css">
  <link rel="stylesheet" href="product.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="../media/pop_up.js"></script>
  <script src="product.js"></script>
</head>
<body>
  <main>
    <aside class="filters">
      <h3>Ordenar</h3>
      <span class="order active">Nombre</span>
      <span class="order">Línea</span>
      <span class="order">Precio</span>
      <h3>Filtrar por líneas</h3>
      <span class="filter active">Todas</span>
      <span class="filter glove">Títere de guante</span>
      <span class="filter finger">Títere de dedo</span>
      <span class="filter rattle">Sonaja</span>
      <span class="filter figure">Figura</span>
    </aside>
    
    <section class="products-list">
      <?php
  include("../admin/connection.php");
  
  $consulta=mysql_query("SELECT product.*, line.name as line FROM line inner join product on line_id = line.id order by line.name, product.name", $conexion) or die(mysql_error());  

  while($filas = mysql_fetch_array($consulta)) {
    $id=$filas['id'];
    $name=$filas['name'];
    $line_id=$filas['line_id'];
    $line=$filas['line'];
    $price=$filas['price'];
    $stock=$filas['stock'];
    $image_url=$filas['image_url'];
      ?>
      <div class="item">
        <img class="product-image" src="<?php echo $image_url ?>" onclick="zoom('<?php echo $image_url ?>')" />
        <div class="name"><?php echo $name ?></div><span class="line <?php echo $line_id ?>"><?php echo $line ?></span><div class="purchase"><span class="stock"><?php echo $stock ?></span><a href="#" class="price"><?php echo $price ?></a></div>
      </div>
  <?php } ?>
    </section>
    
    <div id="fondo-negro" onclick="ocultar();" ></div>
    <!-- pop-up de detalle de producto -->
    <div id="product-detail" class="pop-up image" onclick="ocultar();">
      <img class="product-image" />
    </div>
  </main>
</body>
</html>