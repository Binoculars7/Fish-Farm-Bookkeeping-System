<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

              $FTYPE = $_POST['FTYPE'];
              $FSIZE = $_POST['FSIZE'];
              $PTYPE = $_POST['PTYPE'];
              $NFISH = $_POST['NFISH'];
              //$DATE = $_POST['DATE'];

              $rdate = date('Y-m-d');

              $querys = "SELECT `ID`, `FSIZE`,  `FTYPE`, `PTYPE`, `NFISH`, `DATE` FROM `fishcat` WHERE `FTYPE` ='$FTYPE' AND `FSIZE` = '$FSIZE' AND `PTYPE` = '$PTYPE'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              
              $exitName1 = isset($rows['FTYPE']);
              $exitName2 = isset($rows['FSIZE']);
              $exitName3 = isset($rows['PTYPE']);

                if ($exitName1 == $FTYPE && $exitName2 == $FSIZE && $exitName3 == $PTYPE) {
                  echo "<script type='text/javascript'>
                  alert('This type exist already!!!');
                  window.location = 'attc.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO fishcat
                              (FTYPE, FSIZE, PTYPE, NFISH, DATE)
                              VALUES ('{$FTYPE}','{$FSIZE}','{$PTYPE}','{$NFISH}','{$rdate}')";
                    mysqli_query($db,$query) or die ('Error in updating a category in Database');
                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "attc.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>