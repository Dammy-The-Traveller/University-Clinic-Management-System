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
                   <h3 >Drugs</h3>
                  </div>
                  <div class="card-body">
                    <!-- Table starts -->
                          <!-- Fetching data from the database -->
                       <?php require 'fetch_all_drug.view.php'; ?>
       
                    <div class="table-responsive">
                    <table id="newDrugTable" class="table truncate m-0 align-middle">
                        <thead>
                        <th>Drug ID</th>
                         <th>Drug Name</th>
                         <th>Drug Category</th>
                         <th>Drug Form</th>
                         <th>Strength</th>
                         <th>Quantity</th>
                         <th>Unit Price</th>
                          <th>Amount</th>
                         <th>Manufacturer</th>
                        <th>Date Added</th>
                        </thead>
                      <tbody>
                      <?php if (!empty($newDrugs)): ?>
                        <?php foreach ($newDrugs as $newDrug): ?>
                          <tr>
            <td><?= htmlspecialchars($newDrug['indexnumber']) ?></td>
            <td><?= htmlspecialchars( $newDrug['drugname']) ?></td> 
            <td><?= htmlspecialchars($newDrug['drugcategory']) ?></td> 
            <td><?= htmlspecialchars($newDrug['drugform']) ?></td>
            <td><?= htmlspecialchars($newDrug['strength']) ?></td> 
            <td><?= htmlspecialchars($newDrug['quantity']) ?></td> 
            <td><?= htmlspecialchars($newDrug['unitprice']) ?></td> 
            <td><?= htmlspecialchars($newDrug['amount']) ?></td>
            <td><?= htmlspecialchars($newDrug['manufacturer']) ?></td> 
            <td><?= htmlspecialchars($newDrug['date']) ?></td> 
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
    $('#newDrugTable').DataTable();
    
});

</script>

  </body>


</html>