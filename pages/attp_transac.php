<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['NAMES'];
              $rdate = date('Y-m-d');

              $querys = "SELECT `ID`, `NAMES`, `DATES` FROM `pondtype` WHERE `NAMES` ='$fname'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              $exitName = isset($rows['NAMES']);

                if ($exitName == $fname) {
                  echo "<script type='text/javascript'>
                  alert('This type exist already!!!');
                  window.location = 'attp.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO pondtype
                              (NAMES, DATES)
                              VALUES ('{$fname}', '{$rdate}')";
                    mysqli_query($db,$query) or die ('Error in updating a type in Database');
                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "attp.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>