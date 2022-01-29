<header>
<?php include("resource.php")?>
<script src="../js/access.js"></script>
  <section id="top">
    <ul>
    	<li>Admin Section Activated</li>
        <div class="pull-right ml-3"> 
            <li>
                <a href="#" class="admin"><i class="fas fa-address-card">ADMIN</i></a>
                <a href="#" class="admin"><i >ORDINI</i></a>
            </li> 
        </div>
    </ul>
  </section>
  <nav class="navbar navbar-expand-md navbar-default" id="banner">
    <div class="container-fluid float-start">
      <a class="navbar-brand" href="http://localhost/Tweb/assets/html/catalog.php">Yuna Wholesale</a> <!-- Navbar links -->
      <div class="collapse navbar-collapse position-absolute top-0 end-0" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" href="http://localhost/Tweb/assets/html/catalog.php">Catalog</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href='http://localhost/Tweb/assets/html/cart.php'>Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
          </li><!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Others</a>
            <div class="dropdown-menu">
              
              <a class="dropdown-item" href="http://localhost/Tweb/assets/html/profile.php">Profile</a>
              <a class="dropdown-item" href="http://localhost/Tweb/assets/html/logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>