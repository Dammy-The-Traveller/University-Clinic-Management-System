<?php include 'partials/head.php'; ?>

  <body>

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

       <!-- App header start -->
       <?php include 'partials/header.php'; ?>
<!-- App header ends -->

      <!-- Main container starts -->
      <div class="main-container">

     <!-- Sidebar wrapper starts -->
     <?php include 'partials/Sidenav.php'; ?>
      <!-- Sidebar wrapper ends -->

        <!-- App container starts -->
        <div class="app-container">

              <!-- App hero header starts -->
              <?php include 'partials/TopNav.php'; ?>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

          <div class="text-center mt-3">
    
          <input type="text" id="emailInput" class="form-control mb-2"  placeholder="Enter email address">
          <button type="button" id="GenerateToken" class="btn btn-primary">Generate and Send token to User email</button>
          </div>
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Token</h5>
                  </div>
                  <div class="card-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          
                          <input name="fullname" type="text" class="form-control" id="a1" required readonly placeholder="TOKEN">
                         <br>
                          <button type="button" class="btn btn-primary" onclick="copyToken()">Copy To clipboard</button>

                        </div>
                      </div>
     
                    </div>
                    <?php if(isset($errors['email'])):?>
                <p style="color:red" class= "text-center"><?=$errors['email'] ?></p>
                <?php endif; ?>
                    <!-- Row ends -->

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

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required readonly jQuery first, then Bootstrap Bundle JS -->
    <?php include 'partials/footer.php'; ?>

    <script>
document.getElementById("GenerateToken").addEventListener("click", function () {
    let email = document.getElementById("emailInput").value.trim();

    if (!email) {
        alert("Please enter an email address.");
        return;
    }

    const encodedEmail = btoa(email);
    fetch(`/Clinic-Management-System/GenerateToken?email=${encodeURIComponent(encodedEmail)}`, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())  
    .then(data => {
        console.log(data);  
        if (data.success) {
            document.getElementById("a1").value = data.token;
            document.getElementById("GenerateToken").innerText = 'Regenerate and Resend Token';
        } else {
            alert(data.error);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred while generating the token.");
    });
});

function copyToken() {
    var tokenInput = document.getElementById("a1");

    if (!tokenInput.value.trim()) {
        alert("No token to copy! Please generate a token first.");
        return;
    }

    navigator.clipboard.writeText(tokenInput.value)
        .then(() => alert("Token copied to clipboard!"))
        .catch(err => console.error("Error copying token:", err));
}
</script>
  </body>


</html>