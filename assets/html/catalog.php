<!DOCTYPE html>
<html>
<?php include "lib/top.php"; ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="../js/catalog.js"></script>	
    <title>Table - Brand</title>
</head>

<body id="page-top">
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Catalog</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Item List</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                    <option value="10" selected="">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
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
                                </thead>
                                <tbody>
                              <!--le tabelle da inserire-->
                                </tbody>
                                <tfoot>
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
                                </tfoot>
                            </table>
                        </div>
                    	<div id="productModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="productForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i></h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for="name" class="control-label">Name Product</label>
							<input type="text" class="form-control" id="nmproduct" name="nmproduct" placeholder="Name" required>			
						</div>
						<div class="form-group">
							<label for="brand" class="control-label">Brand</label>							
							<input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" required>							
						</div>	   	
						<div class="form-group">
							<label for="skuid" class="control-label">Sku Id</label>							
							<input type="text" class="form-control"  id="skuid" name="skuid" placeholder="Sku Id" required>							
						</div>	 
						<div class="form-group">
							<label for="address" class="control-label">Quantity</label>							
							<input type="number" class="form-control"  id="qty" name="qty" placeholder="Quantity" required>							
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Cost</label>							
							<input type="number" class="form-control"  id="cost" name="cost" placeholder="Cost" required>				
						</div>						
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
    <div id ="deleteModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<h4 class="modal-msgtill"><i class="fa fa-plus"></i></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="modal-msg"></p>
						</div>
						<div class="modal-footer">
							<input type="hidden"/>
							<button type="button" id="deletbtn" class="btn btn-primary">Confirm</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
						</div>
					</div>
					</div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

</body>

</html>