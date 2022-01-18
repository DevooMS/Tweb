<!DOCTYPE HTML>
<html>
<head>
  <title>Esempio di validazione con JQuery</title>
  <!--Ultima versione di jQuery (minified) -->
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- Ultima versione di jquery.validate (minfied) -->
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <!-- Ultima versione di bootstrap (minified) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!-- codice jQuery -->
  <script type="text/javascript" src="app.js"></script>
  <!-- Custom styles -->
  <style>
    #form label.error {
        color: red;
        font-weight: bold;
    }
     
    .main {
        width: 600px;
        margin: 0 auto;
    }
  </style>
</head>
<body>
  <!-- Form container -->
  <div class="main">
    <h1>Registrazione</h1>
 
    <!-- form da validare -->
    <form action="#" id="form">
        <div class="mt-3"><input class="form-control " type="email" id="loginemail" aria-describedby="emailHelp" placeholder="EmailT Address" name="loginemail" value="<?php if(isset($_COOKIE["loginemail"])) { echo $_COOKIE["loginemail"]; } ?>">
                            
            <div class="mt-3"><input class="form-control " type="password" id="loginpassword" placeholder="Password" name="loginpassword" value="<?php if(isset($_COOKIE["loginpassword"])) { echo $_COOKIE["loginpassword"]; } ?>">
            </div><button class="btn btn-primary d-block btn-user w-100" type="submit" name="login" value="Login" id="login">Login</button>
    </form>
 
  </div>
</body>
</html>