function objetoAjax() {
  var xmlhttp = false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest != "undefined") {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function enviarDatosEmpleado() {
  var divResultado = document.getElementById("resultado");

  var nom = document.nuevo_empleado.nombre.value;
  var ape = document.nuevo_empleado.apellido.value;
  var cor = document.nuevo_empleado.correo.value;

  var ajax = objetoAjax();

  ajax.open("POST", "registro.php", true);

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      divResultado.innerHTML = ajax.responseText;
      LimpiarCampos();
    }
  };

  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.send("nombre=" + nom + "&apellido=" + ape + "&correo=" + cor);
}

function LimpiarCampos() {
  document.nuevo_empleado.nombre.value = "";
  document.nuevo_empleado.apellido.value = "";
  document.nuevo_empleado.correo.value = "";
  document.nuevo_empleado.nombre.focus();
}
