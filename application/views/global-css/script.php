<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/plugin/jsvectormap/world.js"></script>

<!-- Sweet Alert -->
<script src="<?php echo base_url(); ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="<?php echo base_url(); ?>/assets/js/kaiadmin.min.js"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>/assets/js/setting-demo.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/demo.js"></script>



<!-- form validation for make reservation rooms -->
<?php $this->load->view('validation-script/room-booking'); ?>
<script>
  var base_url = "<?php echo base_url(); ?>";
  $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#177dff",
    fillColor: "rgba(23, 125, 255, 0.14)",
  });

  $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#f3545d",
    fillColor: "rgba(243, 84, 93, .14)",
  });

  $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#ffa534",
    fillColor: "rgba(255, 165, 52, .14)",
  });


  $(document).ready(function() {
    $('#myReservationsTable').DataTable();
  });


  $(document).on("click", ".btn-view-reservation", function(e) {
      e.preventDefault();
      var id = $(this).data("id");

      // show loading spinner first
      $("#reservationDetailModal .modal-body").html($("#modal-loading").show());
      $("#reservationDetailModal").modal("show");

      $.ajax({
          url: base_url + "reservation/reservation_detail",   // <-- your backend PHP endpoint
          type: "POST",
          data: { id: id },
          dataType: "json",
          success: function(data) {
            console.log(data);
              if (data.success) {
                  $("#reservationDetailModal .modal-body").html(data.content);
              } else {
                  $("#reservationDetailModal .modal-body").html("<p class='text-danger'>Error loading data.</p>");
              }
          },
          error: function() {
              $("#reservationDetailModal .modal-body").html("<p class='text-danger'>Request failed.</p>");
          }
      });
  });

  
  $(".btn-delete-reservation").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    swal({
      title: "Anda pasti?",
      text: "Tempahan ini akan dibatalkan!",
      type: "warning",
      buttons: {
        cancel: {
          visible: true,
          text: "Tidak",
          className: "btn btn-danger",
        },
        confirm: {
          text: "Ya, batalkan!",
          className: "btn btn-success",
        },
      },
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
            url: base_url + "reservation/delete_reservation",   // <-- your backend PHP endpoint
            type: "POST",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    // swal({
                    //     title: "Berjaya!",
                    //     text: response.message,
                    //     type: "success",
                    //     confirmButtonClass: "btn btn-success",
                    //     confirmButtonText: "OK"
                    // }, function() {
                    //     location.reload();
                    // });
                    
                    // swal(response.message, {
                    //   icon: "success",
                    //   buttons: {
                    //     confirm: {
                    //       className: "btn btn-success",
                    //     },
                    //   },
                    // });

                    swal({
                      title: "Berjaya!",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      buttons: {
                        confirm: {
                          text: "Ok",
                          className: "btn btn-success",
                        },
                      },
                    }).then((okBtn) => {
                      if (okBtn) {
                        location.reload();
                      }
                    });

                    
                } else {
                    // swal("Ralat!", "Tempahan tidak dapat dibatalkan.", "error");
                    swal(response.message, {
                      icon: "error",
                      buttons: {
                        confirm: {
                          className: "btn btn-success",
                        },
                      },
                    });
                }
            },
            error: function() {
                // swal("Ralat!", "Masalah pada server.", "error");
                swal(response.message, {
                  icon: "error",
                  buttons: {
                    confirm: {
                      className: "btn btn-success",
                    },
                  },
                });
            }
        });

      } else {
       
      }
    });
  });

  $(".btn-process-booking").click(function (e) {
    e.preventDefault();
    let keputusan = $("#keputusan_permohonan").val();

    if (keputusan === "") {
        swal("Peringatan", "Sila pilih keputusan permohonan!", "warning");
        return; // stop here
    }

    $.ajax({
        url: base_url + "app/process_booking",
        type: "POST",
        data: $("#process-form-data").serialize(),
        dataType: "json",
        success: function (response) {
            if (response.success) {
                swal("Berjaya!", response.message, "success").then(() => {
                    window.location.href = base_url + 'app/permohonan';
                });
            } else {
                swal("Error!", response.message, "error");
            }
        },
    });
  });


  // document.querySelector(".btn-update-profile").addEventListener("click", function () {
  $(".btn-update-profile").click(function (e) {
    e.preventDefault();

      // console.log('x');
      let fullname = document.getElementById("nama").value.trim();

      // console.log(fullname);
      
      let email = document.getElementById("email").value.trim();
      let phone_no = document.getElementById("phone_no").value.trim();
      let designation = document.getElementById("designation").value.trim();
      let department_name = document.getElementById("department_name").value.trim();
      // let form = document.getElementById("updateProfileForm");

      // clear previous errors
      document.getElementById("nama-error").innerText = "";
      document.getElementById("email-error").innerText = "";
      document.getElementById("phone_no-error").innerText = "";
      document.getElementById("designation-error").innerText = "";
      document.getElementById("department_name-error").innerText = "";

      // let errors = [];
      let isValid = true;

      if (fullname === "") {
          // errors.push("Sila masukkan nama.");
          console.log('xx');
          document.getElementById("nama-error").innerText = "Sila masukkan nama.";
          isValid = false;
      }

      if (email === "") {
          // errors.push("Sila masukkan email.");
          document.getElementById("email-error").innerText = "Sila masukkan email.";
          isValid = false;
      } else {
          // simple email regex
          let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
          if (!email.match(emailPattern)) {
              //errors.push("Sila masukkan email yang sah.");
              document.getElementById("email-error").innerText = "Sila masukkan email yang sah.";
              isValid = false;
          }
      }

      if (phone_no === "") {
          // errors.push("Sila masukkan nombor telefon.");
          document.getElementById("phone_no-error").innerText = "Sila masukkan nombor telefon.";
          isValid = false;
      }

      if (designation === "") {
          // errors.push("Sila masukkan nombor telefon.");
          document.getElementById("designation-error").innerText = "Sila masukkan jawatan.";
          isValid = false;
      }

      if (department_name === "") {
          // errors.push("Sila masukkan nombor telefon.");
          document.getElementById("department_name-error").innerText = "Sila masukkan jabatan.";
          isValid = false;
      }

      // if (errors.length > 0) {
      //     alert(errors.join("\n")); // show all errors
      // } else {
      //     // if valid, submit form
      //     // document.getElementById("updateProfileForm").submit();
      //     form.submit();
      // }

      // if (isValid) {
      //     let btn = $(".btn-update-profile");
      //     // document.getElementById("updateProfileForm").submit();
      //     $.ajax({
      //       url: base_url + "app/kemaskini_profile_proses",
      //       type: "POST",
      //       data: $("#updateProfileForm").serialize(),
      //       dataType: "json",
      //       success: function (response) {
      //           // console.log(response);
      //           if (response.status == true) {
      //               swal("Berjaya!", response.message, "success").then(() => {
      //                   // window.location.href = base_url + 'app/permohonan';
      //                   location.reload();
      //               });
      //           } else {
      //               swal("Error!", response.message, "error");
      //           }
      //       },
      //   });
      // }

      if (isValid) {
        let btn = $(".btn-update-profile");

        $.ajax({
            url: base_url + "app/kemaskini_profile_proses",
            type: "POST",
            data: $("#updateProfileForm").serialize(),
            dataType: "json",
            beforeSend: function () {
                // disable button & show processing text
                btn.prop("disabled", true).text("Prosessing...");
            },
            success: function (response) {
                if (response.status == true) {
                    swal("Berjaya!", response.message, "success").then(() => {
                        location.reload();
                    });
                } else {
                    swal("Error!", response.message, "error");
                }
            },
            error: function () {
                swal("Error!", "Something went wrong. Please try again.", "error");
            },
            complete: function () {
                // re-enable button & restore text
                btn.prop("disabled", false).text("Kemaskini");
            }
        });
    }

  });

  $(".btn-update-password").click(function (e) {
    e.preventDefault();

      // console.log('x');
      let current_password = document.getElementById("current_password").value.trim();      
      let new_password = document.getElementById("new_password").value.trim();
      let c_new_password = document.getElementById("c_new_password").value.trim();

      // clear previous errors
      document.getElementById("current_password-error").innerText = "";
      document.getElementById("new_password-error").innerText = "";
      document.getElementById("c_new_password-error").innerText = "";

      // let errors = [];
      let isValid = true;

      if (current_password === "") {
          // errors.push("Sila masukkan nama.");
          document.getElementById("current_password-error").innerText = "Sila masukkan kata laluan sekarang.";
          isValid = false;
      }

      if (new_password === "") {
          // errors.push("Sila masukkan email.");
          document.getElementById("new_password-error").innerText = "Sila masukkan kata laluan baru.";
          isValid = false;
      }

      if (c_new_password === "") {
          // errors.push("Sila masukkan nombor telefon.");
          document.getElementById("c_new_password-error").innerText = "Sila sahkan kata laluan baru.";
          isValid = false;
      }else if (new_password !== c_new_password) {
        document.getElementById("c_new_password-error").innerText = "Kata laluan tidak sama. Sila sahkan semula";
        isValid = false;
      }

      // if (isValid) {
      //     // document.getElementById("updateProfileForm").submit();
      //     $.ajax({
      //       url: base_url + "app/update_password",
      //       type: "POST",
      //       data: $("#updatePasswordForm").serialize(),
      //       dataType: "json",
      //       success: function (response) {
      //           // console.log(response);
      //           if (response.status == true) {
      //               swal("Berjaya!", response.message, "success").then(() => {
      //                   // window.location.href = base_url + 'app/permohonan';
      //                   location.reload();
      //               });
      //           } else {
      //               swal("Error!", response.message, "error");
      //           }
      //       },
      //   });
      // }

      if (isValid) {
        let btn = $(".btn-update-password");

        $.ajax({
            url: base_url + "app/update_password",
            type: "POST",
            data: $("#updatePasswordForm").serialize(),
            dataType: "json",
            beforeSend: function () {
                // disable button & show processing text
                btn.prop("disabled", true).text("Prosessing...");
            },
            success: function (response) {
                if (response.status == true) {
                    swal("Berjaya!", response.message, "success").then(() => {
                        location.reload();
                    });
                } else {
                    swal("Error!", response.message, "error");
                }
            },
            error: function () {
                swal("Error!", "Something went wrong. Please try again.", "error");
            },
            complete: function () {
                // re-enable button & restore text
                btn.prop("disabled", false).text("Kemaskini");
            }
        });
    }
  });

  // Click event
  $(".carian-bilik").on("click", function() {
      carianBilik();
  });

  // Enter key event
  $("#carian_bilik_val").keypress(function(e) {
      if (e.key === "Enter") {
          e.preventDefault();
          carianBilik();
      }
  });

  function carianBilik() {
      let keyword = $("#carian_bilik_val").val().trim();

      if (keyword === "") {
          $("#result").html("<p class='text-danger'>Sila pilih nama bilik.</p>");
          return;
      }

      $.ajax({
          url: base_url + "app/carian_bilik", // <-- ganti dgn endpoint controller anda
          type: "POST",
          data: { nama_bilik: keyword },
          beforeSend: function() {
              $("#result").html("<p>Sedang mencari...</p>");
          },
          success: function(response) {
              // Backend return HTML directly
              $("#result").html(response);
          },
          error: function() {
              $("#result").html("<p class='text-danger'>Ralat ketika memuatkan data.</p>");
          }
      });
  }

</script>