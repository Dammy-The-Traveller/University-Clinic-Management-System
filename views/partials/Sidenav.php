<?php 
 $logged_user_firstname = $_SESSION['user']['firstname'];
 $logged_user_lastname = $_SESSION['user']['lastname'];
 $logged_user_type = $_SESSION['user']['UserType'];
 ?>
   <!-- Sidebar wrapper starts -->
   <nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="sidebar-profile">
  <img loading="lazy" src="Public/assets/images/user6.png" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
  <div class="m-0">
    <h5 class="mb-1 profile-name text-nowrap text-truncate"><?=  $logged_user_firstname .' '. $logged_user_lastname ?></h5>
    <p class="m-0 small profile-name text-nowrap text-truncate">Health Admin</p>
  </div>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">
  <ul class="sidebar-menu">
    <li class="<?= urlIs('/Clinic-Management-System/dashboard') ? 'active current-page' : '' ?>">
      <a href="/Clinic-Management-System/dashboard">
        <i class="ri-home-6-line"></i>
        <span class="menu-text">Dashboard</span>
      </a>
    </li>
  
    <li class="treeview <?= urlIs('/Clinic-Management-System/Patients-List') || urlIs('/Clinic-Management-System/Add-Patients') || urlIs('/Clinic-Management-System/Add-Staff') || urlIs('/Clinic-Management-System/Edit-Patients') ? 'active current-page' : '' ?>">
      <a href="#!">
        <i class="ri-heart-pulse-line"></i>
        <span class="menu-text">Patients</span>
      </a>
      <ul class="treeview-menu">
        <!-- <li>
          <a href="patient-dashboard.html">Patients Dashboard</a>
        </li> -->
        <li>
          <a href="/Clinic-Management-System/Patients-List" class="<?= urlIs('/Clinic-Management-System/Patients-List') ? 'active-sub' : '' ?>">Patients List</a>
        </li>
        <li>
          <a href="/Clinic-Management-System/Add-Patients" class="<?= urlIs('/Clinic-Management-System/Add-Patients') ? 'active-sub' : '' ?>" >Add New Patient</a>
        </li>
        <li>
          <a href="/Clinic-Management-System/Add-Staff" class="<?= urlIs('/Clinic-Management-System/Add-Staff') ? 'active-sub' : '' ?>" >Add Staff</a>
        </li>
        <li>
          <a href="/Clinic-Management-System/Edit-Patients" class="<?= urlIs('/Clinic-Management-System/Edit-Patients') ? 'active-sub' : '' ?>">Edit Patient Details</a>
        </li>
      </ul>
    </li>
   
    <li class="treeview <?= urlIs('/Clinic-Management-System/Appointments') || urlIs('/Clinic-Management-System/Appointments-List') || urlIs('/Clinic-Management-System/Book-Appointments') || urlIs('/Clinic-Management-System/Edit-Appointments') ? 'active current-page' : '' ?>">
      <a href="#!">
        <i class="ri-dossier-line"></i>
        <span class="menu-text">Appointments</span>
      </a>
      <ul class="treeview-menu">
        <!-- <li>
          <a href="/Clinic-Management-System/Appointments" class="<?= urlIs('/Clinic-Management-System/Appointments') ? 'active-sub' : '' ?>">Appointments</a>
        </li> -->
        <li>
          <a href="/Clinic-Management-System/Appointments-List" class="<?= urlIs('/Clinic-Management-System/Appointments-List') ? 'active-sub' : '' ?>">Appointments List</a>
        </li>
        <li>
          <a href="/Clinic-Management-System/Book-Appointments" class="<?= urlIs('/Clinic-Management-System/Book-Appointments') ? 'active-sub' : '' ?>">Book Appointment</a>
        </li>
        <li>
          <a href="/Clinic-Management-System/Edit-Appointments" class="<?= urlIs('/Clinic-Management-System/Edit-Appointments') ? 'active-sub' : '' ?>">Edit Appointment</a>
        </li>
      </ul>
    </li>
    
    <li class="<?= urlIs('/Clinic-Management-System/News') ? 'active current-page' : '' ?>"> 
      <a href="/Clinic-Management-System/News">
        <i class="ri-news-line"></i>
        <span class="menu-text">News & Updates</span>
      </a>
    </li>
    
      <li class="treeview <?= urlIs('/Clinic-Management-System/Prescription-List') || urlIs('/Clinic-Management-System/Add-Prescription') ? 'active current-page' : '' ?>">
      <a href="#!">
        <i class="ri-terminal-window-line"></i>
        <span class="menu-text">Prescription</span>
      </a>
      <ul class="treeview-menu">
        <li >
          <a href="/Clinic-Management-System/Prescription-List" class="<?= urlIs('/Clinic-Management-System/Prescription-List') ? 'active-sub' : '' ?>">Prescription List</a>
        </li>
        <li >
          <a href="/Clinic-Management-System/Add-Prescription" class="<?= urlIs('/Clinic-Management-System/Add-Prescription') ? 'active-sub' : '' ?>">Add New Prescription</a>
        </li>
      </ul>
    </li>

    <li class="treeview <?= urlIs('/Clinic-Management-System/Drug-List') || urlIs('/Clinic-Management-System/Add-Drug') || urlIs('/Clinic-Management-System/Edit-Drug') ? 'active current-page' : '' ?>">
      <a href="#!">
        <i class="ri-terminal-window-line"></i>
        <span class="menu-text">Drugs</span>
      </a>
      <ul class="treeview-menu">
        <li >
          <a href="/Clinic-Management-System/Drug-List" class="<?= urlIs('/Clinic-Management-System/Drug-List') ? 'active-sub' : '' ?>">Drugs List</a>
        </li>
        <li >
          <a href="/Clinic-Management-System/Add-Drug" class="<?= urlIs('/Clinic-Management-System/Add-Drug') ? 'active-sub' : '' ?>">Add New Drug</a>
        </li>
        <li >
          <a href="/Clinic-Management-System/Edit-Drug" class="<?= urlIs('/Clinic-Management-System/Edit-Drug') ? 'active-sub' : '' ?>">Edit Drug</a>
        </li>
      </ul>
    </li>
    <?php if ($logged_user_type == 1): ?>
    <li class="<?= urlIs('/Clinic-Management-System/token') ? 'active current-page' : '' ?>"> 
      <a href="/Clinic-Management-System/token">
        <i class="ri-news-line"></i>
        <span class="menu-text">Generate Token</span>
      </a>
    </li>
    <?php endif;?>
  </ul>
</div>
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