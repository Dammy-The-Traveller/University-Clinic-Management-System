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
                  <?php require 'fetch_all_prescription.view.php'; ?>
          <div class="text-center mt-3">
          <input type="text" list="items" id="idInput" class="form-control mb-2" placeholder="Enter ID">
          <datalist id="items">
    <?php if (!empty($Patients)): ?>
      <?php foreach ($Patients as $Patient): ?>
      <option value="<?= htmlspecialchars($Patient['student_id']) ?>">
      <?php endforeach; ?>
      <?php endif; ?>
    </datalist>
          <button type="button" id="searchButton" class="btn btn-primary">SEARCH FOR PRESCRIPTION</button>
    
   
</div>
<br><br>
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/updatePrescription" method="POST">
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="id" id="a19">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Add New Prescription</h5>
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
                          <label class="form-label" for="a4">ID <span class="text-danger">*</span></label>
                          <input name="Student_ID" type="text" class="form-control" id="a4" placeholder="ENTER STUDENT ID" required readonly>
                        </div>
                      </div>
                     
                   
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a7">Email <span class="text-danger">*</span></label>
                          <input name="EMAIL" type="email" class="form-control" id="a7" placeholder="ENTER EMAIL" required>
                        </div>
                      </div>
    
                     
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a14">Treatment <span class="text-danger">*</span></label>
      <input name="Treatment" type="text" class="form-control" id="a14" placeholder="ENTER TREATMENT" required>
    </div>
  </div>
  <!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a15">Drug Name<span class="text-danger">*</span></label>
      <input name="Drug-Name" type="text" class="form-control" id="a15" placeholder="ENTER DRUG NAME" required>
    </div>
  </div> -->

  <!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="mb-3">
          <label class="form-label" for="a15">Drug<span class="text-danger">*</span></label>
            <select class="form-select" name="Drug-Index" id="a15" required>
        <option value="">-- Select Drug --</option>

  </select>
</div>
</div> -->

<!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
                      <div class="mb-3">
                      <?php require 'fetch_all_drug.view.php'; ?>
          <label class="form-label" for="a15">Drug<span class="text-danger">*</span></label>
            <select class="form-select" name="Drug-Name" id="a15" required>
    <option value="">-- Select Drug --</option>
    <?php if (!empty($Drugs)): ?>
      <?php foreach ($Drugs as $Drug): ?>
    <option value="<?= htmlspecialchars($Drug['drugname']) ?>"><?= htmlspecialchars($Drug['drugname']) ?>
    <input type="hidden" name="DrugName" value="<?= htmlspecialchars($Drug['drugname']) ?>">
  </option>
    <?php endforeach; ?>
    <?php endif; ?>
  </select>
</div>
</div> -->

<div class="col-xxl-3 col-lg-4 col-sm-6">
                      <div class="mb-3">
                      <?php require 'fetch_all_drug.view.php'; ?>
          <label class="form-label" for="a15">Drug<span class="text-danger">*</span></label>
          <select class="form-select" name="DrugName" id="a15" required>
  <option value="">-- Select Drug --</option>
  <?php foreach ($Drugs as $Drug): ?>
    <option value="<?= htmlspecialchars($Drug['drugname']) ?>" 
            data-index="<?= htmlspecialchars($Drug['indexnumber']) ?>">
      <?= htmlspecialchars($Drug['drugname']) ?>
    </option>
  <?php endforeach; ?>
</select>
<input type="hidden" name="DrugIndex" id="a20">
</div>
</div>


<div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a21">Quantity<span class="text-danger">*</span></label>
      <input name="Quantity" type="text" class="form-control" id="a21" placeholder="ENTER DRUG QUANTITY" required></input>
    </div>
  </div>

  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a16">Dosage<span class="text-danger">*</span></label>
      <textarea name="Dosage" type="text" class="form-control" id="a16" placeholder="ENTER DOSAGE" required></textarea>
    </div>
  </div>
  <div class="col-xxl-3 col-lg-4 col-sm-6">
    <div class="mb-3">
      <label class="form-label" for="a17">Notes</label>
      <textarea name="Notes" type="text" class="form-control" id="a17" placeholder="ENTER NOTES" required></textarea>
    </div>
  </div>

  <div class="col-sm-12">
    <div class="d-flex gap-2 justify-content-end">
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
      document.getElementById("searchButton").addEventListener("click", function () {
    let idNumber = document.getElementById("idInput").value;

    fetch(`/Clinic-Management-System/Search-For-Prescription?idnumber=${encodeURIComponent(idNumber)}`, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())  
    .then(data => {
       // console.log(data);  
        if (data.success) {
          document.getElementById("a1").value = data.firstname;
            document.getElementById("a2").value = data.lastname;

            

            document.getElementById("a4").value = data.student_id;
           
            document.getElementById("a7").value = data.email;

            
     

            document.getElementById("a14").value = data.treatment || "";
            const select = document.getElementById("a15");
const hiddenInput = document.getElementById("a20");

select.value = data.drug_name || "";

// After setting the value, find the selected option and extract its indexnumber
const selectedOption = [...select.options].find(option => option.value === data.drug_name);
if (selectedOption) {
  hiddenInput.value = selectedOption.getAttribute("data-index") || "";
} else {
  hiddenInput.value = "";
}

            console.log(document.getElementById("a20"));
            document.getElementById("a21").value = data.quantity || "";
            document.getElementById("a16").value = data.dosage || "";
            document.getElementById("a17").value = data.notes || "";
            document.getElementById("a19").value = data.id || "";
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});

     </script>
  </body>



</html>