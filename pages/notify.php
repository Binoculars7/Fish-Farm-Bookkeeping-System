<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    //alert("Restricted Page! You will be redirected to POS");
    //window.location = "pos.php";
  </script>
<?php
  }           
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";
?>


<link rel="stylesheet" type="text/css" href="print.css" media="print">

            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Budget Notification &nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>--></h4>
            </div>


            <div>
              <?php  

                  $sqlme = "SELECT * FROM `pondtype`";
                  $queryme = mysqli_query($db, $sqlme);

                  while ($rowme = mysqli_fetch_assoc($queryme)) {
                    $feedname = $rowme['NAMES'];


                  }


                ?>
            </div>


            <?php 

            //if (isset($_POST['fetching'])) {

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

                $queryb = "SELECT * FROM `pondbudget` WHERE ".$mode_b." `DATES` BETWEEN '$beginDate' and '$endDate' order by `DATES`";

                $resultb = mysqli_query($db, $queryb) or die (mysqli_error($db));

                $querybb = "SELECT SUM(FBAG) AS budgets FROM `pondbudget` WHERE ".$mode_b." `DATES` BETWEEN '$beginDate' and '$endDate' order by `DATES`";

                $resultbb = mysqli_query($db, $querybb) or die (mysqli_error($db));

//hmmmm

                $query = "SELECT *, SUM(PRICE) AS pricetotal FROM `expenditure` WHERE ".$mode_." `DATES` BETWEEN '$beginDate' and '$endDate' group by `POND` order by `POND`";

                $querying = "SELECT *, SUM(FBAG) AS pricetotalb FROM `pondbudget` WHERE ".$mode_." `DATES` BETWEEN '$beginDate' and '$endDate' group by `FNAME` order by `FNAME`";

                $queryz = "SELECT * FROM `expenditure` WHERE ".$mode_." `DATES` BETWEEN '$beginDate' and '$endDate' order by `DATES` ASC LIMIT 1";

                $querys = "SELECT SUM(PRICE) AS sumqty FROM `expenditure` WHERE ".$mode_." `DATES` BETWEEN '$beginDate' and '$endDate' order by `DATES`";


                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                $resulting = mysqli_query($db, $querying) or die (mysqli_error($db));

                $resultz = mysqli_query($db, $queryz) or die (mysqli_error($db));

                $results = mysqli_query($db, $querys) or die (mysqli_error($db));

                $count = mysqli_num_rows($result);

                $rowz = mysqli_fetch_assoc($resultz);

                $idd = isset($rowz['ID']);

                  $idds = $idd - 1;
 

                

                $queryd = "SELECT * FROM `expenditure` WHERE ".$mode_." `ID`='$idds'";
                $resultd = mysqli_query($db, $queryd) or die (mysqli_error($db));



            //}
            ?>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
            
                   
            
      

<?php 

  if ($count == "0") {
        echo "<h2 style='text-align:center; font-size:23px;'>No information found !!! </h2>";
  }elseif($count != "0"){                 
    #$query = "SELECT * FROM `expenditure`";
        #$result = mysqli_query($db, $query) or die (mysqli_error($db));
    echo "<p style='background:#224abe; margin-bottom:0em; padding:0.3em 1em; color:white;'><big><b>Budget Notifier</b></big></p>";
    

    $rowd = mysqli_fetch_assoc($resultd);

    #echo "<br><b>B/F: N".$rowd['NET_INCOME']."</b>";

    echo "

    <tr>
                    
                     <th>Type</th>
                     <th>Budget</th>
                     <th>Expenses</th>
                     <th>Alert</th>
                     
                   </tr>

    ";


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


    
        echo "<tr>                    
                    <td>".$pondss."</td>
                    <td>".$amountii."</td>
                    <td>".$quantityii."</td>
                    <td>".$alert."</td>
                     

            </tr>";
}


        

$queryi = "SELECT COUNT(DISTINCT `NAMES`) AS `cid_no` FROM `expenditure` WHERE ".$mode_." `DATES` BETWEEN '$beginDate' and '$endDate'";

$resulti = mysqli_query($db, $queryi) or die (mysqli_error($db));

$rowi = mysqli_fetch_assoc($resulti);
$cid_no = $rowi['cid_no'];


$rowb = mysqli_fetch_assoc($resultb);
if (isset($rowb['FNAME'])) {
  $budgetb = $rowb['FNAME'];
}else{
  $budgetb = '';
}


$rowbb = mysqli_fetch_assoc($resultbb);
if (isset($rowbb['budgets'])) {
  $budgetbb = $rowbb['budgets'];
}else{
  $budgetbb = 0;
}


   while ($rows = mysqli_fetch_assoc($results)) {

  if (isset($rows['sumqty'])) {
    $qtys = $rows['sumqty'];
  }else{
    $qtys = 0;
  }


    if ($mode_type == "Others") {
      $mode_type = 'Other Areas';
    }else{
      $mode_type = $mode_type;
    }



$alerts = '<i class="fas fa-fw fa-info-circle" style="color:red;"></i>';
$alerte = '<i class="fas fa-fw fa-info-circle" style="color:green;"></i>';
if ($qtys >= $budgetbb) {
  $alert = $alerts;
}else{
  $alert = $alerte;
}

    
echo "<tr>                    
                     <th><b>TOTAL</b></th>
                     <th>".$budgetbb."</th>
                     <th><b>".$qtys."</b></th>
                     <th>".$alert."</th>
                     
                   </tr>";
}

                      }

?> 
                                    
                         
                            </table>
                        </div>

<br>


                        <span class="printme" style='text-align:center; background:#224abe; color: white; padding:0.3em 0em; margin-left: 0.2em; width: 200px;'><a href='#' onclick="window.print()" style=" padding: 2em 1em; color: white;">Print</a></span>
                    </div>

                  </div>

<?php
include'../includes/footer.php';
?>

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
          <!-- <div class="form-group">
             <input class="form-control" placeholder="Product Code" name="prodcode" required>
           </div> -->
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
           </div>
           <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $sup;
             ?>
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock" required>
           </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>