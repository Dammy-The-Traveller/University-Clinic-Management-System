<?php include __DIR__ . '/../partials/head.php'; ?>

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
          <?php require 'fetch_appointment.view.php'; ?>
          <div class="text-center mt-3">
    <input type="text" list="items" id="idInput" class="form-control mb-2"  placeholder="Enter Student ID">
    <datalist id="items">
    <?php if (!empty($appointmentLists)): ?>
      <?php foreach ($appointmentLists as $appointmentList): ?>
      <option value="<?= htmlspecialchars($appointmentList['student_id']) ?>">
      <?php endforeach; ?>
      <?php endif; ?>
    </datalist>
    <button type="button" id="searchButton" class="btn btn-primary">Search For Appointment</button>
          </div>
            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
              <form class="mt-8 space-y-6" action="/Clinic-Management-System/book-update" method="POST" >
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="id" id="a19">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Edit Appointment</h5>
                  </div>
                  <div class="card-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a1">Patient Name</label>
                          <input name="fullname" type="text" class="form-control" id="a1" required readonly placeholder="Enter fullname">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a2">Patient Email</label>
                          <input name="EMAIL" type="email" class="form-control" id="a2" required placeholder="Enter email address">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a3">Student ID</label>
                          <input name="Student_ID" type="text" class="form-control" id="a3" required readonly placeholder="Enter email address">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a4">Gender</label>
                          <select name="gender" class="form-select" id="a4">
                            <option value="0">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a5">Age</label>
                          <input name="age" type="number" class="form-control" id="a5" required readonly placeholder="Enter age">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a6">Patient Phone</label>
                          <input name="phone_number" type="text" class="form-control" id="a6" required placeholder="Enter phone number">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a7">Select Date</label>
                          <input name="date" type="date" class="form-control" id="a7" required  placeholder="Select date">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a8">Select Time</label>
                          <input name="time" type="time" class="form-control" id="a8" required  placeholder="Select time">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                          <label class="form-label" for="a9">Program</label>
                          <input name="program" type="text" class="form-control" id="a9" required readonly placeholder="Enter Program">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label class="form-label" for="a10">Problem</label>
                          <textarea name="problem" class="form-control" id="a10" required placeholder="Enter Problem" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="d-flex gap-2 justify-content-end">
                          <a href="/Clinic-Management-System/Edit-Appointments" class="btn btn-outline-secondary">
                            Cancel
                          </a>
                          <button type="submit" id="book" class="btn btn-primary">
                           Update Appointment
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

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required readonly jQuery first, then Bootstrap Bundle JS -->
    <?php include __DIR__ . '/../partials/footer.php' ?>

    <script>
      document.getElementById("searchButton").addEventListener("click", function () {
    let idNumber = document.getElementById("idInput").value;
   
    fetch(`/Clinic-Management-System/fetch-appointments?studentID=${encodeURIComponent(idNumber)}`, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())  
    .then(data => {
        console.log(data);  
        if (data.success) {
            document.getElementById("a1").value = data.fullname;
            document.getElementById("a2").value = data.email;
            document.getElementById("a3").value = data.student_id;
            document.getElementById("a4").value = data.gender;
            document.getElementById("a5").value = data.age;
            document.getElementById("a6").value = data.phone_number;
            const formattedDate = formatDate(data.date);
            //  console.log("Original Date:", data.date);
            // console.log("Formatted Date:", formattedDate);
           document.getElementById("a7").value = formattedDate;
           const formattedTime = formatTimeForInput(data.time);
           document.getElementById("a8").value = formattedTime;
            console.log("Original Time:", data.time);
            document.getElementById("a9").value = data.program;
            document.getElementById("a10").value = data.problem;
            document.getElementById("a19").value = data.id;
        } else {
            alert(data.message);
        }

        function formatDate(dateString) {
    const date = new Date(dateString); 
    const year = date.getFullYear(); 
    const month = String(date.getMonth() + 1).padStart(2, "0"); 
    const day = String(date.getDate()).padStart(2, "0");

    return `${year}-${month}-${day}`;
}

function formatTimeForInput(timeString) {
    if (!timeString) return ''; // Handle null or empty values
    const timeParts = timeString.split(':'); // Split "HH:MM:SS"
    return `${timeParts[0]}:${timeParts[1]}`; // Return "HH:MM" for input field
}

    })
    .catch(error => console.error("Error:", error));
});

  
    </script>
  </body>


</html>