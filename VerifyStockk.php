<!DOCTYPE html>
<html>
  <head>
    <title>Flaming Wings | Dashboard</title>
    <?php include ("templates/imports.php"); ?>
   <?PHP 
   include("dbconnection.php")

   ?>

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <?php include("templates/navbar.php"); ?>
      <?php include("templates/sidebar.php"); ?>
           <!--SEARCH--> 
    <div class="content-wrapper">
       <section cl ass="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Verify Stock</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="VerifyStock1.php" method="post">
                  <div class="box-body">
                   
                     <div class="form-group">
                      <label>Stock Name</label>
                      <select class="form-control" name="sname" required
                      value="<?php if (isset($_POST['sname']) && !$flag) echo $_POST['sname']; ?>">
                        <option value="" disabled selected> -- ID -- Stock Name -- In-stock --</option> 
                        
                        <?php
                        $sql = mysqli_query($connect, "SELECT stock_id, sname, qty, unit_name, pack_name FROM stock s JOIN unitmeasurement m JOIN unitpackaging p WHERE s.unit_id=m.unit_id AND p.pack_id=s.pack_id");
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=\"" . $row['stock_id'] . "\">".$row['stock_id']. " -- ".$row['sname']. " -- " .$row['qty']. " " .$row['unit_name']. " ".$row['pack_name']. "</option>"; 
                        }
                         ?>
                      </select>
                      
                    </div>
                      <div class="form-group">
                      <label for="InputQty">Actual Quantity</label>
                      <input type="number" min="0" step="any" class="form-control" id="InputQty" placeholder="Quantity" name="qty" required>
                    </div>

                    <!-- DATE -->
                      <div class="form-group">
                        <label for="inputdtReceived">Date Verified</label>
                       
                        <input type="date" class="form-control" id="inputdtReceived" name="dtVerified" required value="<?php echo date('Y-m-d'); ?>" />
                        
                       </div>  

                    
                    <div class="form-group">
                      <label for="InputRemarks">Remarks</label>
                      <input type="text" class="form-control" rows="3" id="InputRemarks" placeholder="Remarks..." name="remarks" required>
                    </div>
                  



                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Verify Stock</button>
                  </div>
                </form>
              </div><!-- /.box -->




    </div><!-- ./wrapper -->
          
          





          </div><!-- /.tab-pane -->
         
    </div><!-- ./wrapper -->
  </body>
</html>
