<?php

  if ($id = $_POST["delete_id"]) {
    $consulta = mysql_query("delete from product where id=$id", $conexion) or die(mysql_error());
    echo "<p style='color:green;'>Elemento eliminado</p>";
  }

?>