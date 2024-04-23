var xmlhttp = getXmlHttpRequest();

function getServerTime() {
  var myurl = "timexml.php";
  var myrand = parseInt(Math.random() * 999999999999999);
  var modurl = myurl + "?rand=" + myrand;
  xmlhttp.open("GET", modurl, true);
  xmlhttp.onreadystatechange = useHttpResponse;
  xmlhttp.send(null);
}

function useHttpResponse() {
  if (xmlhttp.readyState == 4) {
    if (xmlhttp.status == 200) {
      var timeValue =
        xmlhttp.responseXML.getElementsByTagName("timenow")[0].childNodes[0]
          .nodeValue;
      document.getElementById("showtime").innerHTML =
        '<p class="time">' + timeValue + "</p>";
    } else {
      document.getElementById("showtime").innerHTML =
        '<img src="images/loading43.gif"/>';
    }
  }
}
