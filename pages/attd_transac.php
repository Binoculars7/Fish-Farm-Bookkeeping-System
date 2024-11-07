<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

              $FTYPE = $_POST['FTYPE'];
              $FSIZE = $_POST['FSIZE'];
              $PTYPE = $_POST['PTYPE'];
              $NDEATH = $_POST['NDEATH'];
              $CDEATH = $_POST['CDEATH'];
              //$DATE = $_POST['DATE'];

              $rdate = date('Y-m-d');

              $querys = "SELECT `ID`, `FSIZE`,  `FTYPE`, `PTYPE`, `NDEATH`, `CDEATH`, `DATE` FROM `death` WHERE `FTYPE` ='$FTYPE' AND `FSIZE` = '$FSIZE' AND `PTYPE` = '$PTYPE'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              
              $exitName1 = isset($rows['FTYPE']);
              $exitName2 = isset($rows['FSIZE']);
              $exitName3 = isset($rows['PTYPE']);

              $house = "hello";

                if ($house != 'hello') {
                  echo "<script type='text/javascript'>
                  alert('Try again later!!!');
                  window.location = 'attd.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO death
                              (FTYPE, FSIZE, PTYPE, NDEATH, CDEATH, DATE)
                              VALUES ('{$FTYPE}','{$FSIZE}','{$PTYPE}','{$NDEATH}','{$CDEATH}','{$rdate}')";
                    mysqli_query($db,$query) or die ('Error in updating a category in Database');
                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "attd.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>