<?php include __DIR__ . '/../partials/head.php'; ?>
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
            <!-- Fetching data from the database -->
            <?php require 'fetch_all_patient.view.php'; ?>
          <div class="text-center mt-3">
    <input type="text" list="items" id="idInput" class="form-control mb-2" placeholder="Enter ID" required>
    <datalist id="items">
    <?php if (!empty($patients)): ?>
      <?php foreach ($patients as $patient): ?>
      <option value="<?= htmlspecialchars($patient['student_id']) ?>">
      <?php endforeach; ?>
      <?php endif; ?>
    </datalist>
    <button type="button" id="searchButton" class="btn btn-primary">SEARCH FOR PATIENT</button>
          </div>
          
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/update" method="POST" >
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="id" id="a25">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Patient Details</h5>
                  </div>            
                  <div class="card-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
                          <input type="text" name="first_name" class="form-control" id="a1" placeholder="ENTER FIRST NAME" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
                          <input type="text" name="last_name" class="form-control" id="a2" placeholder="ENTER LAST NAME" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a3">DATE OF BIRTH <span class="text-danger">*</span></label>
                          <input name="dob" type="date" class="form-control" id="a3"  required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="selectGender1">Gender <span
                              class="text-danger">*</span></label>
                          <div class="m-0">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="selectGenderOptions" id="selectGender1"
                                value="male" required>
                              <label class="form-check-label" for="selectGender1" required>Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input  class="form-check-input" type="radio" name="selectGenderOptions" id="selectGender2"
                                value="female" required>
                              <label class="form-check-label" for="selectGender2" required>Female</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a4"> ID <span class="text-danger">*</span></label>
                          <input name="Student_ID" type="text" class="form-control" id="a4" placeholder="ENTER ID" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a5">Program <span class="text-danger">*</span></label>
                          <input name="Program" type="text" class="form-control" id="a5" placeholder="ENTER PROGRAM" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a6">Country <span class="text-danger">*</span></label>
                          <input name="Country" type="text" class="form-control" id="a6" placeholder="ENTER COUNTRY" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a7">Mobile Phone<span class="text-danger">*</span></label>
                          <input name="mobPhone" type="tel" class="form-control" id="a7" placeholder="ENTER MOBILE PHONE NUMBER" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a8">Tel Phone <span class="text-danger">*</span></label>
                          <input name="telPhone" type="tel" class="form-control" id="a8" placeholder="ENTER TEL PHONE" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a9">Email <span class="text-danger">*</span></label>
                          <input name="EMAIL" type="email" class="form-control" id="a9" placeholder="ENTER EMAIL" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a10">Marital Status</label>
                          <select name="marital_status" class="form-select" id="a10" required>
                            <option value="0">Select</option>
                            <option value="Married">Married</option>
                            <option value="UnMarried">Un Married</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a11">Blood Group <span class="text-danger">*</span></label>
                          <select  name="Blood-Group" class="form-select" id="a11" required>
                            <option value="0">Select</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="0+">O+</option>
                            <option value="0-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a12">Blood Pressure <span class="text-danger">*</span></label>
                          <input name="Blood-Pressure" type="text" class="form-control" id="a12" placeholder="ENTER BLOOD PRESSURE" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a13">Sugar Level <span class="text-danger">*</span></label>
                          <input name="Sugar-Level" type="text" class="form-control" id="a13" placeholder="ENTER SUGAR LEVELS" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a14">TEMPERATURE<span class="text-danger">*</span></label>
                          <input name="TEMPERATURE" type="text" class="form-control" id="a14" placeholder="ENTER TEMPERATURE LEVELS" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a15">PULSE<span class="text-danger">*</span></label>
                          <input name="PULSE" type="text" class="form-control" id="a15" placeholder="ENTER PULSE" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a16">RESP<span class="text-danger">*</span></label>
                          <input name="RESP" type="text" class="form-control" id="a16" placeholder="ENTER RESP LEVELS" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a17">SPO2<span class="text-danger">*</span></label>
                          <input name="SPO2" type="text" class="form-control" id="a17" placeholder="ENTER SPO2" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a18">Address <span class="text-danger">*</span></label>
                          <input name="Address" type="text" class="form-control" id="a18" placeholder="ENTER ADDRESS" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a19">Symptoms <span class="text-danger">*</span></label>
                          <textarea name="Symptoms" type="text" class="form-control" id="a19" placeholder="ENTER SYMPTOMS" required></textarea>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a20">Medical History <span class="text-danger">*</span></label>
                          <textarea name="Medical-History" type="text" class="form-control" id="a20" placeholder="ENTER MEDICAL HISTORY" required></textarea>
                        </div>
                      </div>
                     
                      
                    </div>
                    <!-- Row ends -->

                  </div>

                  <div class="card-header">
                    <h5 class="card-title">Prescription</h5>
                  </div>
                  <div class="card-body">
               <!-- Row starts -->
                   <div class="row gx-3">
  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a21">Treatment <span class="text-danger">*</span></label>
      <input name="Treatment" data-bs-title="Please Visit Add New Prescription Page" type="text" class="form-control" id="a21" placeholder="ENTER TREATMENT" required readonly>
    </div>
  </div>
  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a22">Drug Name<span class="text-danger">*</span></label>
      <input name="Drug-Name" type="text" class="form-control" id="a22" placeholder="ENTER DRUG NAME" required readonly>
    </div>
  </div>
  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a23">Dosage<span class="text-danger">*</span></label>
      <textarea name="Dosage" type="text" class="form-control" id="a23" placeholder="ENTER DOSAGE" required readonly></textarea>
    </div>
  </div>
  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a24">Notes</label>
      <textarea name="Notes" type="text" class="form-control" id="a24" placeholder="ENTER NOTES" readonly></textarea>
    </div>
  </div>
 
 

  <div class="col-sm-12">
    <div class="d-flex gap-2 justify-content-end">
      <a href="" type="button" class="btn btn-outline-secondary">
        Cancel
      </a>
      <button type="submit" id="Save&Prescribe" class="btn btn-primary">
        Update details
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

            <!-- Modal Delete Row -->
            <!-- <div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="delRowLabel">
                      Are you sure?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete this report?
                  </div>
                  <div class="modal-footer">
                    <div class="d-flex justify-content-end gap-2">
                      <button class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
                      <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Yes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

          </div>
          <!-- App body ends -->

      

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

    <?php include __DIR__ . '/../partials/footer.php' ?>

    <script>
      document.getElementById("searchButton").addEventListener("click", function () {
    let idNumber = document.getElementById("idInput").value;

    fetch(`/Clinic-Management-System/Edit?studentID=${encodeURIComponent(idNumber)}`, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())  
    .then(data => {
        console.log(data);  
        if (data.success) {
          document.getElementById("a1").value = data.firstname;
            document.getElementById("a2").value = data.lastname;

            // Format the birthdate if needed
            let formattedDate = data.birthdate ? new Date(data.birthdate).toISOString().split('T')[0] : "";
            document.getElementById("a3").value = formattedDate;

            document.getElementById("a4").value = data.student_id;
            document.getElementById("a5").value = data.program;
            document.getElementById("a6").value = data.country;
            document.getElementById("a7").value = data.phone1;
            document.getElementById("a8").value = data.phone2;
            document.getElementById("a9").value = data.email;

            
            if (data.gender === "male") {
                document.getElementById("selectGender1").checked = true;
            } else if (data.gender === "female") {
                document.getElementById("selectGender2").checked = true;
            }

            
            if (data.marital_status) {
                document.getElementById("a10").value = data.marital_status;
            }

            
            if (data.blood_group) {
                document.getElementById("a11").value = data.blood_group;
            }

            
            document.getElementById("a12").value = data.blood_pressure || "";
            document.getElementById("a13").value = data.sugar_level || "";
            document.getElementById("a14").value = data.temperature || "";
            document.getElementById("a15").value = data.pulse || "";
            document.getElementById("a16").value = data.resp || "";
            document.getElementById("a17").value = data.spo2 || "";
            document.getElementById("a18").value = data.address || "";
            document.getElementById("a19").value = data.symptoms || "";
            document.getElementById("a20").value = data.medical_history || "";

            
            document.getElementById("a21").value = data.treatment || "";
            document.getElementById("a22").value = data.drug_name || "";
            document.getElementById("a23").value = data.dosage || "";
            document.getElementById("a24").value = data.notes || "";
            document.getElementById("a25").value = data.id || "";
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});
  
  
  </script>
  



</html>