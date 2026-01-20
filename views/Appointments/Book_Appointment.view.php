<?php include __DIR__ . '/../partials/head.php'; ?>

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
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/Book" method="POST">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Book Appointment</h5>
                  </div>
                  <div class="card-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a1">Patient Name</label>
                          <input name="fullname" type="text" class="form-control" id="a1" required placeholder="Enter fullname">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a2">Patient Email</label>
                          <input name="EMAIL" type="email" class="form-control" id="a2" required placeholder="Enter email address">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a3">Student ID</label>
                          <input name="Student_ID" type="text" class="form-control" id="a3" required placeholder="Enter student ID">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a4">Gender</label>
                          <select name="gender" class="form-select" id="a4" required>
                            <option value="0">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a5">Age</label>
                          <input name="age" type="number" class="form-control" id="a5" required placeholder="Enter age">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a6">Patient Phone</label>
                          <input name="phone_number" type="text" class="form-control" id="a6" required placeholder="Enter phone number">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a7">Select Date</label>
                          <input name="date" type="date" class="form-control" id="a7" required placeholder="Select date">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a8">Select Time</label>
                          <input name="time" type="time" class="form-control" id="a8" required placeholder="Select time">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a9">Program</label>
                          <input name="program" type="text" class="form-control" id="a9" required placeholder="Enter the program">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label class="form-label" for="a10">Problem</label>
                          <textarea name="problem" class="form-control" id="a10" required placeholder="Enter Problem" rows="3"></textarea>
                        </div>
                      </div>

                      <?php if(isset($errors['email'])):?>
                <p style="color:red" class= "text-center"><?=$errors['email'] ?></p>
                <?php endif; ?>
                      <div class="col-sm-12">
                        <div class="d-flex gap-2 justify-content-end">
                          <a href="/Clinic-Management-System/Book-Appointments" class="btn btn-outline-secondary">
                            Cancel
                          </a>
                          <button type="submit" id="book" class="btn btn-primary">
                           Book Appointment
                         </button>
                        </div>
                      </div>
                    </div>
                    <!-- Row ends -->

                  </div>
                </div>
                </form>
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
  </body>



</html>