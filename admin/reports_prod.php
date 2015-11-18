<html>
  <head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width' />
    <title>Garc&iacute;aMora &nbsp;|&nbsp; Reportes</title>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="main.css">
    <style>
      tbody tr:nth-child(even) {
         background-color: #fcd894;
      }
    </style>
  </head>
  
  <body>
    
  <header>
    <img id="logo" src="media/logow70@2x.png"/>
    <h1>Reportes por modelo</h1>
  </header>
    
  <main>
    <h3>Líneas</h3>
    <table>
    <tr>
      <td>Línea</td>
      <td>Modelos</td>
      <td>Porcentaje</td>
    </tr>
    
  <?php
  include("connection.php");
  $consulta=mysql_query("SELECT line.name as line, count(*) as count, count(*)*100/(select count(*) from product) as percentage FROM line inner join product on line_id = line.id GROUP BY line_id", $conexion) or die(mysql_error());  

  while($filas = mysql_fetch_array($consulta)) {
  ?>
    <tr>
      <td> <?php echo "<p>".$filas['line']."</p>"; ?></td>
      <td> <?php echo "<p>".$filas['count']."</p>"; ?></td>
      <td> <?php echo "<p>".number_format($filas['percentage'], 1, '.', '')."%</p>"; ?></td>
    </tr>
  <?php
  }
  ?>
  </table>
    
    <h3>Precios</h3>
    <table>
    <tr>
      <td>Rango de precios</td>
      <td>Modelos</td>
      <td>Porcentaje</td>
    </tr>
    
  <?php
  $consulta=mysql_query("
  SELECT price_range, count(*) as count, 
  count(*)*100/(
    select count(*) from product
  ) as percentage
  FROM (
    select *,
    CASE
        WHEN price > 500 THEN 'Más de $500' 
        WHEN price > 300 THEN 'Entre $300 y $500'  
        WHEN price > 200 THEN 'Entre $200 y $300'
        WHEN price > 0 THEN 'Menos de $200'
    END AS price_range
    FROM product
  ) as t
  GROUP BY price_range ORDER BY price", $conexion) or die(mysql_error());  

  while($filas = mysql_fetch_array($consulta)) {
  ?>
    <tr>
      <td> <?php echo "<p>".$filas['price_range']."</p>"; ?></td>
      <td> <?php echo "<p>".$filas['count']."</p>"; ?></td>
      <td> <?php echo "<p>".number_format($filas['percentage'], 1, '.', '')."%</p>"; ?></td>
    </tr>
  <?php
  }
  ?>
  </table>
    
  <br/>
  <a href="index.php">Regresar</a>
    </main>
  </body>
</html>