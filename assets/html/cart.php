<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <?php include "lib/top.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <script src="../js/library/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="../css/theme.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/cart.js"></script>
  <script src="../js/library/jquery.dataTables.min.js"></script>
  
  <title>Cart - Yuna</title>
</head>

  <body id="page-top">
    <div class="container mt-5">
    <div class="card">
     <h5 class="card-header">Cart</h5>
      <section class="content  text-dark">
          <div class="row mb-2">
            <div class="col-sm">
            <button class="btn btn-warning" id="makethis"> TEST</button>
                  <div>
                  <p class="text-center"><b>Vendor</b></p>
                      <p class="text-center m-0 ">Nome e Cognome</p>
                      <p class="text-center m-0">Indirizzo e Citta e stato</p>
                      <p class="text-center m-0">Vat Number</p>
                  </div>
              </div>
              <div class="col-sm row">
                  <div class="col-sm">
                      <p  class="m-0"><b>P.O. #:</b></p>
                      <p><b>TEST</b></p>
                  </div>
                  <div class="col-sm">
                      <p  class="m-0"><b>Date Created</b></p>
                      <p><b>DATA</b></p>
                  </div>
              </div>
          </div>
          
        </section>  
        <table id="example" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>  
                    <th width="30%" class="text-center">Product Name</th>  
                    <th width="10%" class="text-center">Sku</th>  
                    <th width="20%" class="text-center">Quantity</th>  
                    <th width="15%" class="text-center">Cost</th>  
                    <th width="5%"  class="text-center">Action</th>  
                </tr>
                </thead>
                <tfoot>
                <tr>  
                    <th width="30%" class="text-center">Product Name</th>  
                    <th width="10%" class="text-center">Sku</th>  
                    <th width="20%" class="text-center">Quantity</th>  
                    <th width="15%" class="text-center">Cost</th>  
                    <th width="5%"  class="text-center">Action</th>  
                </tr>
                </tfoot>      
        </table>
        <table id="cart" class="table table-striped">
            <tfoot>
              <tr>
                <td><a href="http://localhost/Tweb/assets/html/catalog.php" class="btn btn-warning float-start"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs absolute start-0" id='total'></td>
                <td><a href="#" class="btn btn-success btn-block float-end" id='checkout'>Checkout <i class="fa fa-angle-right"></i></a></td>
              </tr>
            </tfoot>
        </table>
    </div>
    </div>
</div>
  </body>
  <div id="msgModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-msgtill"></h4><button type="button" class="closebtn btn-close" aria-label="Close"><span aria-hidden="true"></span></button>
          </div>
         <div class="modal-body">
          <p class="modal-msg"></p>
          </div>
        <div class="modal-footer">
       
       <input type="hidden"> <button type="button" id="confirmbtn" class="btn btn-success">Confirm</button> <button type="button" class="closebtn  btn btn-secondary" >Close</button>
     </div>
    </div>
  </div>
  <div id="errorModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-msgtill"></h4><button type="button" class="closebtn btn-close" aria-label="Close"><span aria-hidden="true"></span></button>
          </div>
         <div class="modal-body">
          <p class="modal-msg"></p>
          </div>
        <div class="modal-footer">
       <button type="button" class="closebtn  btn btn-secondary" >Close</button>
     </div>
    </div>
  </div>
 </div>
</html>

