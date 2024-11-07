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
              <h4 class="m-2 font-weight-bold text-primary">Breed Management&nbsp;<a  href="#" data-toggle="modal" data-target="#supplierModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                       <th>Fish Type</th>
                       <th>Fish Size</th>
                       <th>Pond Type</th>
                       <th>No of Fish</th>
                       <th>Date Created</th>
                       <th>Option</th>
                   </tr>
               </thead>
          <tbody>
<?php                  
            $query = 'SELECT * FROM `fishcat` ORDER BY `FTYPE`';
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
           
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'. $row['FTYPE'].'</td>';
                echo '<td>'. $row['FSIZE'].'</td>';
                echo '<td>'. $row['PTYPE'].'</td>';
                echo '<td>'. $row['NFISH'].'</td>';
                echo '<td>'. $row['DATE'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                            <li>
                                  <a type="button" class="btn btn-primary bg-gradient-primary btn-block" style="border-radius: 0px;"  href="attc_searchfrm.php?action=edit & id='.$row['ID'] . '">
                                    <i class="fas fa-fw fa-list-alt"></i> Details
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="attc_edit.php?action=edit & id='.$row['ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px; background:grey; border:1px solid;" href="attc_del.php?action=delete & id='.$row['ID']. '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li> 
                            </ul>
                            </div>
                          </div> </td>';
                      echo '</tr> ';
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
          <h5 class="modal-title" id="exampleModalLabel">Add Fish Category</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="attc_transac.php?action=add">

              <div class="form-group">
                <td>

            <select id="hy" class="form-control" name="FTYPE">
              <option id="hy" value="">Select Fish Type</option>
              <?php 

              $sql = "SELECT * FROM `groups` ORDER BY `NAMES` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAMES'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
              </div>


              <div class="form-group">
                <td>

            <select id="hy" class="form-control" name="FSIZE">
              <option id="hy" value="">Select Fish Size</option>
              <?php 

              $sql = "SELECT * FROM `fishsize` ORDER BY `NAMES` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAMES'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
              </div>


              <div class="form-group">
                <td>

            <select id="hy" class="form-control" name="PTYPE">
              <option id="hy" value="">Select Pond Type</option>
              <?php 

              $sql = "SELECT * FROM `pondtype` ORDER BY `NAMES` ASC";

              $query = mysqli_query($db, $sql);

              while($rows = mysqli_fetch_assoc($query)){

              $pdname = $rows['NAMES'];

              echo "<option value='".$pdname."'>".$pdname."</option>";
            }
              ?>
            </select>
                </td>
              </div>

              <div class="form-group">
                <input class="form-control" type="number" placeholder="Number of Fish e.g 20" name="NFISH" required>
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