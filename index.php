<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in - Voler Admin Dashboard</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
<div id="auth">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-12 mx-auto">
        <div class="card pt-4">
          <div class="card-body">
            <div class="text-center mb-5">
              <!-- <img src="assets/images/favicon.svg" height="48" class='mb-4'> -->
              <h2>PT XYZ LOGO</h2>
              <h3>LOGIN</h3>
            </div>
            <form method="post" action="login_proses.php">
              <div class="form-group position-relative has-icon-left">
                <label for="username">Username</label>
                <div class="position-relative">
                  <input type="text" class="form-control" name="username" autocomplete="off">
                    <div class="form-control-icon">
                      <i data-feather="user"></i>
                    </div>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                  <label for="password">Password</label>
                </div>
                <div class="position-relative">
                  <input type="password" class="form-control" name="password">
                  <div class="form-control-icon">
                    <i data-feather="lock"></i>
                  </div>
                </div>
              </div>
              <div class="clearfix mt-5">
                <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary round float-end col-6 col-md-8">LOGIN</button>
                </div>
              </div>
            </form>
            <div class="row pb-4">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="assets/js/feather-icons/feather.min.js"></script>
  <script src="assets/js/app.js"></script>
  
  <script src="assets/js/main.js"></script>
  
</body>
</html>
