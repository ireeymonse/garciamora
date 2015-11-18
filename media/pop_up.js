function mostrar(id, limpiar) {
   $("#fondo-negro").fadeIn(200);
   $("#" + id).css("margin-left",parseInt(-$("#" + id).outerWidth()/2)+"px");
   $("#" + id).css("margin-top", parseInt(-$("#" + id).outerHeight() / 2) + "px");
   if (typeof limpiar == "undefined" || limpiar) {
      $("#" + id + " input[type='text']").val("");
      $("#" + id + " input[type='password']").val("");
      $("#" + id + " textarea").val("");
      $("#" + id + " input[type='radio']").each(function () {
         $(this).prop("checked", $(this).prop("defaultChecked"));
      });
      $("#" + id + " select").val($("#" + id + " select").prop("defaultSelected"));
   }
   $("#" + id).fadeIn(150);
}
function ocultar() {
   $("#fondo-negro").fadeOut(100);
   $(".pop-up").fadeOut(100);
}
window.onkeyup = function (event) {
   if (event.keyCode == 27) {
      ocultar();
   }
}