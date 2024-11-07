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
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Sub Church's Detail</h4>
            </div>
            <a href="sub.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">
          <?php 
            $query = 'SELECT `JOB_ID`, `JOB_TITLE` FROM `job` WHERE `JOB_ID` ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['JOB_ID'];
                $a= $row['JOB_TITLE'];
              }
              $id = $_GET['id'];
          ?>
                
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5 style='font-size:15px;'>
                          Full Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5 style='font-size:15px;'>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>
                    
                     <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5 style='font-size:15px;'>
                          Members Count<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5 style='font-size:15px;'>
                            : <?php                  
            $query = "SELECT *, count(`JOB_ID`) as `no_name` FROM `employee` WHERE `JOB_ID`='".$zz."' ORDER BY `FIRST_NAME`";
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
           $row = mysqli_fetch_assoc($result);echo $row['no_name'];
?> Members
                          
                        </h5>
                      </div>
                    </div>
                    
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5 style='font-size:15px;'>
                          Members<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h6 style='font-size:13px;'>
                            <?php                  
            $query = "SELECT * FROM `employee` WHERE `JOB_ID`='".$zz."' ORDER BY `FIRST_NAME`";
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
           echo "<ol style='margin-left:-2em;'>";
            while ($row = mysqli_fetch_assoc($result)) {

              
                echo '<li>'. $row['FIRST_NAME'].'</li>';
                }
                    echo '</ol>';
?> 
                          
                        </h6>
                      </div>
                    </div>
                    
          </div>
          </div>

<?php
include'../includes/footer.php';
?>