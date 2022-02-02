

<html>
<?php include("lib/resource.php")?>
<head><meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0"></head>
<script src="../js/library/jquery.validator-1.19.js"></script>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(../img/dogs/image5.jpg );"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form id="registerpage">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class= "form-control " type="text" id="firstname" placeholder="First Name" name="firstname"></div>
                                    <div class="col-sm-6"><input class="form-control " type="text" id="lastname" placeholder="Last Name" name="lastname"/></div>
                                </div>
                                <div class="mb-3"><input class="form-control " type="email" id="email" aria-describedby="email" placeholder="Email Address" name="email"></div>
                                <div class="mb-3"><input class="form-control " type="number" id="vat_number" placeholder="Vat Number" name="vat_number"/></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control " type="password" id="password" placeholder="Password" name="password"></div>
                                    <div class="invalid-feedback"> Please enter new password.</div>
                                    <div class="col-sm-6"><input class="form-control " type="password" id="confirm_password" placeholder="Repeat Password" name="confirm_password"></div>
                                    <div class="invalid-feedback"> Please enter new password.</div>
                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit" id="submit">Register Account</button>
                                <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Register with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Register with Facebook</a>
                                <hr>
                            </form>
                            <div class="text-center" id="phpmsg"></div>
                            <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/register.js" type="text/javascript"></script>
</html>