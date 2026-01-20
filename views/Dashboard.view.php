<?php 


require('fetch_patients_num.php') ?>
<?php require('partials/head.php') ?>
  <body>
     <!-- Loading starts -->
  <?php require('partials/Spin.php') ?>
  <!-- Loading ends -->


    <!-- Page wrapper starts -->
  <div class="page-wrapper">

    <!-- App header start -->
    <?php require('partials/header.php') ?>
<!-- App header ends -->


      <!-- Main container starts -->
      <div class="main-container">

     <!-- Sidebar wrapper starts -->
      <?php require('partials/Sidenav.php') ?>
      <!-- Sidebar wrapper ends -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App hero header starts -->
          <?php require('partials/TopNav.php') ?>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

         <!-- Row starts -->
         <div class="row gx-3">
              <div class="col-xxl-12 col-sm-12">
                <div class="card mb-3 bg-2">
                  <div class="card-body">
                    <div class="py-4 px-3 text-white">
                      <h6><?= $greeting; ?>,</h6>
                      <h2>Dr. <?=  $logged_user_firstname .' '. $logged_user_lastname ?></h2>
                      <h5>Your schedule today.</h5>
                      <div class="mt-4 d-flex gap-3">
                        <div class="d-flex align-items-center">
                          <div class="icon-box lg bg-arctic rounded-3 me-3">
                            <i class="ri-surgical-mask-line fs-4"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h2 class="m-0 lh-1"><?= $uniqueStudentCount['total_unique_students'] ?></h2>
                            <p class="m-0">Patients</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="icon-box lg bg-lime rounded-3 me-3">
                            <i class="ri-surgical-mask-line fs-4"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h2 class="m-0 lh-1"><?=  $uniqueAppointmentCount['total_unique_appointment'] ?></h2>
                            <p class="m-0">Appointments</p>
                          </div>
                        </div>
                   
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="p-2 border border-success rounded-circle me-3">
                        <div class="icon-box md bg-success-subtle rounded-5">
                          <i class="ri-surgical-mask-line fs-4 text-success"></i>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <h2 class="lh-1"><?= $uniqueStudentCount['total_unique_students'] ?></h2>
                        <p class="m-0">New Prescription</p>
                      </div>
                    </div>
                    <br>
                    <div class="d-flex align-items-end justify-content-between mt-1">
                      <a class="text-success" href="/Clinic-Management-System/Prescription-List">
                        <span>View All</span>
                        <i class="ri-arrow-right-line text-success ms-1"></i>
                      </a>
                   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="p-2 border border-primary rounded-circle me-3">
                        <div class="icon-box md bg-primary-subtle rounded-5">
                          <i class="ri-lungs-line fs-4 text-primary"></i>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <h2 class="lh-1"><?= $uniqueOldPrescriptionCount['total_unique_old_prescription'] ?></h2>
                        <p class="m-0">Old Prescription</p>
                      </div>
                    </div>
                    <br>
                    <div class="d-flex align-items-end justify-content-between mt-1">
                      <a class="text-primary" href="/Clinic-Management-System/Prescription-List">
                        <span>View All</span>
                        <i class="ri-arrow-right-line ms-1"></i>
                      </a>
                   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="p-2 border border-danger rounded-circle me-3">
                        <div class="icon-box md bg-danger-subtle rounded-5">
                          <i class="ri-microscope-line fs-4 text-danger"></i>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                      <h2 class="lh-1"><?= $uniqueAppointmentCountRejected['total_unique_rejected_appointment'] ?></h2>
                        <p class="m-0">Rejected Appointment</p>
                      </div>
                    </div>
                    
                    <br>
                    <div class="d-flex align-items-end justify-content-between mt-1">
                      <a class="text-danger" href="/Clinic-Management-System/Appointments-List">
                        <span>View All</span>
                        <i class="ri-arrow-right-line ms-1"></i>
                      </a>
                   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="p-2 border border-warning rounded-circle me-3">
                        <div class="icon-box md bg-warning-subtle rounded-5">
                          <i class="ri-money-dollar-circle-line fs-4 text-warning"></i>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                      <h2 class="lh-1"><?= $uniqueAppointmentCountApproved['total_unique_approved_appointment'] ?></h2>
                       
                        <p class="m-0">Approved Appointment</p>
                      </div>
                    </div>
                    <br>
                    <div class="d-flex align-items-end justify-content-between mt-1">
                      <a class="text-warning" href="/Clinic-Management-System/Appointments-List">
                        <span>View All</span>
                        <i class="ri-arrow-right-line ms-1"></i>
                      </a>
                    
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row gx-3">
            <div class="col-xxl-12 col-sm-12">
                <div class="card mb-3 bg-lime">
                  <div class="card-body">
                    <div class="mh-230 text-white">
                      <h5>Patient Activity Per Week</h5>
                      <div class="text-body chart-height-md">
                        <div id="dacActivity"></div>
                      </div>
                      <div class="text-center">
                      <span id="percentageBadge" class="badge bg-danger">0%</span>
                       <br>
                       <span id="percentageText">patients are higher<br>than last week.</span>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Appointments</h5>
                  </div>
                  <div class="card-body">
                    <!-- Table starts -->
                    <?php require 'Appointments/fetch_appointment.view.php'; ?>
                    <div class="table-responsive">
                      <table id="appointmentsGrid" class="table m-0 align-middle">
                        <thead>
                          <tr>
                            <th>Student ID</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Program</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Problem</th>
                            <th>Appointment Status</th>
                           
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
                              <td><?= htmlspecialchars($appointmentList['program']) ?></td>
                               <td><?= htmlspecialchars($appointmentList['date']) ?></td>
                               <?php 
    $storedTime = $appointmentList['time']; 
    $formattedTime = date("h:i A", strtotime($storedTime));
 ?>
                              <td><?= htmlspecialchars($formattedTime) ?></td>
                             <td><?= htmlspecialchars($appointmentList['problem']) ?></td>
                              <td><?= htmlspecialchars($appointmentList['status']) ?></td>
                        </tr>
                              <?php endforeach; ?>
                             <?php endif; ?>
                      </tbody>
                      </table>
                    </div>
                  </div>
                    <!-- Table ends -->

                </div>
            </div>
          


                <div class="col-xxl-6 col-sm-6">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Urgent Appointments</h5>
                  </div>
                  <div class="card-body">

                    <div class="scroll300">
                      <div class="d-flex flex-column gap-2">
                      
                      <?php if (!empty($UrgentAppointmentLists)): ?>
                        <?php foreach ($UrgentAppointmentLists as $UrgentAppointmentList): ?>
                        <div class="p-3 border rounded-2">
                          <div class="text-center mb-3">
                            
                            <p class="m-0"><b><?= $UrgentAppointmentList['fullname'] ?></b> need an appointment urgently.</p>
                          </div>
                          <div class="text-center gap-2">
                          <button class="btn btn-secondary btn-sm reject-btn" 
                             data-id="<?= $UrgentAppointmentList['id'] ?>" 
                            data-studentId="<?= $UrgentAppointmentList['student_id'] ?>"
                             data-bs-toggle="tooltip" 
                             data-bs-placement="top"
                            data-bs-title="Decline Appointment">
                            Decline
                            </button>
                           
                            <button class="btn btn-primary btn-sm approve-btn"
            data-id="<?= $UrgentAppointmentList['id'] ?>" 
            data-studentId="<?= $UrgentAppointmentList['student_id'] ?>"
            data-bs-toggle="tooltip"  
            data-bs-placement="top"
             data-bs-title="Accept Appointment">
                          Accept
                            </button>        
                          </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- <div class="p-3 border rounded-2">
                          <div class="text-center mb-3">
                            <img loading="lazy" src="Public/assets/images/patient5.png" class="img-4x rounded-5 mb-3" alt="Medical Dashboard">
                            <p class="m-0">Need an appointment urgent.</p>
                          </div>
                          <div class="text-center gap-2">
                            <button class="btn btn-secondary btn-sm">Decline</button>
                            <a href="appointments-list.html" class="btn btn-primary btn-sm">
                              Accept
                            </a>
                          </div>
                        </div>
                        <div class="p-3 border rounded-2">
                          <div class="text-center mb-3">
                            <img loading="lazy" src="Public/assets/images/patient4.png" class="img-4x rounded-5 mb-3" alt="Medical Dashboard">
                            <p class="m-0">Need an appointment urgent.</p>
                          </div>
                          <div class="text-center gap-2">
                            <button class="btn btn-secondary btn-sm">Decline</button>
                            <a href="appointments-list.html" class="btn btn-primary btn-sm">
                              Accept
                            </a>
                          </div>
                        </div> -->
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xxl-6 col-sm-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Patients Per Month</h5>
                  </div>
                  <div class="card-body">

                    <div class="card-info bg-light lh-1 percent">
                      0% higher than last year.
                    </div>
                    <div id="patients"></div>

                  </div>
                </div>
              </div>
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
            <!-- Row ends -->

          </div>
          <!-- App body ends -->

        

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->


    <?php require('partials/footer.php') ?>
 
 <!-- Apex Charts -->
 
 <script src="Public/assets/vendor/apex/apexcharts.min.js"></script>

 <script src="Public/assets/vendor/apex/custom/dashboard2/activity.js?v=<?php echo time(); ?>"></script>

 <script src="Public/assets/vendor/apex/custom/home/patients.js?v=<?php echo time(); ?>"></script>
   




    <!-- <script src="Public/assets/vendor/rating/raty.js"></script>
    <script src="Public/assets/vendor/rating/raty-custom.js"></script> -->
    <script>

        // Approve Appointment
    $(document).on("click", ".approve-btn", function () {
        selectedPatientId = $(this).data("id");
        selectedStudentId = $(this).data("studentid");

        if (confirm("Are you sure you want to accept this Appointment?")) {
        console.log("Approving Appointment:", selectedPatientId, selectedStudentId);

        $.ajax({
            url: "/Clinic-Management-System/Approve_Appointment",
            type: "POST",
            data: { ID: selectedPatientId, student_ID: selectedStudentId },
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

    // Open reject modal when Reject button is clicked
    $(document).on("click", ".reject-btn", function () {
        selectedPatientId = $(this).data("id");
        selectedStudentId = $(this).data("studentid");

        $("#rejectionReason").val(""); // Clear previous input
        $("#rejectModal").modal("show"); // Show the modal
    });

    // Handle the rejection confirmation
    $("#confirmReject").click(function () {
        let rejectionReason = $("#rejectionReason").val().trim();

        if (rejectionReason === "") {
            alert("Please enter a reason for declining.");
            return;
        }

        $.ajax({
            url: "/Clinic-Management-System/Reject_Appointment",
            type: "POST",
            data: { 
                ID: selectedPatientId, 
                student_ID: selectedStudentId, 
                reason: rejectionReason 
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



    </script>
  </body>


</html>