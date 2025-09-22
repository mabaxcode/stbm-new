<script src='<?php echo base_url(); ?>/dist/index.global.js'></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: '2025-01-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2025-02-01'
        },
        {
          title: 'Long Event',
          start: '2025-02-07',
          end: '2025-03-10'
        },
        {
          title: 'Conference',
          start: '2025-04-11',
          end: '2025-05-13'
        },
      ]
    });

    calendar.render();
  });

</script>
