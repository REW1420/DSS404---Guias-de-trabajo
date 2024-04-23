function makeactive(tab) {
  document.getElementById("tab1").className = "";
  document.getElementById("tab2").className = "";
  document.getElementById("tab3").className = "";
  document.getElementById("tab" + tab).className = "active";
  callAHAH(
    "content.php?content=" + tab,
    "content",
    "Esperando a cargar el contenido de " +
      "la pestaña" +
      tab +
      " espere. por favor",
    "Error"
  );
}
