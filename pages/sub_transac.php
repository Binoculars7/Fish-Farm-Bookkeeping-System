<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $fname = $_POST['NAMES'];
              $rdate = date('Y-m-d');

              $querys = "SELECT `JOB_ID`, `JOB_TITLE` FROM `job` WHERE `JOB_TITLE` ='$fname'";
              $results = mysqli_query($db, $querys);
              $rows = mysqli_fetch_assoc($results);
              $exitName = isset($rows['JOB_TITLE']);

                if ($exitName == $fname) {
                  echo "<script type='text/javascript'>
                  alert('This sub church exist already!!!');
                  window.location = 'sub.php';
                  </script>";
                }else{
                  switch($_GET['action']){
                    case 'add':
                    $query = "INSERT INTO job
                              (JOB_TITLE)
                              VALUES ('{$fname}')";
                    mysqli_query($db,$query) or die ('Error in updating a sub church in Database');
                break;
              }
                }
              
            ?>
              <script type="text/javascript">window.location = "sub.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>