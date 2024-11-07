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
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary"><small><b>Enter Payment Received <i class="fas fa-fw fa-stamp"> </i></b></small>&nbsp;
                <form method="post">
                  <input type="text" name="c_id" style="width: 152px; font:bold 16px calibri; padding:0.4em 1em 0.4em 0.4em;" placeholder="Enter Customer ID" required>
                  <select name="mode" style="width: 152px; font:bold 16px calibri; padding:0.4em 1em 0.4em 0.4em;" required>
                    <option value="">-Select Mode-</option>
                    <option value="Bank">Bank</option>
                    <option value="Cash">Cash</option>
                  </select>
                  <input type="submit" name="submit_cid" style="background:#4e73df !important; color:white; font:bold 16px calibri; padding:0.4em 1em;">

<?php  

    if (isset($_POST['submit_cid'])) {
      $customer_id = $_POST['c_id'];
      $mode = $_POST['mode'];

      $query_id = "SELECT CID, SUM(PRICE) as qprice, SUM(QUANTITY) as qqty FROM `sale_entry` WHERE `CID` = '$customer_id' ORDER BY `CID` DESC";
      $result_id = mysqli_query($db, $query_id) or die (mysqli_error($db));

      while ($row_id = mysqli_fetch_assoc($result_id)) {
                                             
          //echo $row_id['CID'];
          if (isset($row_id['CID']) == "") {
            echo "<span style='color:red; font-size:17px;'>Invalid Customer ID!</span>";
          }else{
            $cid = $row_id['CID'];
            $amt = $row_id['qprice'];
            $qty = $row_id['qqty'];
            $date = date('Y-m-d');
            $c_mode = $mode;

            $second_query = "SELECT CID FROM `cashier_confirmation` WHERE `CID` = '$cid'";
            $second_result = mysqli_query($db, $second_query);

            $second_row = mysqli_fetch_assoc($second_result);
                if (isset($second_row['CID']) != '') {
                  echo "<span style='color:red; font-size:17px;'>Customer ID exist !!!</span>";
                }else{
                  $SQL_id = "INSERT INTO `cashier_confirmation`(`CID`, `AMOUNT`, `QUANTITY`, `DATE_CONFIRMED`, `MODE`) VALUES ('$cid','$amt','$qty','$date','$c_mode')";
                $query = mysqli_query($db, $SQL_id);

                   echo "<script>alert('Payment confirmed successfully!');</script>";
              
                }
          //}


            

            
          }
        }

    }

?>


                </form>
              </h4>

            </div>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Cashier: <i class="fas fa-fw fa-tv"></i> &nbsp;</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
          
                     <th>CID</th>
            
                     <th>Total Quantity</th>
                     <th>Total Amount</th>
                     <!--<th>Profit</th>-->
                     <th>Date</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
   /* $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
   */
        $queryb = "SELECT * FROM `cust_id` ORDER BY `ID` DESC";
        $resultb = mysqli_query($db, $queryb) or die (mysqli_error($db));

        while ($rowb = mysqli_fetch_assoc($resultb)) {
          $cusd = $rowb['CID'];

          $query = "SELECT SUM(PRICE) as qprice, SUM(QUANTITY) as qqty FROM `sale_entry` WHERE `CID` = '$cusd' ORDER BY `CID` DESC";
          $result = mysqli_query($db, $query) or die (mysqli_error($db));

          $querym = "SELECT * FROM `sale_entry` WHERE `CID` = '$cusd' ORDER BY `CID` DESC";
          $resultm = mysqli_query($db, $querym) or die (mysqli_error($db));
          $rowm = mysqli_fetch_assoc($resultm);

              while ($row = mysqli_fetch_assoc($result)) {
                                 
                
                if (isset($rowm['CID']) == '') {
                
                }else{
                echo '<tr>';  
                echo '<td>'. $rowm['CID'].'</td>';
                echo '<td>'. $row['qqty'].'</td>';

                echo '<td>'. $row['qprice'].'</td>';
                #echo '<td>'. $row['PROFIT'].'</td>';
                echo '<td>'. $rowm['SALE_DATE'].'</td>';
                      /*echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['NAME'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['NAME']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="background:grey; border-radius: 0px; border:1px solid;" href="pro_del.php?action=delete & id='.$row['NAME']. '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                          */
                echo '</tr> ';
}
                        }

        }



        
      
            
?> 
                                    
                                </tbody>
                            </table>
                        </div>
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
          <h5 class="modal-title" id="exampleModalLabel">Add Sale</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="purch_transac.php?action=add">
          <!-- <div class="form-group">
             <input class="form-control" placeholder="Product Code" name="prodcode" required>
           </div> 
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>
           -->
           <div class="form-group">
            <select class="form-control" name="cuid" required>
              <option value="">Select Customer's ID</option>
              <?php 
              date_default_timezone_set("africa/lagos");
              $datess = date("Y-m-d");
              #$dateh = date("d");
              #$dakk = $dateh - 1;
              #$dakkk = date("Y-m")."-".$dakk;
              $sql = "SELECT * FROM `cust_id` WHERE `DATESS` = '$datess' ORDER BY `ID` DESC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $ciddd = $rows['CID'];

              echo "<option value='".$ciddd."'>".$ciddd."</option>";
            }
              ?>
            </select>
           </div>

           <div class="form-group">
            <select class="form-control" name="name" required>
              <option value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product`";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
           </div>
           <!--
           <div class="form-group">
             <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
         -->
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
           </div>
           <!--
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
           </div>
         -->
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
           </div>
           <!--
           <div class="form-group">
             <?php
              # echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <?php
               #echo $sup;
             ?>
           </div>
           -->
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Sale Date" name="datestock" required>
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