function autocomplet() {
  var min_length = 3;
  var keyword = $("#country_id").val();
  if (keyword.length >= min_length) {
    $.ajax({
      url: "ajax_refresh.php",
      type: "POST",
      data: { keyword: keyword },
      success: function (data) {
        $("#country_list_id").show();
        $("#country_list_id").html(data);
      },
    });
  } else {
    $("#country_list_id").hide();
  }
}

function set_item(item) {
  $("#country_id").val(item);

  $("#country_list_id").hide();
}

$("#country_list_id").hide();
