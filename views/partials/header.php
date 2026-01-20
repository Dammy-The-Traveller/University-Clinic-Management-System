 <?php 
 $logged_user_firstname = $_SESSION['user']['firstname'];
 $logged_user_lastname = $_SESSION['user']['lastname'];
 ?>
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

  <!-- Search container starts -->
  <!-- <div class="search-container d-lg-block d-none mx-3">
    <input type="text" class="form-control" id="searchId" placeholder="Search">
    <i class="ri-search-line"></i>
  </div> -->
  <!-- Search container ends -->

  <!-- Header actions starts -->
  <div class="d-lg-flex d-none gap-2">
  </div>
  <!-- Header actions ends -->

  <!-- Header user settings starts -->
  <div class="dropdown ms-2">
    <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
      data-bs-toggle="dropdown" aria-expanded="false">
      <div class="avatar-box">LU<span class="status busy"></span></div>
    </a>
    <div class="dropdown-menu dropdown-menu-end shadow-lg">
      <div class="px-3 py-2">
        <span class="small">Admin</span>
        <h6 class="m-0"><?=  $logged_user_firstname .' '. $logged_user_lastname ?></h6>
      </div>
      <div class="mx-3 my-2 d-grid">
      <form action="/Clinic-Management-System/logout" method="POST" style="margin: 0;">
      <input type="hidden" name="_method" value="DELETE">
        <!-- <a class="btn btn-danger">Logout</a> -->
        <a href="" class="btn btn-danger"> <button type="submit" style="background: none; border: none; display: flex; align-items: center; gap: 10px; cursor: pointer;">
    <h6>Logout</h6>
</button></a>
        </form>
      </div>
      
    </div>
  </div>
  <!-- Header user settings ends -->

</div>
<!-- App header actions ends -->

</div>
<!-- App header ends -->