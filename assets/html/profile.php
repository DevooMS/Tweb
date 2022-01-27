<!DOCTYPE html>
<html>
<?php include("lib/top.php")?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="../js/profile.js"></script>
    <title>Profile - Brand</title>
</head>
    
<body id="page-top">
    <div id="wrapper">
       
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img id="profileimg"class="rounded-circle mb-3 mt-4"width="160" height="160">
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" placeholder="user@example.com" name="email" readonly></div>
                                                        <div class="mb-3"><label class="form-label" for="vat"><strong>Vat Number</strong></label><input class="form-control" type="text" id="vat" placeholder="Vat Number" name="vat" readonly></div>
                                                        
                                                    </div>
                                                   
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name" placeholder="John" name="first_name" readonly></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" placeholder="Doe" name="last_name" readonly></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" id="setprofile">
                                            <input type="hidden" id="emailhid" name="email"> <input type="hidden" id="actionhid" name="action">
                                                <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" placeholder="Via Roma, 58" name="address"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" placeholder="Torino" name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="country"><strong>Country</strong></label><input class="form-control" type="text" id="country" placeholder="Italy" name="country"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" id="submit">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-3">
                  
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                
                    <div class="text-center mt-5 copyright"><span>Copyright © YUNA 2022</span></div>
             
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</body>

</html>