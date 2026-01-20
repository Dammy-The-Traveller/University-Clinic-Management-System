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
          <?php require 'fetch_all_drug.view.php'; ?>
          <div class="text-center mt-3">
    <input list="items" type="text" id="idInput" class="form-control mb-2" placeholder="Enter Drug ID" required>
    <datalist id="items">
    <?php if (!empty($newDrugs)): ?>
      <?php foreach ($newDrugs as $newDrug): ?>
      <option value="<?= htmlspecialchars($newDrug['indexnumber']) ?>">
      <?php endforeach; ?>
      <?php endif; ?>
    </datalist>
    <button type="button" id="searchButton" class="btn btn-primary">SEARCH FOR DRUG</button>
    <br> <br>
          </div>
          
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/updateDrug" method="POST" >
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="id" id="a10">
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
                          <label class="form-label" for="a1">Drug ID</label>
                          <input type="number" name="IndexNumber"  class="form-control" id="a1" placeholder="Enter Drug ID" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a2">Drug Name <span class="text-danger">*</span></label>
                          <input name="DrugName" type="text" class="form-control" id="a2" placeholder="ENTER DRUG NAME" required>
                        </div>
                      </div>
                     
                   

                      <!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
                      <div class="mb-3">
          <label for="drugCategory" for="a3" class="form-label">Drug Category <span class="text-danger">*</span></label>
            <select class="form-select" name="DrugCategory" id="a3" required>
    <option value="">-- Select Drug Category --</option>
    <option value="Analgesics">Analgesics (Pain Relievers)</option>
    <option value="Antibiotics">Antibiotics / Antibacterials</option>
    <option value="Antivirals">Antivirals</option>
    <option value="Antifungals">Antifungals</option>
    <option value="Antimalarials">Antimalarials</option>
    <option value="Antipyretics">Antipyretics (Fever Reducers)</option>
    <option value="Antihypertensives">Antihypertensives</option>
    <option value="Antidiabetics">Antidiabetics</option>
    <option value="Antidepressants">Antidepressants</option>
    <option value="Antipsychotics">Antipsychotics</option>
    <option value="Anticonvulsants">Anticonvulsants (Anti-seizure)</option>
    <option value="Sedatives">Sedatives & Hypnotics</option>
    <option value="Antacids">Antacids / Anti-ulcer Agents</option>
    <option value="Bronchodilators">Bronchodilators</option>
    <option value="Antiemetics">Antiemetics (Prevent Vomiting)</option>
    <option value="Laxatives">Laxatives / Purgatives</option>
    <option value="Contraceptives">Contraceptives</option>
    <option value="Vitamins">Vitamins & Supplements</option>
    <option value="Steroids">Steroids</option>
    <option value="Local Anesthetics">Local Anesthetics</option>
    <option value="Vaccines">Vaccines</option>
  </select>
</div>
</div> -->

<div class="col-xxl-3 col-lg-4 col-sm-6">
                      <div class="mb-3">
                      <?php require 'fetch_all_drug_category.view.php'; ?>
          <label for="drugCategory" for="a3" class="form-label">Drug Category <span class="text-danger">*</span></label>
            <select class="form-select" name="DrugCategory" id="a3" required>
    <option value="">-- Select Drug Category --</option>
    <?php if (!empty($DrugsCategories)): ?>
      <?php foreach ($DrugsCategories as $DrugsCategory): ?>
    <option value="<?= htmlspecialchars($DrugsCategory['category']) ?>"><?= htmlspecialchars($DrugsCategory['category']) ?></option>
    <?php endforeach; ?>
    <?php endif; ?>
  </select>
</div>
</div>

                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a4">Drug Form<span class="text-danger">*</span></label>
                          <input name="DrugForm" type="text" class="form-control" id="a4" placeholder="E.g., Tablet, Syrup, Injection, Cream" required>
                        </div>
                      </div>

                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a5">Strength<span class="text-danger">*</span></label>
                          <input name="strength" type="text" class="form-control" id="a5" placeholder="E.g., 500mg, 10ml, 100mg/mL" required>
                        </div>
                      </div>


                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a6">Quantity<span class="text-danger">*</span></label>
                          <input name="Quantity" type="text" class="form-control" id="a6" placeholder="ENTER QUANTITY" required>
                        </div>
                      </div>
    
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a7">Unit Price<span class="text-danger">*</span></label>
                          <input name="BulkPrice" type="text" class="form-control" id="a7" placeholder="Price Per Pack" required>
                        </div>
                      </div>
  
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a8">Amount <span class="text-danger">*</span></label>
                          <input name="amount" type="text" class="form-control" id="a8" placeholder="Amount" required>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a9">Manufacturer<span class="text-danger">*</span></label>
                          <input name="manufacturer" type="text" class="form-control" id="a9" placeholder="Enter Manufacturer" required>
                        </div>
                      </div>

  <div class="col-sm-12">
    <div class="d-flex gap-2 justify-content-end">
      <a href="" type="button" class="btn btn-outline-secondary">
        Cancel
      </a>
      <button type="submit" id="Save&Prescribe" class="btn btn-primary">
        Update Details
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

    <script>
      document.getElementById("searchButton").addEventListener("click", function () {
    let idNumber = document.getElementById("idInput").value;

    console.log(idNumber); // Log the ID number to the console for debugging
    fetch(`/Clinic-Management-System/SearchDrug?ID=${encodeURIComponent(idNumber)}`, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())  
    .then(data => {
        console.log(data);  
        if (data.success) {
          document.getElementById("a1").value = data.indexnumber;
            document.getElementById("a2").value = data.drugname;

            document.getElementById("a3").value = data.drugcategory || "";
            document.getElementById("a4").value = data.drugform || "";
            document.getElementById("a5").value = data.strength || "";
            document.getElementById("a6").value = data.quantity || "";
            document.getElementById("a7").value = data.unitprice || "";
            document.getElementById("a8").value = data.amount || "";
            document.getElementById("a9").value = data.manufacturer || "";
            document.getElementById("a10").value = data.id || ""; // Assuming 'id' is the correct field name
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});
  
  
  </script>
  



</html>