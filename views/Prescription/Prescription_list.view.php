<?php include __DIR__ . '/../partials/head.php'; ?>
 
  <!-- Data Tables -->
  <link rel="stylesheet" href="Public/assets/vendor/datatables/dataTables.bs5.css">
    <link rel="stylesheet" href="Public/assets/vendor/datatables/dataTables.bs5-custom.css">
    <link rel="stylesheet" href="Public/assets/vendor/datatables/buttons/dataTables.bs5-custom.css">
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
                <div class="card">
                <div class="text-center mt-3"> 
                   <h3 >New Prescription</h3>
                  </div>
                  <div class="card-body">
                    <!-- Table starts -->
                          <!-- Fetching data from the database -->
                       <?php require 'fetch_all_prescription.view.php'; ?>
       
                    <div class="table-responsive">
                    <table id="newPrescriptionTable" class="table truncate m-0 align-middle">
                        <thead>
                        <th>Student ID</th>
                         <th>Patient Name</th>
                         <th>Email</th>
                         <th>Treatment</th>
                         <th>Drug Name</th>
                         <th>Dosage</th>
                        </thead>
                      <tbody>
                      <?php if (!empty($newPrescriptions)): ?>
                        <?php foreach ($newPrescriptions as $newPrescription): ?>
                          <tr>
            <td><?= htmlspecialchars($newPrescription['student_id']) ?></td>
            <td><?= htmlspecialchars( $newPrescription['lastname' ]. ' ' . $newPrescription['firstname']) ?></td> 
            <td><?= htmlspecialchars($newPrescription['email']) ?></td> 
            <td><?= htmlspecialchars($newPrescription['treatment']) ?></td>
            <td><?= htmlspecialchars($newPrescription['drug_name']) ?></td> 
            <td><?= htmlspecialchars($newPrescription['dosage']) ?></td> 
         
          </tr>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </tbody>
                      </table>
                    </div>
                    <!-- Table ends --> 
                  </div>
                </div>

                
              </div>
            </div>
            <!-- Row ends -->

               <!-- Row starts -->
               <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                <div class="text-center mt-3"> 
                   <h3 >Old Prescription</h3>
                </div>
                  <div class="card-body">
                    <!-- Table starts -->
                    <div class="table-responsive">
                    <table id="oldPrescriptionTable" class="table truncate m-0 align-middle">
                        <thead>
                        <th>Student ID</th>
                         <th>Patient Name</th>
                         <th>Email</th>
                         <th>Treatment</th>
                         <th>Drug Name</th>
                         <th>Dosage</th>
                        </thead>
                      <tbody>
                      <?php if (!empty($oldPrescriptions)): ?>
                        <?php foreach ($oldPrescriptions as $oldPrescription): ?>
                      <tr>
                         <td><?= htmlspecialchars($oldPrescription['student_id']) ?></td>
                        <td><?= htmlspecialchars( $oldPrescription['lastname' ]. ' ' . $oldPrescription['firstname']) ?></td> 
                          <td><?= htmlspecialchars($oldPrescription['email']) ?></td> 
                            <td><?= htmlspecialchars($oldPrescription['treatment']) ?></td>
                              <td><?= htmlspecialchars($oldPrescription['drug_name']) ?></td> 
                              <td><?= htmlspecialchars($oldPrescription['dosage']) ?></td>  
                      </tr>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </tbody>
                      </table>
                    </div>
                    <!-- Table ends --> 
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

    <?php include __DIR__ . '/../partials/footer.php' ?>
    
    <!-- Data Tables -->
    <script src="Public/assets/vendor/datatables/dataTables.min.js"></script>
    <script src="Public/assets/vendor/datatables/dataTables.bootstrap.min.js"></script>
    <script src="Public/assets/vendor/datatables/custom/custom-datatables.js"></script>
<script>
  $(document).ready(function() {
    $('#newPrescriptionTable').DataTable();
    $('#oldPrescriptionTable').DataTable();
});

</script>

  </body>


</html>