<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              #$pc = rand(10000, 999999); 
              #$_POST['prodcode'];
              $names = $_POST['names'];
              $pond = $_POST['ponds'];
              #$desc = $_POST['description'];
              #$qty = $_POST['quantity'];
              #$oh = $_POST['onhand'];
              $pr = $_POST['prices']; 
              #$cat = $_POST['category'];
              #$supp = $_POST['supplier'];
              $dats = $_POST['dates']; 

        
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO expenditure
                              (NAMES, POND, PRICE, DATES)
                              VALUES ('{$names}','{$pond}',{$pr},'{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating expenditure in Database '.$query);
                break;
              }
            ?>
              <script type="text/javascript">window.location = "expenses.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>