<script>
$(document).ready(function() {
  // Validate individual field on blur
  $("#tempahanForm input, #tempahanForm textarea, #tempahanForm select").on("blur change", function() {
    validateField($(this));
  });


  // Validate all fields before submit
  $("#tempahanForm").on("submit", function(e) {
    e.preventDefault();
    let valid = true;
    $("#tempahanForm input, #tempahanForm textarea, #tempahanForm select").each(function() {
      if (!validateField($(this))) {
        valid = false;
      }
    });

    if (valid) {
      // Normally you'd submit here with AJAX or form.submit()
      $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(), // serialize all inputs
        dataType: "json",
        beforeSend: function() {
          $("#submitBtn").prop("disabled", true).text("Prosessing...");
        },
        success: function(response) {
          if (response.status === "success") {
            $.notify({
              icon: 'icon-bell',
              title: 'Berjaya !',
              message: 'Tempahan anda telah berjaya dibuat.',
            },{
              type: 'success',
              placement: {
                from: "bottom",
                align: "right"
              },
              time: 1000,
            });
            $("#tempahanForm")[0].reset(); // clear form
            $(".error").text("");          // clear errors
          } else {
            alert("❌ Gagal simpan tempahan.");
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
          alert("⚠️ Ralat sistem. Cuba lagi.");
        },
        complete: function() {
          setTimeout(function() {
            $("#submitBtn").prop("disabled", false).text("Tempah");
          }, 2000); // 2000ms = 2 seconds
        }
      });

    } else {
      // Prevent form submission
      return false;
    }
    
  });

  // Validation rules per field
  function validateField($field) {
    let id = $field.attr("id");
    console.log(id);
    let value = $field.val().trim();
    let error = "";

    switch (id) {
      case "tajuk":
        if (value.length < 3) {
          error = "Sila masukkan tajuk (min 3 aksara).";
        }
        break;

      case "agenda":
        if (value === "") {
          error = "Sila masukkan agenda.";
        }
        break;
      
      case "bilik":
        if (value === "") {
          error = "Sila masukkan bilik mesyuarat.";
        }
      break;

      case "tarikh_mula":
        if (value === "") {
          error = "Sila masukkan tarikh & masa mula.";
        }
        break;

      case "tarikh_tamat":
        if (value === "") {
          error = "Sila masukkan tarikh & masa tamat.";
        }
        break;
    }

    if (error !== "") {
      $("#" + id + "-error").text(error).css("color", "red");
      $field.css("border", "1px solid red");
      return false;
    } else {
      $("#" + id + "-error").text("");
      $field.css("border", "1px solid green");
      return true;
    }
  }
});
</script>