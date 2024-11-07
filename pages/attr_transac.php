<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['FNAME'];
              $fbag = $_POST['FPERIOD'];
              $rdate = date('Y-m-d');

              $querys = "SELECT `ID`, `FNAME`, `FPERIOD`, `DATES` FROM `froutine` WHERE `FNAME` ='$fname' AND `FPERIOD` = '$fbag' AND `DATES` = '$rdate'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              $exitName1 = isset($rows['FNAME']);
              $exitName2 = isset($rows['FPERIOD']);
              $exitName3 = isset($rows['DATES']);

              $hello = 'hello';
                if ($exitName1 == $fname && $exitName2 == $fbag && $exitName3 == $rdate) {
                  echo "<script type='text/javascript'>
                  alert('This routine exist already!!!');
                  window.location = 'attr.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO froutine
                              (FNAME, FPERIOD, DATES)
                              VALUES ('{$fname}', '{$fbag}', '{$rdate}')";
                    mysqli_query($db,$query) or die ('Error in updating a list in Database');
                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "attr.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>