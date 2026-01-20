<?php include __DIR__ . '/../partials/head.php'; ?>
  <!-- Uploader CSS -->
  <link rel="stylesheet" href="Public/assets/vendor/dropzone/dropzone.min.css">
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

      
          <!-- <div class="text-center mt-3">
    <input type="text" id="idInput" class="form-control mb-2" placeholder="Enter Student ID" required>
    <button type="button" id="searchButton" class="btn btn-primary">SEARCH FOR STUDENT</button>
          </div> -->
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/Prescribe" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="card">

                  <div class="card-header">
                    <h5 class="card-title">Add Staff Details</h5>
                  </div>            
                  <div class="card-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
                          <input type="text" name="first_name" class="form-control" id="a1" placeholder="ENTER FIRST NAME" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
                          <input type="text" name="last_name" class="form-control" id="a2" placeholder="ENTER LAST NAME" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a3">DATE OF BIRTH <span class="text-danger">*</span></label>
                          <input name="dob" type="date" class="form-control" id="a3"  required>
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
                          <label class="form-label" for="a4">Staff ID <span class="text-danger">*</span></label>
                          <input name="Student_ID" type="text" value="<?= generateStaffIndex() ?>" class="form-control" id="a4" placeholder="ENTER STUDENT ID" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6" style="display: none;">
                        <div class="mb-3">
                          <label class="form-label" for="a5">Program <span class="text-danger">*</span></label>
                          <input name="Program" value="staff" type="text" class="form-control" id="a5" placeholder="ENTER PROGRAM">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a6">Country <span class="text-danger">*</span></label>
                          <input name="Country" type="text" class="form-control" id="a6" placeholder="ENTER COUNTRY" required>
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
                      <?php if(isset($errors['email'])):?>
                <p style="color:red" class= "text-center"><?=$errors['email'] ?></p>
                <?php endif; ?>
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
                          <label class="form-label" for="a13">Sugar Level<span class="text-danger">*</span></label>
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
      <input name="Treatment" type="text" class="form-control" id="a21" placeholder="ENTER TREATMENT" required>
    </div>
  </div>
  <!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a22">Drug Name<span class="text-danger">*</span></label>
      <input name="Drug-Name" type="text" class="form-control" id="a22" placeholder="ENTER DRUG NAME" required>
    </div>
  </div> -->



<div class="col-xxl-3 col-lg-4 col-sm-6">
                      <div class="mb-3">
                      <?php require 'fetch_all_drug.view.php'; ?>
          <label class="form-label" for="a22">Drug<span class="text-danger">*</span></label>
          <select class="form-select" name="DrugName" id="a22" required>
  <option value="">-- Select Drug --</option>
  <?php foreach ($Drugs as $Drug): ?>
    <option value="<?= htmlspecialchars($Drug['drugname']) ?>" 
            data-index="<?= htmlspecialchars($Drug['indexnumber']) ?>">
      <?= htmlspecialchars($Drug['drugname']) ?>
    </option>
  <?php endforeach; ?>
</select>
<input type="hidden" name="DrugIndex" id="a26">
</div>
</div>


  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a23">Dosage<span class="text-danger">*</span></label>
      <textarea name="Dosage" type="text" class="form-control" id="a23" placeholder="ENTER DOSAGE" required></textarea>
    </div>
  </div>

  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a24">Quantity</label>
      <input name="Quantity" type="text" class="form-control" id="a24" placeholder="ENTER QUANTITY" >
    </div>
  </div>

  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a25">Notes</label>
      <textarea name="Notes" type="text" class="form-control" id="a25" placeholder="ENTER NOTES" ></textarea>
    </div>
  </div>
 


  <div class="col-sm-12">
    <div class="d-flex gap-2 justify-content-end">
    <!-- <button type="submit" class="btn btn-primary"  onclick="verifyEmail()">Verify Email</button> -->
      <a href="" type="button" class="btn btn-outline-secondary">
        Cancel
      </a>
      <button type="submit" id="Save&Prescribe" class="btn btn-primary">
        Save & Prescribe
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

 
    <?php include __DIR__ . '/../partials/footer.php' ?>
     <!-- Dropzone JS -->
     <script src="Public/assets/vendor/dropzone/dropzone.min.js"></script>

<script>
  const select = document.getElementById("a22");
const hiddenInput = document.getElementById("a26");

select.addEventListener("change", function () {
  const selectedOption = this.options[this.selectedIndex];
  hiddenInput.value = selectedOption.getAttribute("data-index") || "";
});
</script>

  </body>



</html>