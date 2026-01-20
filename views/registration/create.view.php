<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lagos State University Health Care</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <link href="Public/assets/img/favicon_io/favicon-32x32.png" type="image/x-icon" rel="icon">
    <link href="Public/assets/img/favicon_io/favicon-16x16.png" type="image/x-icon" rel="icon">

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="Public/assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="Public/assets/css/main.min.css">
<style>
  .container {
    display: flex;
    justify-content: center;  
    align-items: center;      
    height: 100vh;            
}
.auth-wrapper {
    width: 540px;
    max-width: 400px; 
    justify-content: flex-start !important;
}
</style>
  </head>

  <body class="login-bg">

    <!-- Container starts -->
    <div class="container">

      <!-- Auth wrapper starts -->
      <div class="auth-wrapper">

        <!-- Form starts -->
        <form id="loginForm" action="/Clinic-Management-System/register" method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
          <div class="auth-box" style="min-width: 500px !important; max-width: 500px; !important">
            <h2 class="auth-logo mb-4">
              <!-- <img loading="lazy" src="Public/assets/images/logo-dark.svg" alt="Bootstrap Gallery"> -->
              <span class=""> Clinic</span>
            </h2>

            <!-- <h4 class="mb-4">Login</h4> -->
            <div class="mb-3">
              <label class="form-label" for="FirstName">First Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control"  name="FirstName" autocomplete="Name" required  >
            </div>
            <div class="mb-3">
              <label class="form-label" for="LastName">Last Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control"  name="LastName" autocomplete="student_id" required  >
            </div>
            <div class="mb-3">
              <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
              <input type="text" class="form-control"  name="email" autocomplete="email" required  value="<?= old('email', '')?>" >
            </div>

            <div class="mb-2">
              <label class="form-label" for="pwd">Password <span class="text-danger">*</span></label>
              <div class="input-group">
                <input class="form-control" name="Password" type="password" autocomplete="current-password" required>
                <button class="btn btn-outline-secondary" type="button">
                  <i class="ri-eye-line text-primary"></i>
                </button>
              </div>
            </div>

            <div class="mb-2">
              <label class="form-label" for="pwd">Repeat password <span class="text-danger">*</span></label>
              <div class="input-group">
                <input class="form-control" name="RepeatPassword" type="password" autocomplete="current-password" required>
                <button class="btn btn-outline-secondary" type="button">
                  <i class="ri-eye-line text-primary"></i>
                </button>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="token">Token <span class="text-danger">*</span></label>
              <input type="text" class="form-control"  name="token" autocomplete="token" required>
            </div>
     

            <div class="mb-3 d-grid gap-2">
              <button type="submit" class="btn btn-primary">Register</button>
               <a href="/Clinic-Management-System/" class="btn btn-secondary">Registered? Login</a> 
            </div>

            <?php if(isset($errors['firstName'])):?>
                <small style="color:red" class= "text-center"><?=$errors['firstName'] ?></small>
                <?php endif; ?>
                <?php if(isset($errors['lastName'])):?>
                <small style="color:red" class= "text-center"><?=$errors['lastName'] ?></small>
                <?php endif; ?>
            <?php if(isset($errors['email'])):?>
                <small style="color:red" class= "text-center"><?=$errors['email'] ?></small>
                <?php endif; ?>

                      <?php if(isset($errors['password'])):?>
                <p style="color:red" class= "text-center"><?=$errors['password'] ?></p>
                <?php endif; ?>

                <?php if(isset($errors['token'])):?>
                <small style="color:red" class= "text-center"><?=$errors['token'] ?></small>
                <?php endif; ?>
          </div>

        </form>
        <!-- Form ends -->

      </div>
      <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->

  </body>



</html>