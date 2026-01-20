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
          <!-- Fetching data from the database -->
          <?php require 'fetch_all_patient.view.php'; ?>
      
          <div class="text-center mt-3">
    <input type="text" list="items" id="idInput" class="form-control mb-2" placeholder="Enter Student ID" required>
    <datalist id="items">
    <?php if (!empty($studentIDs)): ?>
      <?php foreach ($studentIDs as $studentID): ?>
      <option value="<?= htmlspecialchars($studentID['idnumber']) ?>">
      <?php endforeach; ?>
      <?php endif; ?>
    </datalist>
    <button type="button" id="searchButton" class="btn btn-primary">SEARCH FOR STUDENT</button>
          </div>
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/Prescribe" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="card">

                  <div class="card-header">
                    <h5 class="card-title">Add Patient Details</h5>
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
                          <label class="form-label" for="a4">Student ID <span class="text-danger">*</span></label>
                          <input name="Student_ID" type="text" class="form-control" id="a4" placeholder="ENTER STUDENT ID" required readonly>
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

  <!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
                      <div class="mb-3">
                      <?php require 'fetch_all_drug.view.php'; ?>
          <label class="form-label" for="a22">Drug<span class="text-danger">*</span></label>
            <select class="form-select" name="Drug-Index" id="a22" required>
    <option value="">-- Select Drug --</option>
    <?php if (!empty($Drugs)): ?>
      <?php foreach ($Drugs as $Drug): ?>
    <option value="<?= htmlspecialchars($Drug['indexnumber']) ?>"><?= htmlspecialchars($Drug['drugname']) ?>
  </option>
    <?php endforeach; ?>
    <?php endif; ?>
  </select>
  <input type="hidden" name="DrugName" value="<?= htmlspecialchars($Drug['drugname']) ?>">
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
 
  <!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a18">Upload your health reports Here</label>
      <h5>Upload your health reports Here</h5>
      <input name="picture" type="file" class="form-control">
    </div>
  </div> -->

<!-- <div class="col-sm-12">
    <div id="dropzone" class="mb-3">
      <form action="https://bootstrapget.com/upload" class="dropzone dz-clickable" id="demo-upload">
        <div class="dz-message">
          <button type="button" class="dz-button">
            Click here to upload or Drop your reports here.</button>
          <h5>Upload your health reports.</h5>
        </div>
      </form>
    </div>
  </div> -->

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

document.getElementById("searchButton").addEventListener("click", function () {
    let idNumber = document.getElementById("idInput").value;

    fetch(`/Clinic-Management-System/Search-For-Student?idnumber=${encodeURIComponent(idNumber)}`, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())  
    .then(data => {
       // console.log(data);  
        if (data.success) {
            document.getElementById("a1").value = data.firstname;
            document.getElementById("a2").value = data.lastname;
            let birthdateParts = data.birthdate.split("/");
            let formattedDate = `${birthdateParts[2]}-${birthdateParts[0].padStart(2, '0')}-${birthdateParts[1].padStart(2, '0')}`;
            document.getElementById("a3").value = formattedDate;
            document.getElementById("a4").value = data.idnumber;
            document.getElementById("a5").value = data.program;
            document.getElementById("a6").value = data.country;
            document.getElementById("a7").value = data.phone1;
            document.getElementById("a8").value = data.phone2;
            document.getElementById("a9").value = data.email;
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});


// function verifyEmail() {
//   const email = document.getElementById("a9").value;

//   if (!email) {
//     alert("Please enter an email address first.");
//     return;
//   }

//   fetch(`/Clinic-Management-System/verify_email?email=${encodeURIComponent(email)}`,{
//   method: "GET",
//   headers: { "Content-Type": "application/json" }
// })
//     .then(response => response.json())
//     .then(data => {
//       if (data.valid) {
//         alert("Email is valid and reachable.");
//       } else {
//         alert("This email appears to be invalid or unreachable. Please check again.");
//       }
//     })
//     .catch(error => {
//       console.error("Error verifying email:", error);
//       alert("Something went wrong while verifying the email.");
//     });
// }


</script>

  </body>



</html>