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
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">
                <small><b>Last CID:</b></small>
                <?php 
              /*date_default_timezone_set("africa/lagos");
              $datess = date("Y-m-d");
              #$dateh = date("d");
              #$dakk = $dateh - 1;
              #$dakkk = date("Y-m")."-".$dakk;
              $sql = "SELECT * FROM `cust_id` WHERE `DATESS` = '$datess' ORDER BY `ID` DESC LIMIT 1";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $ciddd = $rows['CID'];

              echo $ciddd;
            }*/
            if (isset($_SESSION['local_cidd'])) {
              echo $_SESSION['local_cidd'];
            }else{
              echo "none";
            }
            
              ?>



                <form id="myForm" onsubmit="confirmSubmit(event)" method="post" style="text-align: right;">
                <button id="submitBtn" class="btn btn-primary bg-gradient-primary" name="cidd" style="border-radius: 0px; font: 16px calibri; font-weight: bold; margin-bottom: 0.3em;">NEW ID <i class="fas fa-fw fa-plus" style=""></i></button>
              </form>

                 <script>

                  $(document).ready(function(){
                    $('#submitBtn').click(function(){
                      if (confirm('Do you want to continue?')) {
                        $.ajax({
                          type:"POST",
                          url: "cidgenerator.php",
                          data:$("myForm").serialize(),
                          success:function(response){
                            //alert(response);
                          }
                        });
                      }
                    });
                  });
        
                  </script>


                  
                <div>
                  <span><input type="radio" id="_entry1" name="_entry" checked><small> Local</small></span>
                  <span><input type="radio" id="_entry2" name="_entry"> <small> Global</small>
                </div></span>

                <hr>Sale Entry&nbsp; 
                <a  href="#" data-toggle="modal" id="local" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i id="local" class="fas fa-fw fa-plus"></i></a>
                <a  href="#" data-toggle="modal" id="global" data-target="#bModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i id="global" class="fas fa-fw fa-plus"></i></a>
                
              </h4>
            </div>

            <script type="text/javascript">
              //$(document).ready(function(){\

              
              if ($('#_entry1').prop('checked', true)) {
                  $('#global').hide();
                  $('#local').show();
              }


              $('#_entry1').change(function(){
                
                if($(this).is(':checked')){
                  $('#global').hide();
                  $('#local').show();
                }
              });

                
              $('#_entry2').change(function(){
                //var entry1 = $('#_entry1').prop('checked');
                if($(this).is(':checked')){
                  $('#local').hide();
                  $('#global').show();
                }
              });  

                //});


                //var _entry2 = $('#_entry2').prop('clicked', true);
                
               
            </script>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
          
                     <th>CID</th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>Cost per one</th>
                     <th>Total cost</th>
                     <!--<th>Profit</th>-->
                     <th>Date</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
   /* $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
   */
        $query = "SELECT * FROM `sale_entry` ORDER BY `SALE_DATE` DESC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                 echo '<td>'. $row['CID'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['QUANTITY'].'</td>';

                $onePrice = $row['PRICE']/$row['QUANTITY'];
                
                echo '<td>'.$onePrice.'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                #echo '<td>'. $row['PROFIT'].'</td>';
                echo '<td>'. $row['SALE_DATE'].'</td>';
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



















 <!-- Local Sale Entry Product Modal-->

 <!-- Multilocal Sale Entry Product Modal-->

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Local Sales</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="purch_transac_m.php?action=add">
          <!-- 
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>
           -->


            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> 

             <hr>  
           <div class="form-group">

          <!-- cid & date -->

<div class="form-group">
            <select class="form-control" name="cuid" required>
              <!--<option value="">Select Customer's ID</option>-->

              <?php  
                if (isset($_SESSION['local_cid'])) {
                  
                }else{
                  echo "<option value=''>Select Customer's ID</option>";
                }
              ?>
              <?php 
              /*date_default_timezone_set("africa/lagos");
              $datess = date("Y-m-d");
              #$dateh = date("d");
              #$dakk = $dateh - 1;
              #$dakkk = date("Y-m")."-".$dakk;
              $sql = "SELECT * FROM `cust_id` WHERE `DATESS` = '$datess' ORDER BY `ID` DESC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $ciddd = $rows['CID'];

              echo "<option value='".$ciddd."'>".$ciddd."</option>";
            }*/

            if (isset($_SESSION['local_cid'])) {
              $local_cidd = $_SESSION['local_cid'];
              echo "<option value='".$local_cidd."'>".$local_cidd."</option>";
            }else{
              
            }

              ?>
            </select>

</div>

 <div class="form-group">
             <input id="present_dates" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Sale Date" name="datestock" required>
           </div>
<?php 

$present_dates = date('Y-m-d');
echo "<script>
$('#present_dates').val('".$present_dates."');
</script>";

 ?>

           



            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
              <tr>

                <th>PRODUCT</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
              </tr>

