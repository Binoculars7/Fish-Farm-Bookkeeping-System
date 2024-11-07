<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['FNAME'];
              $fdesc = 0;
              $fbag = $_POST['FBAG'];
              $rdate = date('Y-m-d');

              $querys = "SELECT `ID`, `FNAME`, `FBAG`, `DATES` FROM `pondbudget` WHERE `FNAME` ='$fname'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              $exitName = isset($rows['FNAME']);

                if ($exitName == $fname) {
                  echo "<script type='text/javascript'>
                  alert('This list exist already!!!');
                  window.location = 'attfb.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO pondbudget
                              (FNAME, FDESC, FBAG, DATES)
                              VALUES ('{$fname}', '{$fdesc}', '{$fbag}', '{$rdate}')";
                    mysqli_query($db,$query) or die ('Error in updating a list in Database');
                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "attfb.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>