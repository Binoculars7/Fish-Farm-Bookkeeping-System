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
              <h4 class="m-2 font-weight-bold text-primary">Category Detail</h4>
            </div>
            <a href="attc.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">
          <?php 
            $query = 'SELECT `ID`, `FSIZE`,  `FTYPE`, `PTYPE`, `NFISH`, `DATE` FROM `fishcat` WHERE `ID` ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz = $row['ID'];
                $a = $row['FSIZE'];
                $d = $row['DATE'];
                $e = $row['FTYPE'];
                $f = $row['PTYPE'];
                $g = $row['NFISH'];
              }
              $id = $_GET['id'];
          ?>
                
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Fish Size<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>

                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Fish Type<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $e; ?><br>
                        </h5>
                      </div>
                    </div>


                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Pond Type<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $f; ?><br>
                        </h5>
                      </div>
                    </div>


                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Number of Fish<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $g; ?><br>
                        </h5>
                      </div>
                    </div>


                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Date<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $d; ?><br>
                        </h5>
                      </div>
                    </div>
                    
                    
                    
                    
          </div>
          </div>

<?php
include'../includes/footer.php';
?>