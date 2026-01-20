<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Meta -->
    <meta name="description" content="AIT SCHOOL CLINIC">
    <meta property="og:title" content="AIT SCHOOL CLINIC">
    <meta property="og:description" content="AIT SCHOOL CLINIC">
    <meta property="og:type" content="Website">
    <link href="Public/assets/img/favicon_io/favicon-32x32.png" type="image/x-icon" rel="icon">
    <link href="Public/assets/img/favicon_io/favicon-16x16.png" type="image/x-icon" rel="icon">

    <!-- *************
		************ CSS Files *************
	************* -->
    <link rel="stylesheet" href="Public/assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="Public/assets/css/main.min.css">

    <!-- *************
		************ Vendor Css Files *************
	************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="Public/assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

 
  </head>
  <body>

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

       <!-- App header start -->

 <!-- App header starts -->
     <div class="app-header d-flex align-items-center">

<!-- Toggle buttons starts -->
<div class="d-flex">
  <button class="toggle-sidebar">
    <i class="ri-menu-line"></i>
  </button>
  <button class="pin-sidebar">
    <i class="ri-menu-line"></i>
  </button>
</div>
<!-- Toggle buttons ends -->
 

<!-- App brand starts -->
<div class="app-brand ms-3">
  <a href="/Clinic-Management-System/" class="d-lg-block d-none text-white mt-2">
    <h3>Lagos State University Health Care</h3>
   
  </a>

</div>
<!-- App brand ends -->

<!-- App header actions starts -->
<div class="header-actions">


  <!-- Header user settings starts -->
  <div class="dropdown ms-2">
    <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
      data-bs-toggle="dropdown" aria-expanded="false">
      <div class="avatar-box">AC<span class="status busy"></span></div>
    </a>
    <div class="dropdown-menu dropdown-menu-end shadow-lg">
      <div class="px-3 py-2">
        <b><span class="small">USER</span></b>
        <h6 class="m-0">AIT CLINIC</h6>
      </div>
      
    </div>
  </div>
  <!-- Header user settings ends -->

</div>
<!-- App header actions ends -->

</div>
<!-- App header ends -->
<!-- App header ends -->

      <!-- Main container starts -->
      <div class="main-container">

       <!-- Sidebar wrapper starts -->
    
   <!-- Sidebar wrapper starts -->
   <nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="sidebar-profile">
  <img loading="lazy" src="Public/assets/images/user6.png" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
  <div class="m-0">
    <h5 class="mb-1 profile-name text-nowrap text-truncate">USER</h5>
    <p class="m-0 small profile-name text-nowrap text-truncate">AIT HEALTH CARE</p>
  </div>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->

<!-- Sidebar menu ends -->

<!-- Sidebar contact starts -->
<div class="sidebar-contact">
  <p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
  <h5 class="m-0 lh-1 text-nowrap text-truncate">Your Phone Num</h5>
  <i class="ri-phone-line"></i>
</div>
<!-- Sidebar contact ends -->

</nav>
<!-- Sidebar wrapper ends -->
      <!-- Sidebar wrapper ends -->

        <!-- App container starts -->
        <div class="app-container">

           <!-- App hero header starts -->
           <div class="app-hero-header d-flex align-items-center">

<!-- Breadcrumb starts -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
    <a href="#">Home</a>
  </li>
    <li class="breadcrumb-item text-primary" aria-current="page">
    <?php
      $breadcrumbs = [
        "/Clinic-Management-System/Book-Appointment" => "BOOK APPOINTMENT",
      ];

      $current_url = $_SERVER['REQUEST_URI'];    
      echo $breadcrumbs[$current_url] ?? "";
    ?>
  </li>

</ol>


</div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/book-appointment" method="POST" >
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
                          <label class="form-label" for="a1"> Name</label>
                          <input name="fullname" type="text" class="form-control" id="a1" required placeholder="Enter fullname">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a2"> Email</label>
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
                          <label class="form-label" for="a6"> Phone</label>
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
       <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="Public/assets/js/jquery.min.js"></script>
    <script src="Public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="Public/assets/js/moment.min.js"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="Public/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="Public/assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Apex Charts -->
    




    

    <!-- Custom JS files -->
    <script src="Public/assets/js/custom.js"></script>

   
    
  </body>



</html>