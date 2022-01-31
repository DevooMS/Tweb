<!DOCTYPE html>
<html>
   <?php include "lib/top.php"; ?>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" >
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <script src="../js/library/jquery.dataTables.min.js"></script>
      <script src="../js/library/jquery.printarea.js"></script>
      <script src="../js/details.js"></script>
      <title>Order Details - Yuna</title>
   </head>
   <body id="page-top">
      <div class="container mt-5">
         <div class="card PrintArea">
            <h5 class="card-header">Order Details</h5>
            <section class="content  text-dark">
               <div class="row mb-2">
                  <div class="col-sm">
                     <div>
                        <p class="text-center"><b>Information:</b></p>
                        <p class="text-center m-0 " id='n1'>Nome e Cognome</p>
                        <p class="text-center m-0" id='n2'>Indirizzo e Citta e stato</p>
                        <p class="text-center m-0" id='n3'>Vat Number</p>
                     </div>
                  </div>
                  <div class="col-sm row">
                     <div class="col-sm">
                        <p  class="m-0"><b>P.O. #:</b></p>
                        <p id='n5'><b>Order Number</b></p>
                     </div>
                     <div class="col-sm">
                        <p  class="m-0"><b>Date Created</b></p>
                        <p  id='n6' ><b>Date</b></p>
                     </div>
                     <div class="col-sm">
                        <p  class="m-0"><b>Total €</b></p>
                        <p  id='n7' ><b>Total</b></p>
                     </div>
                  </div>
               </div>
            </section>
            <table id="table" class="table table-bordered table-striped" style="width:100%">
               <thead>
                  <tr>
                     <th width="30%" class="text-center">Product Name</th>
                     <th width="10%" class="text-center">Sku</th>
                     <th width="20%" class="text-center">Quantity</th>
                     <th width="15%" class="text-center">Cost</th>
                 
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th width="30%" class="text-center">Product Name</th>
                     <th width="10%" class="text-center">Sku</th>
                     <th width="20%" class="text-center">Quantity</th>
                     <th width="15%" class="text-center">Cost</th>
        
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
      <div class="container mt-5">
            <table id="cart" class="table table-striped">
               <tfoot>
                  <tr>
                     <td><a href="http://localhost/Tweb/assets/html/orders.php" class="btn btn-warning float-start"><i class="fa fa-angle-left"></i> Back to history</a></td>
                     <td colspan="2" class="hidden-xs"></td>
                     <td class="hidden-xs absolute start-0" id='total'></td>
                     <td><a href="#" class="btn btn-success btn-block float-end" id="print">Print Invoice <i class="fa fa-print"></i></a></td>
                  </tr>
               </tfoot>
            </table>
      </div>
   </body>
   <!--modal msg-->
   <div id="msgModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-msgtill"></h4>
               <button type="button" class="closebtn btn-close" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
               <p class="modal-msg"></p>
            </div>
            <div class="modal-footer">
               <input type="hidden"> <button type="button" id="confirmbtn" class="btn btn-success">Confirm</button> <button type="button" class="closebtn  btn btn-secondary" >Close</button>
            </div>
         </div>
      </div>
   </div>
   </div>
</html>