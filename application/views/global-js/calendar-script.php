

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script src='<?php echo base_url(); ?>/dist/index.global.js'></script>
<!-- if using sweet alert -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>

  document.addEventListener('DOMContentLoaded', function() {
    
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      dayMaxEvents: true, // allow "more" link when too many events
      // Fetch events from server
      events: '<?php echo base_url('reservation/get_events'); ?>',
      // user sweetalert2 to show event details on click
      // eventClick: function(info) {
      //   Swal.fire({
      //     title: info.event.title,
      //     html: `
      //       <p><strong>Tarikh & Masa (Mula):</strong> ${info.event.start.toLocaleString()}</p>
      //       <p><strong>Tarikh & Masa (Tamat):</strong> ${info.event.end ? info.event.end.toLocaleString() : "N/A"}</p>
      //     `,
      //     // icon: 'info',
      //     showConfirmButton: true,
      //     timer: 5000
      //   });
      // }
      eventClick: function(info) {

        // convert string to Date object
        let start = new Date(info.event.extendedProps.start_time);
        let end   = new Date(info.event.extendedProps.end_time);

        // format options
        let optionsDate = { day: '2-digit', month: '2-digit', year: 'numeric' };
        let optionsTime = { hour: '2-digit', minute: '2-digit', hour12: true };

        let startFormatted = start.toLocaleDateString('en-GB', optionsDate) + ' ' + start.toLocaleTimeString('en-GB', optionsTime).toUpperCase();
        let endFormatted   = end.toLocaleDateString('en-GB', optionsDate) + ' ' + end.toLocaleTimeString('en-GB', optionsTime).toUpperCase();

        // $('#eventModal .modal-title').text(info.event.title);
        $('#eventModal .modal-title').text(info.event.extendedProps.room_name);
        $('#eventModal .modal-body').html(
          '<table class="" width="100%">' +
            '<tr><td width="25%"><strong>Tarikh & Masa (Mula)</strong></td><td>: ' + startFormatted + '</td></tr>' +
            '<tr><td><strong>Tarikh & Masa (Tamat)</strong></td><td>: ' + endFormatted + '</td></tr>' +
            '<tr><td><strong>Status</strong></td><td>: <b>' + info.event.extendedProps.status + '</b></td></tr>' +
            '<tr><td>&nbsp;</td></tr>' +
            // '<tr><td><strong>Agenda</strong></td><td><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Holy guacamole!</strong> You should check in on some of those fields below.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td></tr>' +
            '<tr><td><strong>Agenda</strong></td><td></td></tr>' +
            '<tr><td colspan="2">' + info.event.extendedProps.agenda + '</td></tr>' +
          '</table>'
        );
        $('#eventModal').modal('show');
      }
    });

    calendar.render();
  });

</script>
