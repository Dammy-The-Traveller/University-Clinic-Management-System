<?php include __DIR__ . '/../partials/head.php'; ?>
    <!-- Calendar CSS -->
    <link rel="stylesheet" href="Public/assets/vendor/calendar/css/main.min.css">
    <link rel="stylesheet" href="Public/assets/vendor/calendar/css/custom.css">
  <body>

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

       <!-- App header start -->
       <?php include __DIR__ . '/../partials/header.php'; ?>
<!-- App header ends -->

      <!-- Main container starts -->
      <div class="main-container">

    <!-- Sidebar wrapper starts -->
    <?php include __DIR__ . '/../partials/Sidenav.php' ?>
      <!-- Sidebar wrapper ends -->

        <!-- App container starts -->
        <div class="app-container">

           <!-- App hero header starts -->
           <?php include __DIR__ . '/../partials/TopNav.php' ?>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12 col-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Appointments</h5>
                    <a href="/Clinic-Management-System/Book-Appointments" class="btn btn-primary ms-auto">Book Appointment</a>
                  </div>
                  <div class="card-body">

                    <div id="appointmentsCal"></div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

          </div>
          <!-- App body ends -->

      

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <?php include __DIR__ . '/../partials/footer.php' ?>

       <!-- Calendar JS -->
       <script src="Public/assets/vendor/calendar/js/main.min.js"></script>
    <script src="Public/assets/vendor/calendar/custom/appointments-calendar.js"></script>
  </body>



</html>