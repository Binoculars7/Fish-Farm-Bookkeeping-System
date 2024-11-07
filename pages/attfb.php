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
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Pond Budget&nbsp;<a  href="#" data-toggle="modal" data-target="#supplierModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> <a  href="notify.php" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-bell"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                       <th>Pond Name</th>
                       <!--<th>Feed Description</th>-->
                       <th>Budget</th>
                       <th>Date Created</th>
                       <th>Option</th>
                   </tr>
               </thead>
          <tbody>
<?php



            $query = 'SELECT * FROM `pondbudget` ORDER BY `FNAME`';
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $filename = $row['FNAME'].'_kg.txt';

              if (file_exists($filename)) {
                $filekg = fopen($filename, 'r');
                $freadkg = fread($filekg, 1000);

                echo '<tr>';
                echo '<td>'. $row['FNAME'].'</td>';
                //echo '<td>'. $row['FDESC'].'</td>';
                echo '<td>'. $row['FBAG'].'</td>';
                echo '<td>'. $row['DATES'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                            <li>
                                  <a type="button" class="btn btn-primary bg-gradient-primary btn-block" style="border-radius: 0px;"  href="attfb_searchfrm.php?action=edit & id='.$row['ID'] . '">
                                    <i class="fas fa-fw fa-list-alt"></i> Details
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="attfb_edit.php?action=edit & id='.$row['ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px; background:grey; border:1px solid;" href="attfb_del.php?action=delete & id='.$row['ID']. '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li> 
                            </ul>
                            </div>
                          </div> </td>';
                      echo '</tr> ';
              

              }else{
                echo '<tr>';
                echo '<td>'. $row['FNAME'].'</td>';
                //echo '<td>'. $row['FDESC'].'</td>';
                echo '<td>'. $row['FBAG'].'</td>';
                echo '<td>'. $row['DATES'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                            <li>
                                  <a type="button" class="btn btn-primary bg-gradient-primary btn-block" style="border-radius: 0px;"  href="attfb_searchfrm.php?action=edit & id='.$row['ID'] . '">
                                    <i class="fas fa-fw fa-list-alt"></i> Details
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="attfb_edit.php?action=edit & id='.$row['ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px; background:grey; border:1px solid;" href="attfb_del.php?action=delete & id='.$row['ID']. '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li> 
                            </ul>
                            </div>
                          </div> </td>';
                      echo '</tr> ';
              }
              





               
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

             

  <!-- Customer Modal-->
  <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Budget List</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="attfb_transac.php?action=add">
              <div class="form-group">
                <select name="FNAME" class="form-control" style="margin-bottom: 0.5em;" required>
                  <option value="">SELECT POND</option>
                  <?php  

                  $sqlme = "SELECT * FROM `pondtype`";
                  $queryme = mysqli_query($db, $sqlme);

                  while ($rowme = mysqli_fetch_assoc($queryme)) {
                    $feedname = $rowme['NAMES'];
                    echo "<option value='".$feedname."'>".$feedname."</option>";
                  }



                  ?>
                  <option value="Others">Other Areas</option>
                </select>

              </div>
              
              <div class="form-group">
                <input class="form-control" type="number" placeholder="Enter Budget (Price)" name="FBAG" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" disabled value="<?php echo date('Y-m-d'); ?>" name="DATES" required>
              </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
<?php
include'../includes/footer.php';
?>