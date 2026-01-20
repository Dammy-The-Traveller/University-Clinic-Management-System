<div class="app-hero-header d-flex align-items-center">

<!-- Breadcrumb starts -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
    <a href="/Clinic-Management-System/dashboard">Home</a>
  </li>
    <li class="breadcrumb-item text-primary" aria-current="page">
    <?php
      $breadcrumbs = [
        "/Clinic-Management-System/dashboard" => "DASHBOARD",
        "/Clinic-Management-System/Patients-List" => "PATIENT LIST",
        "/Clinic-Management-System/Add-Patients" => "ADD NEW PATIENTS",
        "/Clinic-Management-System/Add-Staff" => "ADD STAFF",
        "/Clinic-Management-System/Edit-Patients" => "EDIT PATIENTS DETAILS",
        "/Clinic-Management-System/Appointments" => "APPOINTMENTS",
        "/Clinic-Management-System/Appointments-List" => "APPOINTMENTS LIST",
        "/Clinic-Management-System/Book-Appointments" => "BOOK APPOINTMENT",
        "/Clinic-Management-System/Edit-Appointments" => "EDIT APPOINTMENT",
        "/Clinic-Management-System/Add-Prescription" => "ADD NEW PRESCRIPTION",
        "/Clinic-Management-System/Prescription-List" => "PRESCRIPTION LIST",
        "/Clinic-Management-System/News" => "NEWS & UPDATES",
        "/Clinic-Management-System/Drug-List" => "DRUG LIST",
        "/Clinic-Management-System/Add-Drug" => "ADD NEW DRUG",
        "/Clinic-Management-System/Edit-Drug" => "EDIT DRUG",
        "/Clinic-Management-System/token" => "Token"
      ];

      $current_url = $_SERVER['REQUEST_URI'];    
      echo $breadcrumbs[$current_url] ?? "";
    ?>
  </li>

</ol>
<!-- Breadcrumb ends -->

<!-- Sales stats starts -->
<!-- <div class="ms-auto d-lg-flex d-none flex-row">
  <div class="d-flex flex-row gap-1 day-sorting">
    <button class="btn btn-sm btn-primary">Today</button>
    <button class="btn btn-sm">7d</button>
    <button class="btn btn-sm">2w</button>
    <button class="btn btn-sm">1m</button>
    <button class="btn btn-sm">3m</button>
    <button class="btn btn-sm">6m</button>
    <button class="btn btn-sm">1y</button>
  </div>
</div> -->
<!-- Sales stats ends -->

</div>