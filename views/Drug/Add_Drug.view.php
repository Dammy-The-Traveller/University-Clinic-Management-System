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


            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <button type="button" 
    style="margin-left:80rem;" 
    class="btn btn-info" 
    data-bs-toggle="modal" 
    data-bs-target="#DrugModal">
    <i class="ri-sticky-note-add-line"></i> Add New Drug Category
</button>
<br> <br>

              <form class="mt-8 space-y-6" action="/Clinic-Management-System/add" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Add New Drugs</h5>
                  </div>            
                  <div class="card-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a1">Drug ID</label>
                          <input type="number" name="IndexNumber" value="<?= generateDrugIndex(); ?>" class="form-control" id="a1" placeholder="ENTER INDEX NUMBER" required readonly>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a2">Drug Name <span class="text-danger">*</span></label>
                          <input name="DrugName" type="text" class="form-control" id="a2" placeholder="ENTER DRUG NAME" required>
                        </div>
                      </div>
                     
                   

                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                      <div class="mb-3">
                      <?php require 'fetch_all_drug_category.view.php'; ?>
          <label for="drugCategory" for="a4" class="form-label">Drug Category <span class="text-danger">*</span></label>
            <select class="form-select" name="DrugCategory" id="a4" required>
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
                          <label class="form-label" for="a5">Drug Form<span class="text-danger">*</span></label>
                          <input name="DrugForm" type="text" class="form-control" id="a5" placeholder="E.g., Tablet, Syrup, Injection, Cream" required>
                        </div>
                      </div>

                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a6">Strength<span class="text-danger">*</span></label>
                          <input name="strength" type="text" class="form-control" id="a6" placeholder="E.g., 500mg, 10ml, 100mg/mL" required>
                        </div>
                      </div>


                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a7">Quantity<span class="text-danger">*</span></label>
                          <input name="Quantity" type="text" class="form-control" id="a7" placeholder="ENTER QUANTITY" required>
                        </div>
                      </div>
    
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a8">Unit Price<span class="text-danger">*</span></label>
                          <input name="BulkPrice" type="text" class="form-control" id="a8" placeholder="Price Per Pack" required>
                        </div>
                      </div>
  
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a9">Amount <span class="text-danger">*</span></label>
                          <input name="amount" type="text" class="form-control" id="a9" placeholder="Price Per Pack" required>
                        </div>
                      </div>

                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a10">Manufacturer<span class="text-danger">*</span></label>
                          <input name="manufacturer" type="text" class="form-control" id="a10" placeholder="Enter Manufacturer" required>
                        </div>
                      </div>

  <div class="col-sm-12">
    <div class="d-flex gap-2 justify-content-end">
      <a href="" type="button" class="btn btn-outline-secondary">
        Cancel
      </a>
      <button type="submit" id="Save&Prescribe" class="btn btn-primary">
        Save
      </button>
    </div>
  </div>
                    </div>
                    <!-- Row ends -->


                     <!-- Modal add drug Category Row -->
                     <div id="DrugModal" class="modal fade" tabindex="-1" aria-labelledby="DrugModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DrugModalLabel">Add Drug Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="DrugCategory" class="form-label">Enter the Category:</label>
                <input id="DrugCategory"   type="text" class="form-control" rows="4" placeholder="Enter Drug category...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDrug">Submit</button>
            </div>
        </div>
                        </div>

                    </div>

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
 
    
 $(document).ready(function () {
    if ($("#DrugModal").length && $("#DrugCategory").length) {
        $("#DrugCategory").val(""); 
    }

    $("#confirmDrug").click(function () {
        let DrugsCategory = $("#DrugCategory").val().trim();

        if (DrugsCategory === "") {
            alert("Please enter a category.");
            return;
        }

        $.ajax({
            url: "/Clinic-Management-System/addDrugCategory",
            type: "POST",
            data: { category: DrugsCategory },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Drug Category Added.");
                    $("#DrugModal").modal("hide");
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
    });
});



     </script>
  </body>



</html>