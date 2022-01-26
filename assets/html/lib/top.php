<!DOCTYPE html>
<html>
<?php include("resource.php")?>
<script src="../js/access.js"></script>
<header>

    <section id="top">
    	<div class="container">
    	<ul>
    	<li>Admin Section Activated</li>
    	<div class="pull-right ml-3" >
       
                        <li><a href="#" class="admin"><i class="fas fa-address-card">ADMIN</i></a></li>
               </div>
                    </ul>
                </div>
    </section>

    <nav class="navbar navbar-expand-md navbar-default" id="banner">
        <div class="container-fluid float-start">
           
            <a class="navbar-brand" href="#">Yuna Wholesale</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse position-absolute top-0 end-0" id="collapsibleNavbar">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Tweb/assets/html/profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Tweb/assets/html/catalog.php">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                       <!-- Dropdown -->
                       <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Others  </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Cart</a>
                            <a class="dropdown-item" href="http://localhost/Tweb/assets/html/logout.php">Logout</a>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
   

</header>

</html>
