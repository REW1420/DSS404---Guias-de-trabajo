window.onload = initAll;
var xhr;
var xPos, yPos;

function initAll() {
  var allLinks = document.getElementsByTagName("a");
  for (var i = 0; i < allLinks.length; i++) {
    allLinks[i].onmouseover = showPreview;
  }
}

function showPreview(evt) {
  getPreview(evt);
  return false;
}

function hidePreview() {
  document.getElementById("previewwin").style.visibility = "hidden";
}

function getPreview(evt) {
  if (evt) {
    var url = evt.target;
  } else {
    evt = window.event;
    var url = evt.srcElement;
  }
  xPos = evt.clientX;
  yPos = evt.clientY;
  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else {
    if (window.ActiveXObject) {
      try {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {}
    }
  }
  if (xhr) {
    xhr.onreadystatechange = showContents;
    xhr.open("GET", url, true);
    xhr.send(null);
  } else {
    alert("ERROR: No se ha podido crear objeto XMLHttpRequest");
  }
}

function showContents() {
  var prevwin = document.getElementById("previewwin");
  if (xhr.readyState == 4) {
    prevwin.innerHTML =
      xhr.status == 200
        ? xhr.responseText
        : "Hay un problema con la solicitud: " +
          xhr.status +
          " " +
          xhr.statusText;
    prevwin.style.top = parseInt(yPos) + 8 + "px";
    prevwin.style.left = parseInt(xPos) + 8 + "px";
    prevwin.style.visibility = "visible";
    prevwin.onmouseout = hidePreview;
  }
}