<!-- selection 1 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name1" onchange="showUserss1(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity1">
</td>
                <!-- price -->
                <td>         
                  
             <input type="number" id="needd1"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price1"  disabled value="">
          </td>
              </tr>
<!-- end of selection 1 -->

<!-- selection 2 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name2" onchange="showUserss2(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity2">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd2"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price2"  disabled value="">
</td>
              </tr>
<!-- end of selection 2 -->





<!-- selection 3 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name3" onchange="showUserss3(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity3">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd3"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price3"  disabled value="">
</td>
              </tr>
<!-- end of selection 3 -->





<!-- selection 4 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name4" onchange="showUserss4(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity4">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd4"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price4"  disabled value="">
</td>
              </tr>
<!-- end of selection 4 -->





<!-- selection 5 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name5" onchange="showUserss5(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity5">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd5"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price5"  disabled value="">
</td>
              </tr>
<!-- end of selection 5 -->


<!-- selection 6 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name6" onchange="showUserss6(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity6">
</td>
                <!-- price -->
                <td>         
                  
             <input type="number" id="needd6"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price6"  disabled value="">
          </td>
              </tr>
<!-- end of selection 6 -->

<!-- selection 7 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name7" onchange="showUserss7(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity7">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd7"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price7"  disabled value="">
</td>
              </tr>
<!-- end of selection 7 -->





<!-- selection 8 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name8" onchange="showUserss8(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity8">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd8"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price8"  disabled value="">
</td>
              </tr>
<!-- end of selection 8 -->





<!-- selection 9 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name9" onchange="showUserss9(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity9">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd9"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price9"  disabled value="">
</td>
              </tr>
<!-- end of selection 9 -->





<!-- selection 10 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name10" onchange="showUserss10(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity10">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needd10"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price10"  disabled value="">
</td>
              </tr>
<!-- end of selection 5 -->


            </table>
           </div>
         </div>
            


            <hr>  
          </form>  
        </div>
      </div>
    </div>
  </div>





<script>
function showUserss1(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd1').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>


<script>
function showUserss2(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd2').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>


<script>
function showUserss3(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd3').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



<script>
function showUserss4(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd4').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



<script>
function showUserss5(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd5').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>




<script>
function showUserss6(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd6').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



<script>
function showUserss7(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd7').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>




<script>
function showUserss8(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd8').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>




<script>
function showUserss9(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd9').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>





<script>
function showUserss10(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needd10').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



















  <!-- Global Sale Entry Product Modal-->

 <!-- MultiGlobal Sale Entry Product Modal-->

  <!-- Product Modal-->
  <div class="modal fade" id="bModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Global Sales</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="purch_transac_m.php?action=add">
          <!-- 
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>
           -->


            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> 

             <hr>  
           <div class="form-group">

          <!-- cid & date -->

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
             <input id="present_datess" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Sale Date" name="datestock" required>
           </div>
<?php 

$present_dates = date('Y-m-d');
echo "<script>
$('#present_datess').val('".$present_dates."');
</script>";

 ?>

           



            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
              <tr>

                <th>PRODUCT</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
              </tr>

<!-- selection 1 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name1" onchange="showUsers1(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity1">
</td>
                <!-- price -->
                <td>         
                  
             <input type="number" id="needdd1"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price1"  disabled value="">
          </td>
              </tr>
<!-- end of selection 1 -->

<!-- selection 2 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name2" onchange="showUsers2(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity2">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd2"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price2"  disabled value="">
</td>
              </tr>
<!-- end of selection 2 -->





<!-- selection 3 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name3" onchange="showUsers3(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity3">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd3"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price3"  disabled value="">
</td>
              </tr>
<!-- end of selection 3 -->





<!-- selection 4 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name4" onchange="showUsers4(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity4">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd4"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price4"  disabled value="">
</td>
              </tr>
<!-- end of selection 4 -->





<!-- selection 5 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name5" onchange="showUsers5(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity5">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd5"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price5"  disabled value="">
</td>
              </tr>
<!-- end of selection 5 -->


<!-- selection 6 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name6" onchange="showUsers6(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity6">
</td>
                <!-- price -->
                <td>         
                  
             <input type="number" id="needdd6"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price6"  disabled value="">
          </td>
              </tr>
<!-- end of selection 6 -->

<!-- selection 7 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name7" onchange="showUsers7(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity7">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd7"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price7"  disabled value="">
</td>
              </tr>
<!-- end of selection 7 -->





<!-- selection 8 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name8" onchange="showUsers8(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity8">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd8"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price8"  disabled value="">
</td>
              </tr>
<!-- end of selection 8 -->





<!-- selection 9 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name9" onchange="showUsers9(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity9">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd9"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price9"  disabled value="">
</td>
              </tr>
<!-- end of selection 9 -->





<!-- selection 10 -->
               <tr class="reduced_table">
                <!-- number -->
                <!-- select product -->
                <td>

            <select id="hy" class="form-control" name="name10" onchange="showUsers10(this.value)">
              <option id="hy" value="">Select Product</option>
              <?php 

              $sql = "SELECT * FROM `product` ORDER BY `NAME` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAME'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
                <!-- quantity -->
                <td>
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity10">
           </td>
                <!-- price -->
                <td>         
                 
             <input type="number" id="needdd10"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price10"  disabled value="">
</td>
              </tr>
<!-- end of selection 5 -->


            </table>
           </div>
         </div>
            


            <hr>  
          </form>  
        </div>
      </div>
    </div>
  </div>





<script>
function showUsers1(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd1').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>


<script>
function showUsers2(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd2').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>


<script>
function showUsers3(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd3').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



<script>
function showUsers4(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd4').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



<script>
function showUsers5(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd5').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>




<script>
function showUsers6(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd6').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



<script>
function showUsers7(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd7').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>




<script>
function showUsers8(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd8').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>




<script>
function showUsers9(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd9').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>





<script>
function showUsers10(str) {
  if (str == "") {
    document.getElementById("jj").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("jj").innerHTML = this.responseText;
        $('#needdd10').val(this.responseText);

      }
    };
    xmlhttp.open("GET","purchf.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>