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
        <form id="loginForm" action="/Clinic-Management-System/login" method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
          <div class="auth-box" style="min-width: 500px !important; max-width: 500px; !important">
            <h2 class="auth-logo mb-4">
              <!-- <img loading="lazy" src="Public/assets/images/logo-dark.svg" alt="Bootstrap Gallery"> -->
              <span class="">School Clinic</span>
            </h2>

            <!-- <h4 class="mb-4">Login</h4> -->

    <div class="mb-3">
  <label for="demoRole" class="form-label">
    <h5>Choose Role for Demo</h5>
  </label>
  <select name="email" id="demoRole" class="form-select">
    <option value="">-- Select Role --</option>
    <option value="admin@ait.edu.gh">Admin</option>
    <option value="adebesindamilare39@gmail.com">Nurse</option>
  </select>
</div>

<div class="mb-2">
  <label class="form-label" for="password">
    Your password <span class="text-danger">*</span>
  </label>
  <div class="input-group">
    <input
      id="password"
      class="form-control"
      name="password"
      type="password"
      autocomplete="current-password"
      required
    >
    <button class="btn btn-outline-secondary" type="button">
      <i class="ri-eye-line text-primary"></i>
    </button>
  </div>
</div>


            <!-- <div class="d-flex justify-content-end mb-3">
              <a href="" class="text-decoration-underline">Forgot password?</a>
            </div> -->

            <div class="mb-3 d-grid gap-2">
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="/Clinic-Management-System/register" class="btn btn-secondary">Not registered? Signup</a>
            </div>

            <?php if(isset($errors['email'])):?>
                <small style="color:red" class= "text-center"><?=$errors['email'] ?></small>
                <?php endif; ?>
                      <?php if(isset($errors['password'])):?>
                <p style="color:red" class= "text-center"><?=$errors['password'] ?></p>
                <?php endif; ?>
          </div>

        </form>
        <!-- Form ends -->

      </div>
      <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->

  </body>

    <script>
document.addEventListener('DOMContentLoaded', function () {
  const roleSelect = document.getElementById('demoRole');
  const passwordInput = document.getElementById('password');

  const demoCredentials = {
    "admin@ait.edu.gh": {
      password: "SystemDevelopers712531"
    },
    "adebesindamilare39@gmail.com": {
      password: "2676Rhode@ait.edu.gh"
    }
  };

  roleSelect.addEventListener('change', function () {
    const selectedEmail = this.value;

    if (demoCredentials[selectedEmail]) {
      passwordInput.value = demoCredentials[selectedEmail].password;
    } else {
      passwordInput.value = '';
    }
  });
});

</script>

</html>