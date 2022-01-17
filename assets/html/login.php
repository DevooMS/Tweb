<!DOCTYPE html>
<html>
<?php include("resource.html")?>
<script src="../js/login.js" type="text/javascript"></script>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;../img/dogs/image4.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" id =loginnoer>Welcome Back!</h4>
                                    </div>
                                    <!--<form class="user" action="../php/db_login.php" method="POST">-->
                             
                                        <div class="mt-3"><input class="form-control " type="email" id="loginemail" aria-describedby="emailHelp" placeholder="Email Address" name="loginemail" value="<?php if(isset($_COOKIE["loginemail"])) { echo $_COOKIE["loginemail"]; } ?>" required>
                            
                                        <div class="mt-3"><input class="form-control " type="password" id="loginpassword" placeholder="Password" name="loginpassword" value="<?php if(isset($_COOKIE["loginpassword"])) { echo $_COOKIE["loginpassword"]; } ?>"required>
                                        
                                        <div class="mt-2">
                                            <div class="custom-control custom-checkbox small"></div>
                                            <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["loginemail"])) { ?> checked <?php } ?>> Remember me</div> 
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit" name="login" value="Login" id="login">Login</button>
                                        <hr><div class="mb-2 text-center" id =phpmsg></div>
                                        <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a>
                                        <hr>
                                    <!--</form>-->
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>