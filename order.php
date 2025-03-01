<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Billing</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <style type="text/css">
    .item_row input[type='text']{
      width: 100%;
    }
    .row.item_row {
        margin-bottom: 5px;
    }
    .row.total_row, .row.head_row {
          background: #dad5d5e8;
          margin-top: 10px;
          margin-bottom: 10px;
          font-weight: bold;
      }
      .pricedetails{
        font-size: 11px;
        font-weight: bold;
      }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php 
    include("layouts/sidebar.php"); 
    include_once("connection.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">

          <!-- Outer Row -->
          <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">New Product!</h1>
                        </div>
                        <form method="post" action="postorder.php">
                          <div class="form-group row">
                            <label for="party_name" class="col-sm-2 col-form-label">Party Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="party_name" id="party_name" required="true" placeholder="Party Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="address" id="address" required="true" placeholder="Address">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="city" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="city" id="city" required="true" placeholder="City">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="state" class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="state" id="state" required="true" placeholder="State">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="phone_1" class="col-sm-2 col-form-label">Phone 1</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="phone_1" id="phone_1" required="true" placeholder="Phone 1">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="phone_2" class="col-sm-2 col-form-label">Phone 2</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="phone_2" id="phone_2" required="true" placeholder="Phone 2">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="gstin" class="col-sm-2 col-form-label">GSTIN</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="gstin" id="gstin" required="true" placeholder="GSTIN">
                            </div>
                          </div>
                          <button data-toggle="modal" data-target="#productModal" type="button" id="addNewProduct">Add New</button>
                          <div class="row head_row">
                            <div class="col-3">Name Of Items</div>
                            <div class="col-2">Qty</div>
                            <div class="col-2">Rate</div>
                            <div class="col-1">CGST</div>
                            <div class="col-1">SGST</div>
                            <div class="col-1">Amt</div>
                            <div class="col-1">Act</div>
                          </div>
                          <div class="items_row">
                             
                          </div>
                          <div class="row total_row">
                            <div class="col-3">Total</div>
                            <div class="col-2">Qty</div>
                            <div class="col-2"><span class="totalAmt">0</span><input type="hidden" name="totalAmtHD" id="totalAmtHD"></div>
                            <div class="col-1"><span class="totalCgstAmt">0</span><input type="hidden" name="totalCgstAmtHD" id="totalCgstAmtHD"></div>
                            <div class="col-1"><span class="totalSgstAmt">0</span><input type="hidden" name="totalSgstAmtHD" id="totalSgstAmtHD"></div>
                            <div class="col-2"><span class="finalTotal">0</span><input type="hidden" name="finalTotalHD" id="finalTotalHD"></div>
                            <div class="col-1"></div>
                          </div>

                          <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                        </form>
                        <hr>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Products</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <select class="form-control select2" name="new_product" id="new_product">
              <option value="">Select</option> 
              <?php
                $sql = "SELECT id, `product_name`, `hsn_code`, `price`, `quantity`, `description` FROM products ORDER by id  asc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["id"]; ?>" hsn="<?php echo $row["hsn_code"]; ?>" price="<?php echo $row["price"]; ?>" product_name="<?php echo $row["product_name"]; ?>"><?php echo $row["product_name"]; ?></option>
                    <?php
                  }
                }
              ?>
          </select>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" id="add_item" data-dismiss="modal">Add Item</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).on("click", "#addNewProduct", function(){
      //addNewProduct();
    });
    $(document).on("click", "#add_item", function(){
      var product_id = $("#new_product").val();
      var hsn = $("#new_product option:selected").attr("hsn");
      var price = $("#new_product option:selected").attr("price");
      var product_name = $("#new_product option:selected").attr("product_name");
      if(product_id !== ''){
        var param = {
          product_id,
          hsn,
          price,
          product_name
        }
        addNewProduct(param);
      }
    });
    
    $(document).on("click, blur", ".qty, .sale_rate, .cgst, .sgst", function(e){
      var parentRow = $(this).closest(".item_row");
      countRowAmt(parentRow);
    });

    $(document).on("click", ".removeItem", function(e){
      $(this).closest(".item_row").remove();
      countFianlTotal();
    })
    
    function countRowAmt(parentRow){
      var qty = parentRow.find('.qty').val();
      var sale_rate = parentRow.find('.sale_rate').val();
      var cgst = parentRow.find('.cgst').val();
      var sgst = parentRow.find('.sgst').val();
      var amt = parseInt(qty) * parseFloat(sale_rate);
      var cgstAmt = (amt * parseFloat(cgst)) / 100;
      var sgstAmt = (amt * parseFloat(sgst)) / 100;
      var finalRowAmt = amt + cgstAmt + sgstAmt;

      finalRowAmt = finalRowAmt.toFixed(2);
      cgstAmt = cgstAmt.toFixed(2);
      sgstAmt = sgstAmt.toFixed(2);
      amt = amt.toFixed(2);


      parentRow.find(".row_amt").text(amt);
      parentRow.find(".row_cgstAmt").text(cgstAmt);
      parentRow.find(".row_sgstAmt").text(sgstAmt);
      parentRow.find(".row_finalAmt").text(finalRowAmt);

      parentRow.find(".row_amtHD").val(amt);
      parentRow.find(".row_cgstAmtHD").val(cgstAmt);
      parentRow.find(".row_sgstAmtHD").val(sgstAmt);
      parentRow.find(".row_finalAmtHD").val(finalRowAmt);
      console.log({qty, sale_rate, cgst, sgst, amt, cgstAmt, sgstAmt, finalRowAmt});
      countFianlTotal();
    }

    function getTotalSaleAmt(){
      var totalSaleRate = 0;
      $(".sale_rate").each(function(i,e){
        console.log($(this),i,e);
        var qty = $(this).closest('.item_row').find(".qty").val();

        totalSaleRate += (parseFloat($(this).val()) * qty);
      });
      totalSaleRate = totalSaleRate.toFixed(2);
      return totalSaleRate;
    }

    function getTotalCGSTAmt(){
      var totalCGSTAmt = 0;
      $(".row_cgstAmt").each(function(i,e){
        console.log($(this),i,e);
        totalCGSTAmt += parseFloat($(this).text());
      });
      totalCGSTAmt = totalCGSTAmt.toFixed(2);
      return totalCGSTAmt;
    }

    function getTotalSGSTAmt(){
      var totalSGSTAmt = 0;
      $(".row_sgstAmt").each(function(i,e){
        console.log($(this),i,e);
        totalSGSTAmt += parseFloat($(this).text());
      });
      totalSGSTAmt = totalSGSTAmt.toFixed(2);
      return totalSGSTAmt;
    }

    function getTotalFinalAmt(){
      var totalFinalAmt = 0;
      $(".row_finalAmt").each(function(i,e){
        console.log($(this),i,e);
        totalFinalAmt += parseFloat($(this).text());
      });
      totalFinalAmt = totalFinalAmt.toFixed(2);
      return totalFinalAmt;
    }


    function countFianlTotal(){
      var totalAmt = getTotalSaleAmt();
      var totalCgstAmt = getTotalCGSTAmt();
      var totalSgstAmt = getTotalSGSTAmt();
      var finalTotal = getTotalFinalAmt();
      $(".totalAmt").text(totalAmt);
      $(".totalCgstAmt").text(totalCgstAmt);
      $(".totalSgstAmt").text(totalSgstAmt);
      $(".finalTotal").text(finalTotal);

      $("#totalAmtHD").val(totalAmt);
      $("#totalCgstAmtHD").val(totalCgstAmt);
      $("#totalSgstAmtHD").val(totalSgstAmt);
      $("#finalTotalHD").val(finalTotal);
    }

    function addNewProduct(param){
      console.log($(".row.item_row[product_id="+param.product_id+"]").length);
      if($(".row.item_row[product_id="+param.product_id+"]").length > 0){
        console.log($(".row.item_row[product_id="+param.product_id+"]"));
        $(".row.item_row[product_id="+param.product_id+"]").find('.qty').focus();
        return false;
      }
      var item_row_html = '';
      item_row_html += '<div class="row item_row" product_id="'+param.product_id+'">';
      item_row_html += '<div class="col-3">'+param.product_name+'<input type="hidden" name="product[]" value="'+param.product_name+'"> <input type="hidden" name="hsn[]" value="'+param.hsn+'"></div>';
      item_row_html += '<div class="col-2"><input type="text" value="1" name="qty[]" class="qty"></div>';
      item_row_html += '<div class="col-2"><input type="text" value="'+param.price+'" name="sale_rate[]" class="sale_rate"></div>';
      item_row_html += '<div class="col-1"><input type="text" value="0" name="cgst[]" class="cgst"></div>';
      item_row_html += '<div class="col-1"><input type="text" value="0" name="sgst[]" class="sgst"></div>';
      item_row_html += '<div class="col-2 pricedetails"><span class="row_amt">0</span><br><input type="hidden" class="row_amtHD" name="amtHD[]" value="" ><input type="hidden" class="row_cgstAmtHD" name="cgstAmtHD[]" value="" > <input type="hidden" class="row_sgstAmtHD" name="sgstAmtHD[]" value="" > <input type="hidden" class="row_finalAmtHD" name="finalAmtHD[]" value="" ><span  class="row_cgstAmt">0</span><br><span class="row_sgstAmt">0</span><br><span class="row_finalAmt">0</span></div>';
      item_row_html += '<div class="col-1"><button class="removeItem">X</button></div>';
      item_row_html += '</div>';
      $('.items_row').append(item_row_html);
      countFianlTotal();
      countRowAmt($(".item_row:last"));
    }
    $('.select2').select2();
  </script>

</body>

</html>
