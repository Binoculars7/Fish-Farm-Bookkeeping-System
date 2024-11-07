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
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      //alert("Restricted Page! You will be redirected to POS");
                      //window.location = "login.php";
                  </script>
             <?php   }   
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

<style type="text/css">
  .addRemove{
    display: none;
  }
  input{
    width: 300px;
  }
  @media(max-width:600px){
  input{
      width: 100%;
  }
  }
</style>

            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              
              
                
           <form method="post" class="myform" style="text-align:center;">
                <input type="text" name="exp_category" style="margin-bottom:0.3em; border: 1px solid grey; padding:0.3em 0.5em; font:17px calibri; text-transform:capitalize;" placeholder="Add expenses category" required><br>
                <input type="submit" name="exp_submit" style="font:bold 15px calibri;" class="btn btn-primary bg-gradient-primary"  type="button" value="Add Category"><br>
                
              

<?php  
  if (isset($_POST['exp_submit'])) {
    $exp_categories = trim($_POST['exp_category']);
    if($exp_categories == "" or $exp_categories == " "){

    }else{
        $fileReadname = fopen('exp_cat.txt', 'r');
        $fileRead = fread($fileReadname, '7000');
        //$fileRead = str_replace(" ", "", $fileReads);

        if ($fileRead == "" or $fileRead == " ") {
          $fileWrite = fopen('exp_cat.txt', 'w');
          $new_exp_categories = $exp_categories;
          $fileWrites = fwrite($fileWrite, $new_exp_categories);
          echo"<script>alert('Category was added successfully!');</script>";
          //echo "<nav style='font: 15px calibri black; margin-top:0.4em;'>Added Successfully</nav>";
        }else{
          $fileWrite = fopen('exp_cat.txt', 'w');
          $new_exp_categories = $fileRead.','.$exp_categories;
          $fileWrites = fwrite($fileWrite, $new_exp_categories);
          echo"<script>alert('Category was added successfully!');</script>";
          //echo "<nav class='addRemove' style='font: 15px calibri black; margin-top:0.4em;'>Added Successfully</nav>";
        }

        
    }
  }
  
?>
              </form>
              
              <hr>       
                
                
                
              <h4 class="m-2 font-weight-bold text-primary">Expenditure&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
          
                     <th>Name</th>
                     <th>Amount</th>
                     <th>Pond</th>
                     <!--<th>Cost per one</th>
                     <th>Total cost</th>
                     <th>Profit</th>-->
                     <th>Date</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
   /* $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
   */
        $query = "SELECT * FROM `expenditure`";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['NAMES'].'</td>';
                echo '<td>'. $row['POND'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';

               # $onePrice = $row['PRICE']/$row['QUANTITY'];
                
                #echo '<td>'.$onePrice.'</td>';
               # echo '<td>'. $row['PRICE'].'</td>';
                #echo '<td>'. $row['PROFIT'].'</td>';
                echo '<td>'. $row['DATES'].'</td>';
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
          <h5 class="modal-title" id="exampleModalLabel">Add Expenses</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="expen_transac.php?action=add">
          <!-- <div class="form-group">
             <input class="form-control" placeholder="Product Code" name="prodcode" required>
           </div> 
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div><div class="form-group">
            <select class="form-control" name="name" required>
              <option value="">Select Product</option>
              <?php 

              #$sql = "SELECT * FROM `product`";

              #$query = mysqli_query($db, $sql);

              #while($rows = mysqli_fetch_assoc($query)){

             # $pdname = $rows['NAME'];

              #echo "<option value='".$pdname."'>".$pdname."</option>";
            #}
              ?>
            </select>
           </div>
           -->
           
           <!--
           <div class="form-group">
             <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
         -->
         
 <div class="form-group">



        <select class="form-control" name="ponds" required>
          <option value="">Select POND</option>

          <?php  

        $query = "SELECT * FROM `pondtype`";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<option value="'.$row['NAMES'].'">'. $row['NAMES'].'</option>';


              }




          ?>
          <option value="Others">Other Areas</option>



        </select>
</div>


 <div class="form-group">

             <select class="form-control" name="names" required>
               <option value="">Select Category</option>
               <?php 
                    $fileReadname = fopen('exp_cat.txt', 'r');
                    $fileRead = fread($fileReadname, '7000');
                    //$fileRead = str_replace(" ", "", $fileReads);
                    if ($fileRead == "" ) {
                      
                    }else{
                      $categories = explode(',', $fileRead);
                      $new_catt = array_unique($categories);
                      $num_of_cat = sizeof($new_catt);
                      for ($i=0; $i <= $num_of_cat; $i++) { 
                        if ($new_catt[$i] == "" or $new_catt[$i] == " ") {
                          
                        }else{
                          echo "<option value = '".$new_catt[$i]."'>".$new_catt[$i]."</option>";
                        }
                        
                      }

                    }
               ?>
             </select>
           </div>
           
           

           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Price" name="prices" required>
           </div>
           <!--
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
           </div>
         
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
           </div>-->
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
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Sale Date" name="dates" required>
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