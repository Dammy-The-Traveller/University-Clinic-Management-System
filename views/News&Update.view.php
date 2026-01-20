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

            <!-- Row starts -->
            <div class="row gx-3" id="newsContainer">
              <!-- News will be fetched here -->
             
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
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <?php include 'partials/footer.php'; ?>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
      fetchHealthNews();
      setInterval(fetchHealthNews, 3 * 60 * 60 * 1000);  
  });

  async function fetchHealthNews() {
      try {
          const response = await fetch('/Clinic-Management-System/newapi');
          const data = await response.json();

          if (data.status === "ok") {
              let output = "";
              data.articles.slice(0, 50).forEach(article => { // Show latest 6 articles
                  output += `
                      <div class="col-sm-4 col-12">
                          <div class="card mb-3">
                              <div class="card-body">
                                  <div class="card-img">
                                      <img loading="lazy" src="${article.urlToImage || 'Public/assets/images/products/default.jpg'}" class="img-fluid rounded-3 mb-3" alt="Health News">
                                  </div>
                                  <h5>${article.title}</h5>
                                  <p class="small text-muted">Posted on - ${new Date(article.publishedAt).toDateString()}</p>
                                  <p class="mb-4">${article.description || "No description available."}</p>
                                  <div class="d-flex justify-content-between mt-4">
                                      <a href="${article.url}" class="btn btn-info" target="_blank">Read More</a>
                                      <div class="d-flex gap-3">
                                          <a href="#" class="d-flex align-items-center">
                                              <div class="icon-box sm bg-danger rounded-5 me-1">
                                                  <i class="ri-heart-fill text-white"></i>
                                              </div>
                                              <span class="fw-bold">300</span>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  `;
              });

              document.getElementById("newsContainer").innerHTML = output;
          } else {
              document.getElementById("newsContainer").innerHTML = `<p>Error fetching news.</p>`;
          }
      } catch (error) {
        console.error(error);
          document.getElementById("newsContainer").innerHTML = `<p>Failed to load news.</p>`;
      }
  }
</script>

  </body>



</html>