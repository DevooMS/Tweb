<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <?php include "lib/top.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <script src="../js/library/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="../css/theme.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/library/jquery.dataTables.min.js"></script>
  <script src="../js/library/dataTables.bootstrap.min.js"></script>
  <script src="../js/catalog.js"></script>
  <title>Catalog - Yuna</title>
</head>

<body id="page-top">
  <div id="wrapper">
    <div class="d-flex flex-column mt-5" id="content-wrapper">
      <div id="content ">
        <div class="container-fluid">
          <div class="card shadow">
            <div class="card-header py-3">
              <p class="text-primary mt-1 fw-bold float-start">Catalog List</p>
			  <button type="button" name="add" id="addProduct" class="btn btn-success btn-xs float-end">Add Product</button>
              
            </div>
            <div class="card-body">
              <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="catalogList">
                  <thead>
                    <tr>
                      <th>Name Product</th>
                      <th>Brand</th>
                      <th>Sku Id</th>
                      <th>Quantity</th>
                      <th>Cost</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead><!--le tabelle da inserire-->
                </table>
              </div>
              <div id="productModal" class="modal fade">
                <div class="modal-dialog">
                  <form method="post" id="productForm" name="productForm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="name" class="control-label">Name Product</label> <input type="text" class="form-control" id="nmproduct" name="nmproduct" placeholder="Name" required="">
                        </div>
                        <div class="form-group">
                          <label for="brand" class="control-label">Brand</label> <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" required="">
                        </div>
                        <div class="form-group">
                          <label for="skuid" class="control-label">Sku Id</label> <input type="text" class="form-control" id="skuid" name="skuid" placeholder="Sku Id" required="">
                        </div>
                        <div class="form-group">
                          <label for="qty" class="control-label">Quantity</label> <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity" required="">
                        </div>
                        <div class="form-group">
                          <label for="cost" class="control-label">Cost</label> <input type="number" step="0.01" class="form-control" id="cost" name="cost" placeholder="Cost" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="action" id="action" value=""> <input type="submit" name="save" id="save" class="btn btn-primary" value="Save"> <button type="button" class="closebtn btn btn-secondary">Close</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div id="deleteModal" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-msgtill"></h4><button type="button" class="closebtn btn-close" aria-label="Close"><span aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                      <p class="modal-msg"></p>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden"> <button type="button" id="deletbtn" class="btn btn-primary">Confirm</button> <button type="button" class="closebtn  btn btn-secondary" >Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="bg-white sticky-footer"></footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"></a>
  </div>
</body>
</html>