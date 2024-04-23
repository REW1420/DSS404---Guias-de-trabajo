function callAHAH(url, pageElement, callMessage, errorMessage) {
  document.getElementById(pageElement).innerHTML = callMessage; // Added missing "="
  var req;
  /* Para navegadores como Firefox, Safari, Chrome, Opera, etc */
  try {
    req = new XMLHttpRequest();
  } catch (e) {
    try {
      req = new ActiveXObject("Msxm12.XMLHTTP"); // some versions IE
    } catch (e) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP"); // some versions IE
      } catch (E) {
        return false; // Added missing "return false;"
      }
    }
  }
  req.onreadystatechange = function () {
    responseAHAH(req, pageElement, errorMessage); // Passed req as the first argument
  };
  req.open("GET", url, true);
  req.send(null);
}

function responseAHAH(req, pageElement, errorMessage) {
  // Added req parameter
  var output;
  if (req.readyState == 4) {
    if (req.status == 200) {
      output = req.responseText; // Added missing "="
      document.getElementById(pageElement).innerHTML = output; // Added missing "="
    } else {
      output = "Error " + req.status + ": " + req.statusText; // Changed errorMessage to req.statusText
      document.getElementById(pageElement).innerHTML =
        errorMessage + "\n" + output; // Added missing "="
    }
  }
}
