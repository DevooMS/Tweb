<!DOCTYPE html>
<html>
<?php include "lib/top.php"; ?>

<head>
  <meta charset="utf-8">
  <script src="../js/library/jquery.validator-1.19.js"></script>
  <script src="../js/admin.js"></script>
  
  <title>Cart - Yuna</title>
</head>
<body>
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Change Password</p>
    </div>
    <div action="#" class="card-body">
        <form id='changepass'>
            <div class="row">
                <div class="col">
                <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" placeholder="user@example.com" name="email"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <div class="mb-3"><label class="form-label" for="password"><strong>Password</strong></label><input class="form-control"  id="password" placeholder="Password" name="password"></div>
                </div>
                <div class="col">
                <div class="mb-3"><label class="form-label" for="confirm_password"><strong>Confirm Password</strong></label><input class="form-control"  id="confirm_password" placeholder="Confirm Password" name="confirm_password"></div>
                </div>
            </div>
            <div class="mb-3"><button type="submit" class="btn btn-primary btn-sm" id="submit">Change Password</button></div>
        </form>
    </div>
    </div>

    <div class="card shadow mb-3">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Search User</p>
    </div>
    <div class="card-body">
        <form id="checkusr">
            <div class="row">
                <div class="col">
                <div class="mb-3"><label class="form-label" for="emailck"><strong>Email Address</strong></label><input class="form-control" type="emailck" id="emailck" placeholder="user@example.com" name="emailck"></div>
                <div class="mb-3"><label class="form-label" for="vat"><strong>Vat Number</strong></label><input class="form-control" type="text" id="vat" name="vat" readonly></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name" name="firstname" readonly></div>
                </div>
                <div class="col">
                <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" name="lastname" readonly></div>
                </div>
            </div>
            <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" name="address" readonly></div>
            <div class="row">
                <div class="col">
                 <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" name="city" readonly></div>
                </div>
                <div class="col">
                <div class="mb-3"><label class="form-label" for="country"><strong>Country</strong></label><input class="form-control" type="text" id="country" name="country" readonly></div>
                </div>
            </div>
            <div class="mb-3"><button class="btn btn-primary btn-sm" id="submit">Search User</button></div>
        </form>
    </div>
    </div>
    <div id="msgModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-msgtill"></h4>
            </div>
            <div class="modal-body">
            <p class="modal-msg"></p>
            </div>
            <div class="modal-footer">
             <button type="button" class="closebtn btn btn-secondary">Close</button>
            </div>
        </div>
        </div>
    </div>
</body>
</html>