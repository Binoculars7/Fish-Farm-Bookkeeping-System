<?php
include'../includes/connection.php';
include'../includes/topp.php';
// session_start();
$product_ids = array();
//session_destroy();

//check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'addpos')){
    if(isset($_SESSION['pointofsale'])){
        
        //keep track of how mnay products are in the shopping cart
        $count = count($_SESSION['pointofsale']);
        
        //create sequantial array for matching array keys to products id's
        $product_ids = array_column($_SESSION['pointofsale'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['pointofsale'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['pointofsale'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['pointofsale'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['pointofsale'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['pointofsale'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['pointofsale'] = array_values($_SESSION['pointofsale']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
                ?>
                <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow mb-0">
                  <div class="card-header py-2">
                    <h4 class="m-1 text-lg text-primary">
                      <a href="pos.php" style="color:#4e73df; padding:0.3em 1em; font-size: 17px; border-radius: 20px; text-decoration: none;"><b>Products and Price</b></a><br><hr>
                      <a href="posqq.php" style="color: #4e73df; padding:0.3em 1em; font-size: 17px; border-radius: 20px; text-decoration: none;"><b>Add Customer</b></a><hr>
                      <a href="posq.php" style="color: #4e73df; padding:0.3em 1em; font-size: 17px; border-radius: 20px; text-decoration: none;"><b>Add Sale</b></a>
                  </h4>
                  </div>




                        <!-- /.panel-heading -->
                <div class="card-body">

<h5 style="color:white; background: #4e73df; padding: 0.4em 0em 0.4em 0.4em"><b>Add Customer</b></h5>

                <div class="card-body">
                  
                  <form method="post"> 
                    <input type="text" name="fn" required placeholder="Enter Firstname" style="width: 250px; height: 35px; font-weight: bold; padding: 1.3em 1em; margin: 0.4em 0em 0.3em 0em; border:none; background:#dfe1e9;">
                    <input type="text" name="ln" required placeholder="Enter Lastname" style="width: 250px; height: 35px; font-weight: bold; padding: 1.3em 1em; margin: 0.4em 0em 0.3em 0em; border:none; background:#dfe1e9;"><br>
                    <input type="number" name="pn" required placeholder="Enter Phone number" style="width: 250px; height: 35px; font-weight: bold; padding: 1.3em 1em; margin: 0.4em 0em 0.3em 0em; border:none; background:#dfe1e9;">
                    <input type="text" name="em" placeholder="Enter Email" style="width: 250px; height: 35px; font-weight: bold; padding: 1.3em 1em; margin: 0.4em 0em 0.3em 0em; border:none; background:#dfe1e9;"><br>
                    <input type="submit" name="submitg" value="Add Customer" style="background:#4e73df; color: white; font-weight: bold; border:none; padding: 0.4em 1.2em; margin-top: 0.3em;">


    <?php 

    if (isset($_POST['submitg'])) {
      $fn = $_POST['fn'];
      $ln = $_POST['ln'];
      $pn = $_POST['pn'];
      $em = $_POST['em'];

    $sqlv = "INSERT INTO `customer`(`FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`, `EMAIL`) VALUES ('$fn', '$ln', '$pn', '$em')";
    mysqli_query($db, $sqlv);
    
    echo "<script>window.alert('Customer added')</script>";  

    }

    

    ?>


                  </form>
                  <hr>
                  <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Phone Number</th>
                     <th>Email</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, PRICE, DESCRIPTION, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
    $query = "SELECT * FROM customer GROUP BY CUST_ID";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['FIRST_NAME'].'</td>';
                echo '<td>'. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                echo '<td>'. $row['EMAIL'].'</td>';
                     /* echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                */
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
           




         </div>
       </div> 
     </div>

<?php
#include 'posside.php';
include'../includes/footer.php';
?>