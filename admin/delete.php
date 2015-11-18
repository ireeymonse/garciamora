<?php
  include_once "connection.php";

  if ($id = $_POST["delete_id"]) {
    $consulta = mysql_query("delete from product where id=$id", $conexion) or die(mysql_error());
    echo "<p style='color:green;'>Elemento eliminado</p>";
  }
?>

<script>
  function del(id, name) {
    if (confirm("¿Estás seguro de borrar el producto '"+name+"'?")) {
      var form = document.forms["borrar"];
      form.elements["delete_id"].value = id;
      form.submit();
    }
  }
</script>

<form name="borrar" method="post">
  <input type="hidden" name="delete_id" />
</form>