<?php include __DIR__ . '/../partials/head.php'; ?>
    <!-- Data Tables -->
    <link rel="stylesheet" href="Public/assets/vendor/datatables/dataTables.bs5.css">
    <link rel="stylesheet" href="Public/assets/vendor/datatables/dataTables.bs5-custom.css">
    <link rel="stylesheet" href="Public/assets/vendor/datatables/buttons/dataTables.bs5-custom.css">
  

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
                    <h5 class="card-title">Appointments List</h5>
                    <a href="/Clinic-Management-System/Book-Appointments" class="btn btn-primary ms-auto">Book Appointment</a>
                  </div>
                  <div class="card-body">

                    <!-- Table starts -->
                    <?php require 'fetch_appointment.view.php'; ?>
                    <div class="table-responsive">
                      <table id="appointmentsGrid" class="table m-0 align-middle">
                        <thead>
                          <tr>
                            <th>Student ID</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Program</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Problem</th>
                            <th>Appointment Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                      <?php if (!empty($appointmentLists)): ?>
                        <?php foreach ($appointmentLists as $appointmentList): ?>
                          <tr>
            <td><?= htmlspecialchars($appointmentList['student_id']) ?></td>
            <td><?= htmlspecialchars( $appointmentList['fullname']) ?></td>
            <td>
          <span class="<?= $appointmentList['gender'] === 'male' ? 'badge bg-info-subtle text-info' : 'badge bg-warning-subtle text-warning' ?>">
            <?= htmlspecialchars($appointmentList['gender']) ?>
          </span>
        </td> 
            <td><?= htmlspecialchars($appointmentList['age']) ?></td>
            <td><?= htmlspecialchars($appointmentList['email']) ?></td>
            <td><?= htmlspecialchars($appointmentList['phone_number']) ?></td>
            <td><?= htmlspecialchars($appointmentList['program']) ?></td>
          
           
          
            
            <td><?= htmlspecialchars($appointmentList['date']) ?></td>
            <?php 
    $storedTime = $appointmentList['time']; 
    $formattedTime = date("h:i A", strtotime($storedTime));
 ?>
            <td><?= htmlspecialchars( $formattedTime) ?></td>
            <td><?= htmlspecialchars($appointmentList['problem']) ?></td>
            <td><?= htmlspecialchars($appointmentList['status']) ?></td> 
            
            <td>
            <div class="d-inline-flex gap-1">
        
        <button class="btn btn-outline-danger btn-sm approve-btn"
            data-id="<?= $appointmentList['id'] ?>" 
            data-studentId="<?= $appointmentList['student_id'] ?>"
            data-csrf="<?= $_SESSION['csrf_token'] ?>"
            data-bs-toggle="tooltip"  
            data-bs-placement="top"
             data-bs-title="Approve Appointment"
             <?= ($appointmentList['status'] === 'approved' || $appointmentList['status'] === 'attended-to') ? 'disabled' : '' ?>>
            <i class="ri-checkbox-circle-line"></i>
        </button>

        <button class="btn btn-outline-success btn-sm reject-btn" 
            data-id="<?= $appointmentList['id'] ?>" 
            data-studentId="<?= $appointmentList['student_id'] ?>"
            data-csrf="<?= $_SESSION['csrf_token'] ?>"
            data-bs-toggle="tooltip" 
            data-bs-placement="top"
             data-bs-title="Reject Appointment"
            <?= ($appointmentList['status'] === 'rejected' || $appointmentList['status'] === 'attended-to') ? 'disabled' : '' ?> >
            <i class="ri-close-circle-line"></i>
        </button>

        
        <button class="btn btn-outline-info btn-sm delete-btn" 
            data-id="<?= $appointmentList['id'] ?>" 
            data-studentId="<?= $appointmentList['student_id'] ?>" 
            data-csrf="<?= $_SESSION['csrf_token'] ?>"
            data-bs-toggle="tooltip" 
            data-bs-placement="top" 
            data-bs-title="Delete Appointment">
            <i class="ri-delete-bin-line"></i>
        </button>
    </div>
            </td>
          </tr>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </tbody>
                      </table>
                    </div>
                    <!-- Table ends -->


                    <div id="rejectModal" class="modal fade" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reject Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="rejectionReason" class="form-label">Enter the reason for rejection:</label>
                <textarea id="rejectionReason" class="form-control" rows="4" placeholder="Enter reason..." required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmReject">Confirm Reject</button>
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
   $(document).ready(function () {
    let selectedPatientId = null;
    let selectedStudentId = null;
    let selectedStudentCsrf = null;
    // Approve Appointment
    $(document).on("click", ".approve-btn", function () {
        selectedPatientId = $(this).data("id");
        selectedStudentId = $(this).data("studentid");
        selectedStudentCsrf = $(this).data("csrf");
        if (confirm("Are you sure you want to approve this Appointment?")) {
        console.log("Approving Appointment:", selectedPatientId, selectedStudentId);

        $.ajax({
            url: "/Clinic-Management-System/Approve_Appointment",
            type: "POST",
            data: { ID: selectedPatientId, student_ID: selectedStudentId, csrf_token: selectedStudentCsrf },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.success) {
                    alert("Appointment Approved!");
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
    }
    });

    // Reject Appointment
    $(document).ready(function () {
    let selectedPatientId = null;
    let selectedStudentId = null;
    let selectedStudentCsrf = null;
    // Open reject modal when Reject button is clicked
    $(document).on("click", ".reject-btn", function () {
        selectedPatientId = $(this).data("id");
        selectedStudentId = $(this).data("studentid");
        selectedStudentCsrf = $(this).data("csrf");
        $("#rejectionReason").val(""); // Clear previous input
        $("#rejectModal").modal("show"); // Show the modal
    });

    // Handle the rejection confirmation
    $("#confirmReject").click(function () {
        let rejectionReason = $("#rejectionReason").val().trim();

        if (rejectionReason === "") {
            alert("Please enter a reason for rejection.");
            return;
        }

        $.ajax({
            url: "/Clinic-Management-System/Reject_Appointment",
            type: "POST",
            data: { 
                ID: selectedPatientId, 
                student_ID: selectedStudentId, 
                reason: rejectionReason,
                csrf_token: selectedStudentCsrf
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Appointment Rejected! Email Sent.");
                    location.reload();
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                alert("An error occurred: " + error);
            }
        });

        $("#rejectModal").modal("hide"); // Close modal after submission
    });

});




    // Delete Patient
    $(document).on("click", ".delete-btn", function () {
        selectedPatientId = $(this).data("id");
        selectedStudentId = $(this).data("studentid");
        selectedStudentCsrf = $(this).data("csrf");
        if (confirm("Are you sure you want to delete this Appointment?")) {
            console.log("Deleting Appointment:", selectedPatientId, selectedStudentId);

            $.ajax({
                url: "/Clinic-Management-System/Delete_Appointment",
                type: "POST",
                data: { ID: selectedPatientId, student_ID: selectedStudentId, csrf_token: selectedStudentCsrf },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        alert("Appointment successfully deleted!");
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
        }
    });
});

    </script>

  </body>



</html>