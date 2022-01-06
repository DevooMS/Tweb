

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../Tweb/assets/js/general.js" type="text/javascript"></script>
</head>

<body class="bg-gradient-primary">
    
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(assets/img/dogs/image5.jpg);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" action="assets/php/db_register.php" method="POST">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class= "form-control form-control-user" type="text" id="firstname" placeholder="First Name" name="firstname" required/></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="lastname" placeholder="Last Name" name="lastname" required/></div>
                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="email" aria-describedby="email" placeholder="Email Address" name="email"required/></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="number" id="vat_number" placeholder="Vat Number" name="vat_number"required/></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password"required/></div>
                                    <div class="invalid-feedback"> Please enter new password.</div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="confirm_password" placeholder="Repeat Password" name="confirm_password"required/></div>
                                    <div class="invalid-feedback"> Please enter new password.</div>
                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit" value="submit" name="submit">Register Account</button>
                                <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Register with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Register with Facebook</a>
                                <hr>
                            </form>
                            <?php session_start(); if(isset($_SESSION['unsuccessful'])): ?>
                            <p style="color:red;" class="text-center" >Error: <?= $_SESSION['unsuccessful']; ?></p>
                            <?php elseif (isset($_SESSION['successfully'])): ?>
                            <p style="color:green;" class="text-center" > <?= $_SESSION['successfully']; ?></p>
                            <?php header("refresh: 3; url = http://localhost/tweb/login.html"); ?>
                            <?php endif; ?>
                            <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.html">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['unsuccessful']);unset($_SESSION['successfully']); ?>
    <script  src="assets/js/verifypass.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>