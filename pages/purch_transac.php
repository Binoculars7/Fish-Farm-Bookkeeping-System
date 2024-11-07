<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              #$pc = rand(10000, 999999); 
              #$_POST['prodcode'];
              $cuid = $_POST['cuid'];
              $nameg = $_POST['name'];
              $sname = $_POST['sname'];
              $name = $nameg." (".$sname.")";
              #$desc = $_POST['description'];
              $qty = $_POST['quantity'];
              $prs = $_POST['price'];
              #$oh = $_POST['onhand'];
              
              $dats = $_POST['datestock'];
              $prss = $prs * $qty;



              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO `sale_entry`(`NAME`, `QUANTITY`, `PRICE`, `PROFIT`, `OPENING_STOCK`, `RQUANTITY`, `NET_INCOME`, `NET_PROFIT`, `SALE_DATE`, `CID`) VALUES ('$name', '$qty', '$prss', '$prss', '0', '0', '$prss', '$prss', '$dats', '$cuid')";
                    mysqli_query($db,$query) or die ('Error in updating product in Database '.$query);
                break;
              }

            ?>
              <script type="text/javascript">window.location = "purchases.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>