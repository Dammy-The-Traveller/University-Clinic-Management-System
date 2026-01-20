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
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Patients List</h5>
                    <a href="/Clinic-Management-System/Add-Patients" class="btn btn-primary ms-auto">Add Patient</a>
                  </div>
                  <div class="card-body">

                    <!-- Table starts -->
                          <!-- Fetching data from the database -->
              <?php require 'fetch_all_patient.view.php'; ?>
       
                    <div class="table-responsive">
                      <table id="patientTable" class="table truncate m-0 align-middle">
                        <thead>
                        <th>Student ID</th>
                         <th>Patient Name</th>
                          <th>Gender</th>
                          <th>Birth Date</th>
                           <th>Country</th>
                          <th>Blood Group</th>
                          <th>Blood Pressure</th>
                          <th>Sugar Level</th>
                          <th>Temperature</th>
                          <th>Pulse</th>
                          <th>Respiration</th>
                          <th>SPO2</th>
                         <th>Treatment</th>
                         <th>Email</th>
                         <th>Mobile Phone</th>
                         <th>Tel Phone</th>
                        <th>Address</th>
                        <?php 
              $logged_user_type = $_SESSION['user']['UserType'];
              
              if ($logged_user_type == 1): ?>
                        <th>Actions</th>
                        <?php endif; ?>
                        </thead>
                      <tbody>
                      <?php if (!empty($patients)): ?>
                        <?php foreach ($patients as $patient): ?>
                          <tr>
            <td><?= htmlspecialchars($patient['student_id']) ?></td>
            <td><?= htmlspecialchars( $patient['lastname' ]. ' ' . $patient['firstname']) ?></td> 
            <td>
          <span class="<?= $patient['gender'] === 'male' ? 'badge bg-info-subtle text-info' : 'badge bg-warning-subtle text-warning' ?>">
            <?= htmlspecialchars($patient['gender']) ?>
          </span>
        </td>
            <td><?= htmlspecialchars($patient['birthdate']) ?></td>
            <td><?= htmlspecialchars($patient['country']) ?></td>
            <td><?= htmlspecialchars($patient['blood_group']) ?></td>
            <td><?= htmlspecialchars($patient['blood_pressure']) ?></td>
            <td><?= htmlspecialchars($patient['sugar_level']) ?></td>
            <td><?= htmlspecialchars($patient['temperature']) ?></td>
            <td><?= htmlspecialchars($patient['pulse']) ?></td>
            <td><?= htmlspecialchars($patient['resp']) ?></td>
            <td><?= htmlspecialchars($patient['spo2']) ?></td>
            <td><?= htmlspecialchars($patient['treatment']) ?></td>
            <td><?= htmlspecialchars($patient['email']) ?></td> 
            <td><?= htmlspecialchars($patient['phone1']) ?></td> 
            <td><?= htmlspecialchars($patient['phone2']) ?></td> 
            <td><?= htmlspecialchars($patient['address']) ?></td>
            <td>
              <div class="d-inline-flex gap-1">
              <?php 
              $logged_user_type = $_SESSION['user']['UserType'];
              if ($logged_user_type == 1): ?>
              <button data-bs-title="Delete Patient Details" class="btn btn-outline-danger btn-sm delete-btn"
               data-id="<?= $patient['id'] ?>" 
                data-studentId="<?= $patient['student_id'] ?>" 
                data-csrf="<?= $_SESSION['csrf_token'] ?>"
               data-bs-toggle="modal" 
              data-bs-target="#delRow" >
               <i class="ri-delete-bin-line"></i>
              </button>
           
              <?php endif; ?>
                <!-- <a href="/Clinic-Management-System/Edit-Patients?studentID=<?= urlencode($patient['student_id']) ?>" class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip" 
                   data-bs-placement="top" data-bs-title="Edit Patient Details">
                  <i class="ri-edit-box-line"></i>
                </a> -->
                <!-- <a href="" class="btn btn-outline-info btn-sm" data-bs-toggle="tooltip" 
                   data-bs-placement="top" data-bs-title="View Dashboard">
                  <i class="ri-eye-line"></i>
                </a> -->
              </div>
            </td>
          </tr>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </tbody>
                      </table>
                    </div>
                    <!-- Table ends -->

                    <!-- Modal Delete Row -->
                    <div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="delRowLabel">
                              Confirm
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete permanently this patient?
                          </div>
                          <div class="modal-footer">
                            <div class="d-flex justify-content-end gap-2">
                              <button class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">No</button>
                              <button class="btn btn-danger delete-Patient" id="confirmDelete" data-bs-dismiss="modal" aria-label="Close"  >Yes</button>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

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
  
   // Select all delete buttons, but only act on the clicked one
   $(document).ready(function () {
    $('#patientTable').DataTable();
    let selectedPatientId = null;
    let selectedStudentId = null;
    let selectedStudentCsrf = null;

    // When any delete button is clicked, set the correct patient ID in the modal
    $(".delete-btn").click(function () {
        selectedPatientId = $(this).data("id");
        selectedStudentId = $(this).data("studentid");
        selectedStudentCsrf = $(this).data("csrf");
    });

    // When the modal confirm button is clicked, perform the deletion
    $("#confirmDelete").click(function () {
        if (!selectedPatientId || !selectedStudentId) {
            alert("Error: No patient selected.");
            return;
        }

        console.log("Deleting Patient:", selectedPatientId, selectedStudentId);

        $.ajax({
            url: "/Clinic-Management-System/Delete_Patient",
            type: "POST",
            data: { ID: selectedPatientId, student_ID: selectedStudentId, csrf_token: selectedStudentCsrf },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.success) {
                    alert("Patient successfully deleted!");
                    location.reload(); // Refresh page to update table
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                alert("An error occurred: " + error);
            },
        });
    });
});


// $(document).ready(function() {
//     $('#patientTable').DataTable();
// });

</script>
  </body>


</html>