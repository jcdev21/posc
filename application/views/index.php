<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url().'assets/backend/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url().'assets/backend/css/sb-admin-2.min.css'; ?>" rel="stylesheet">

</head>

<body class=""> <!-- class="bg-gradient-primary" -->

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-7 col-md-7">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 100px;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center mb-5">
                        <h1 class="h2 text-gray-900 mb-2">POINT OF SALE</h1>
                        <?php echo $this->session->flashdata('error');?>
                    </div>
                    <form class="user" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?= set_value('email'); ?>" placeholder="Email">
                            <?php
                                if (!empty(form_error('email'))) {
                                    echo form_error('email','<small class="form-text text-danger">','</small>');
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" value="<?= set_value('password'); ?>" placeholder="Password">
                            <?php
                                if (!empty(form_error('password'))) {
                                    echo form_error('password','<small class="form-text text-danger">','</small>');
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>
                        </div>
                        <input type="submit" name="submit_login" class="btn btn-primary btn-user btn-block" value="Login">
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url().'assets/backend/vendor/jquery/jquery.min.js'; ?>"></script>
  <script src="<?= base_url().'assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url().'assets/backend/vendor/jquery-easing/jquery.easing.min.js'; ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url().'assets/backend/js/sb-admin-2.min.js'; ?>"></script>

</body>

</html>
