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

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Category</h4>
            </div>
            <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="attc.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      
            <form role="form" method="post" action="attc_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Fish Type:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Full Name" name="FTYPE" value="<?php echo $e; ?>" required>
                </div>
              </div>
              
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Fish Size:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Full Name" name="FSIZE" value="<?php echo $a; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Pond Type:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Full Name" name="PTYPE" value="<?php echo $f; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 No of Fish:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Full Name" name="NFISH" value="<?php echo $g; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Date Registered:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Date Created" name="DATE" value="<?php echo $d; ?>" required>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>