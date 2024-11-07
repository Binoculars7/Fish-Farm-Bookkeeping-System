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
  $query = 'SELECT `ID`, `FNAME`, `FPERIOD`, `DATES` FROM `froutine` WHERE `ID` ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz = $row['ID'];
      $a = $row['FNAME'];
      $c = $row['FPERIOD'];
      $d = $row['DATES'];
    }
      $id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit List</h4>
            </div>
            <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="attr.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      
            <form role="form" method="post" action="attr_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Who Fed?:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Who Fed?" name="FNAME" value="<?php echo $a; ?>" required>
                </div>
              </div>


              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Feeding Period:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" type="text" placeholder="Feeding Period e.g. morning" name="FPERIOD" value="<?php echo $c; ?>" required>
                </div>
              </div>
              
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Date Registered:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Date Created" name="DATES" value="<?php echo $d; ?>" required>
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