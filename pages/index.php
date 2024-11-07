<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
    //then it will be redirected
    //alert("Restricted Page! You will be redirected to POS");
    //window.location = "pos.php";
  </script>
             <?php   }
                         
           
}   
            ?>
          <div class="row show-grid">
            <!-- Customer ROW -->
            <div class="col-md-3">
            <!-- Customer record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM customer";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Supplier record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM supplier";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
            <!-- Employee ROW -->
          <div class="col-md-3">
            <!-- Employee record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM employee";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- User record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Account</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM users WHERE TYPE_ID=2";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- PRODUCTS ROW -->
          <div class="col-md-3">
            <!-- Product record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Feed List</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                          $query = "SELECT COUNT(*) FROM feedlist";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "$row[0]";
                            }
                          ?> Record(s)
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            </div>
            
            
          <!-- RECENT PRODUCTS -->
                <div class="col-lg-3">
                    <div class="card shadow h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="panel-heading"> Recent Products
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="list-group">
                              <?php 
                                $query = "SELECT FNAME FROM feedlist order by ID DESC LIMIT 10";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {

                                    echo "<a href='#' class='list-group-item text-gray-800'>
                                          <i class='fa fa-tasks fa-fw'></i> $row[0]
                                          </a>";
                                  }
                              ?>
                            </div>
                            <!-- /.list-group -->
                            <a href="attf.php" class="btn btn-default btn-block">View All Products</a><hr>
                      <a href="notify.php" style="text-decoration: none; color: black;">Notification {<i class="fas fa-fw fa-bell" style="color:red; font-size: 18px;"></i>
<?php  

        $mode_type = 'all';


        if ($mode_type == 'all') {
            $mode_ = ""; 
        }else{
            $mode_ = "`POND` = '".$mode_type."' and";
        }



        $mode_type = 'all';
        if ($mode_type == 'all') {
            $mode_b = ""; 
        }else{
            $mode_b = "`FNAME` = '".$mode_type."' and";
        }

        $beginDate = "2020-09-23";
        $endDate = date('Y-m-d');


$query = "SELECT *, SUM(PRICE) AS pricetotal FROM `expenditure` WHERE ".$mode_." `DATES` BETWEEN '$beginDate' and '$endDate' group by `POND` order by `POND`";

$querying = "SELECT *, SUM(FBAG) AS pricetotalb FROM `pondbudget` WHERE ".$mode_." `DATES` BETWEEN '$beginDate' and '$endDate' group by `FNAME` order by `FNAME`";

$result = mysqli_query($db, $query) or die (mysqli_error($db));
$resulting = mysqli_query($db, $querying) or die (mysqli_error($db));



$notifier = 0;

    while ($row = mysqli_fetch_assoc($result)) {
      $rowing = mysqli_fetch_assoc($resulting);



    //$cidii = $row['ID'];
    $amountii = $rowing['FBAG'];
    $pondss = $row['POND'];
    $quantityii = $row['pricetotal'];
    $datew = $row['DATES'];



if (isset($amountii)) {
    $amountii = $rowing['FBAG'];
  }else{
    $amountii = 0;
  }



if (isset($quantityii)) {
    $quantityii = $row['pricetotal'];
  }else{
    $quantityii = 0;
  }



$alerts = '<i class="fas fa-fw fa-info-circle" style="color:red;"></i>';
$alerte = '<i class="fas fa-fw fa-info-circle" style="color:green;"></i>';
if ($amountii >= $quantityii) {
  $alert = $alerte;
}else{
  $alert = $alerts;
  $notifier = $notifier + 1;
}


}

echo $notifier;


?>


}








                      </a><hr>
                        </div>
                        <!-- /.panel-body -->
                    </div></div></div></div></div></div>
          <!-- 
          <div class="col-md-3">
           <div class="col-md-12 mb-2">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><i class="fas fa-list text-danger">&nbsp;&nbsp;&nbsp;</i>Recent Products</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $query = "SELECT NAME FROM product order by PRODUCT_ID DESC LIMIT 10";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "<ul style='list-style-position: outside'>";
                              echo "<li>$row[0]</li>";
                              echo "</ul>";
                            }
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> -->
            

          </div>
        </div>
        

<?php
include'../includes/footer.php';
?>