<?php
include'../includes/connection.php';
session_start();
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php





              #$pc = rand(10000, 999999); 
              #$_POST['prodcode'];


            // fixed variables
              $cuid = $_POST['cuid'];
              $dats = $_POST['datestock']; 

              // variable that will be looped

              for ($i=1; $i <= 10 ; $i++) { 
                $ni = 'name'.$i;
                $qi = 'quantity'.$i;




                $name = $_POST[$ni];
              #$desc = $_POST['description'];
              $qty = $_POST[$qi];
              #$oh = $_POST['onhand'];

              if ($name == '' || $qty == '') {
                
              }else{


            #$_POST['price']
             $openfile = fopen('price.txt','r');
             $read = fread($openfile, '100');
             $prq = $read;
             $close = fclose($openfile);

              #$cat = $_POST['category'];
              #$supp = $_POST['supplier'];
              


              $sqlz = "SELECT * FROM `product` where `NAME` = '$name'";

              $queryz = mysqli_query($db, $sqlz);

              $rowz = mysqli_fetch_assoc($queryz);

              $pr = $rowz['ON_HAND'];
              $pdprice = $rowz['PRICE'];
              $pdqty = $rowz['QTY_STOCK'];
  

              $profits = $pr - $pdprice;
              $profit = $profits * $qty;


              $remqty = $pdqty - $qty;

              $prs = $pr * $qty;

              $sqly = "UPDATE `product` SET `QTY_STOCK` = $remqty WHERE `NAME` = '$name'";

              $queryy = mysqli_query($db, $sqly);



              $sqlx = "SELECT * FROM `sale_entry` order by `id` desc limit 1";

              $queryx = mysqli_query($db, $sqlx);

              $rowx = mysqli_fetch_assoc($queryx);

              $netprice = $rowx['NET_INCOME'];
              $netp = $rowx['NET_PROFIT'];
  
              $netincome = $prs + $netprice;

              $netprofit = $profit + $netp;

        
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO sale_entry
                              (NAME, QUANTITY, PRICE, PROFIT, OPENING_STOCK, RQUANTITY, NET_INCOME, NET_PROFIT, SALE_DATE, CID)
                              VALUES ('{$name}',{$qty},{$prs},{$profit},{$pdqty},{$remqty},{$netincome},{$netprofit},'{$dats}','{$cuid}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                    unset($_SESSION['local_cid']);
                break;
              }



              }

              }

              
            ?>
              <script type="text/javascript">window.location = "purchase.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>