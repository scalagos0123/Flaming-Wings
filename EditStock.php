<!DOCTYPE html>
<?php

session_start();

?>
<html>
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flaming Wings | Edit Stock</title>

   <?php include ("templates/imports.php"); ?>
  <!-- PHP --> 
   <?PHP 
   include("dbconnection.php")

   ?>
   

    <!-- HEADER -->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
   <?php include ("templates/navbar.php"); ?>
      <?php include ("templates/sidebar.php"); ?>
     

       <!--SEARCH STOCK--> 
    <div class="content-wrapper">
      <form action="EditSearchStock.php" method="get" class="sidebar-form">
            <div class="col-xs-10">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>SEARCH STOCK</b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                     <!-- <label for="inputQuery" class="col-sm-2 control-label">Stock code</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputQuery" name="query" placeholder="Enter stock code" required>
                      </div>-->

                      <label for="inputQuery" class="col-sm-2 control-label">Stock code</label>
               
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputQuery" name="varname" placeholder="Enter stock code">
                        </div>
                       
                      </select>

                    </div>
                  <div class="box-footer">
                    <input type="submit" class="btn btn-info pull-right" value="Search"/>
                  </div><!-- /.box-footer -->
                </form>
              </div>
            </div>
          </form>

 <div class="box box-primary">
            <div class="box-body">
                  <table id="stocktable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stock Code</th>
                        <th>Stock Category/Type</th>
                        <th>Stock Name</th>
                    <!--    <th>End Inventory</th> -->
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $stock_code = isset($_GET['stock_code']) ? $_GET['stock_code'] : '';
                        $sql = mysqli_query($connect, "SELECT stock_id, stock_type, sname 
                          FROM stock AS s, stocktype AS type 
                          WHERE s.stocktype_id=type.stocktype_id 
                          AND deactivate= '0' 
                          ORDER BY stock_id DESC");
                        while ($row = mysqli_fetch_array($sql)){
                          echo "<tr>"; 
                          echo "<td>".$row['stock_id']."</td>"; //stockcode
                          echo "<td>".$row['stock_type']."</td>"; //type
                          echo "<td>" .$row['sname']."</a></td>"; //itemname
                          echo "<td><a href='EditSearchStock.php?varname=".$row['stock_id']."'> Edit</a></td>"; //itemname
                          echo "</tr>";

                        }
                         ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

    </div><!-- ./wrapper -->
          



         
    </div><!-- ./wrapper -->

   
    <script>
       $(document).ready(function(e)){ 
        $.ajax({ 
          url: "try.php". 
          data: { 
            inputQuery : $("#inputQuery").val()
          },

          dataType : "json", 
          type : "post", 
          success: function(data){ 
            alert(data.myrealarr[0])}; 
        });
       }
    </script>
  </body>
</html>
