<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['FNAME'];
              $fbag = $_POST['FFIN'];
              $kg = $_POST['kg'];
              $rdate = date('Y-m-d');

              if ($kg == "") {
                
              }else{
                $filename = $fname.'_kg.txt';
                $filekg = fopen($filename, 'w');
                $freadkg = fwrite($filekg, $kg);
                $fclose = fclose($filekg);
              }

              $querys = "SELECT `ID`, `FNAME`, `FFIN`, `DATES` FROM `ffeeds` WHERE `FNAME` ='$fname'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              $exitName = isset($rows['FNAME']);

              $hello = 'hello';
                if ($hello != 'hello') {
                  echo "<script type='text/javascript'>
                  alert('This list exist already!!!');
                  window.location = 'attff.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO ffeeds
                              (FNAME, FFIN, DATES)
                              VALUES ('{$fname}', '{$fbag}', '{$rdate}')";
                    mysqli_query($db,$query) or die ('Error in updating a list in Database');



              $sqlz = "SELECT * FROM `feedlist` where `FNAME` = '$fname'";
              $queryz = mysqli_query($db, $sqlz);
              $rowz = mysqli_fetch_assoc($queryz);
              
              $pdqty = $rowz['FBAG'];
              $pdqtyv = $pdqty - $fbag;


              $sqly = "UPDATE `feedlist` SET `FBAG` = $pdqtyv WHERE `FNAME` = '$fname'";
              $queryy = mysqli_query($db, $sqly);

                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "attff.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>