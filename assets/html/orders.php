<!DOCTYPE html>
<html>
   <?php include "lib/top.php"; ?>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <script src="../js/library/jquery-3.6.0.js"></script>
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/theme.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../js/library/jquery.dataTables.min.js"></script>
      <script src="../js/orders.js"></script>
      <title>Cart - Yuna</title>
   </head>
   <body id="page-top">
      <div class="container mt-5">
         <div class="card">
            <h5 class="card-header">Orders History</h5>
            <div id="catalogList_filter" class="dataTables_filter">
               <input type="search" class="form-control text-center" placeholder="Search" aria-controls="catalogList">
            </div>
            <table id="table" class="table" style="width:100%">
               <thead class="table-dark">
                  <tr>
                     <th width="30%" class="text-center">Order Number</th>
                     <th width="10%" class="text-center">Email</th>
                     <th width="20%" class="text-center">Time</th>
                     <th width="15%" class="text-center">Total</th>
                     <th width="5%"  class="text-center">Status</th>
                     <th width="5%"  class="text-center">Action</th>
                     <th width="5%"  class="text-center">Action</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                  </tr>
               </tfoot>
            </table>
            <table id="cart" class="table">
               <tfoot>
                  <tr>
                     <td><a href="http://localhost/Tweb/assets/html/catalog.php" class="btn btn-warning float-start"><i class="fa fa-angle-left"></i> Back to Shopping</a></td>
                     <td colspan="2" class="hidden-xs"></td>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
    </div>
   </body>

</html>