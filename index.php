<?php
require_once 'load.php';

if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== '/') {
    $path = trim($_SERVER['PATH_INFO'], '/');
} else {
    $path = 'index';
}
$page = "pages/$path.php";
$title = 'Todo App';
?>

<!-- @copyright coderthemes.com -->

<!DOCTYPE html>
<html lang="en" data-layout="topnav">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title  ?></title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugin css -->
    <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <!-- Datatables css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>
    <!-- App css -->
    <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Pre-loader -->
    <div id="preloader">
        <div id="status">
            <div class="bouncing-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <?php
    if (preg_match('/^[a-zA-Z0-9\/_-]+$/', $path)) {
        if (file_exists($page)) {
            include $page;
        } else {
            include 'errors/404.php';
        }
    } else {
        echo "Path tidak valid!";
    }
    ?>




    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>
    <!-- Bootstrap Datepicker js -->
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Chart js -->
    <script src="assets/vendor/chart.js/chart.min.js"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="assets/js/pages/demo.dashboard-projects.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <!-- Fullcalendar js -->
    <script src="assets/vendor/fullcalendar/index.global.min.js"></script>
    <?php include_once __DIR__ . '/process/getTaskList.php' ?>
    <script>
        ! function(l) {
            "use strict";

            function e() {
                this.$body = l("body"), this.$modal = new bootstrap.Modal(document.getElementById("createTaskModal"), {
                    backdrop: "static"
                }), this.$calendar = l("#calendar"), this.$formEvent = l("#form-event"), this.$btnNewEvent = l("#btn-new-event"), this.$btnDeleteEvent = l("#btn-delete-event"), this.$btnSaveEvent = l("#btn-save-event"), this.$modalTitle = l("#modal-title"), this.$calendarObj = null, this.$selectedEvent = null, this.$newEventData = null
            }
            e.prototype.init = function() {
                var e = new Date(l.now()),
                    e = (new FullCalendar.Draggable(document.getElementById("external-events"), {

                    }), <?= $eventsJson ?>),
                    a = this;
                a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                    slotDuration: "00:15:00",
                    slotMinTime: "08:00:00",
                    slotMaxTime: "19:00:00",
                    themeSystem: "bootstrap",
                    bootstrapFontAwesome: !1,
                    buttonText: {
                        today: "Today",
                        month: "Month",
                        week: "Week",
                        day: "Day",
                        list: "List",
                        prev: "Prev",
                        next: "Next"
                    },
                    initialView: "dayGridMonth",
                    handleWindowResize: !0,
                    height: l(window).height() - 200,
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                    },
                    initialEvents: e,
                    editable: 0,
                    droppable: 0,
                    selectable: 0,
                    dateClick: function(e) {
                        a.onSelect(e)
                    },
                    eventClick: function(e) {
                        a.onEventClick(e)
                    }
                }), a.$calendarObj.render(), a.$btnNewEvent.on("click", function(e) {
                    a.onSelect({
                        date: new Date,
                        allDay: !0
                    })
                }), a.$formEvent.on("submit", function(e) {
                    e.preventDefault();
                    var t, n = a.$formEvent[0];
                    n.checkValidity() ? (a.$selectedEvent ? (a.$selectedEvent.setProp("title", l("#event-title").val()), a.$selectedEvent.setProp("classNames", [l("#event-category").val()])) : (t = {
                        title: l("#event-title").val(),
                        start: a.$newEventData.date,
                        allDay: a.$newEventData.allDay,
                        className: l("#event-category").val()
                    }, a.$calendarObj.addEvent(t)), a.$modal.hide()) : (e.stopPropagation(), n.classList.add("was-validated"))
                }), l(a.$btnDeleteEvent.on("click", function(e) {
                    a.$selectedEvent && (a.$selectedEvent.remove(), a.$selectedEvent = null, a.$modal.hide())
                }))
            }, l.CalendarApp = new e, l.CalendarApp.Constructor = e
        }(window.jQuery),
        function() {
            "use strict";
            window.jQuery.CalendarApp.init()
        }();
    </script>
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
        new DataTable('#taskListTable');
    </script>
</body>

</html>