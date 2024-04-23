$(document).ready(function () {
  fetch_poll_data();

  function fetch_poll_data() {
    $.ajax({
      url: "fetch_poll_data.php",
      method: "POST",
      success: function (data) {
        $("#poll_result").html(data);
      },
    });
  }

  $("#poll_form").on("submit", function (event) {
    event.preventDefault();
    var poll_option = "";
    $(".poll_option").each(function () {
      if ($(this).prop("checked")) {
        poll_option = $(this).val();
      }
    });
    if (poll_option != "") {
      $("#poll_button").attr("disabled", "disabled");
      var form_data = $(this).serialize();
      $.ajax({
        url: "poll.php",
        method: "POST",
        data: form_data,
        success: function () {
          $("#poll_form")[0].reset();
          $("#poll_button").attr("disabled", false);
          fetch_poll_data();
          alert("Su voto ha sido enviado");
        },
      });
    } else {
      alert("Seleccione una opción");
    }
  });
});
