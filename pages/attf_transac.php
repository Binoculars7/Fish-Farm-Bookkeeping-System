<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['FNAME'];
              $fdesc = $_POST['FDESC'];
              $fbag = $_POST['FBAG'];
              $rdate = date('Y-m-d');

              $querys = "SELECT `ID`, `FNAME`, `FDESC`, `FBAG`, `DATES` FROM `feedlist` WHERE `FNAME` ='$fname'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              $exitName = isset($rows['FNAME']);

                if ($exitName == $fname) {
                  echo "<script type='text/javascript'>
                  alert('This list exist already!!!');
                  window.location = 'attf.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO feedlist
                              (FNAME, FDESC, FBAG, DATES)
                              VALUES ('{$fname}', '{$fdesc}', '{$fbag}', '{$rdate}')";
                    mysqli_query($db,$query) or die ('Error in updating a list in Database');
                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "attf.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>