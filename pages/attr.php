<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));

  $rowme = mysqli_fetch_assoc($result);
  $meyou = $rowme['TYPE'];
  
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
              <h4 class="m-2 font-weight-bold text-primary">Feeding Routines&nbsp;<a  href="#" data-toggle="modal" data-target="#supplierModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                       <th>Who Fed?</th>
                       <th>Feeding Period</th>
                       <th>Date Created</th>
                       <th>Option</th>
                   </tr>
               </thead>
          <tbody>
<?php                  
            $query = 'SELECT * FROM `froutine` ORDER BY `FNAME`';
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
           
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'. $row['FNAME'].'</td>';
                echo '<td>'. $row['FPERIOD'].'</td>';
                echo '<td>'. $row['DATES'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                            <li>
                                  <a type="button" class="btn btn-primary bg-gradient-primary btn-block" style="border-radius: 0px;"  href="attr_searchfrm.php?action=edit & id='.$row['ID'] . '">
                                    <i class="fas fa-fw fa-list-alt"></i> Details
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="attr_edit.php?action=edit & id='.$row['ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px; background:grey; border:1px solid;" href="attr_del.php?action=delete & id='.$row['ID']. '">
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
          <h5 class="modal-title" id="exampleModalLabel">Add to List</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="attr_transac.php?action=add">
              

              <div class="form-group">
              

            <select id="hy" class="form-control" name="FNAME">
              <?php 
              if ($meyou == 'Admin') {
                $sql = "SELECT * FROM `employee` ORDER BY `EMPLOYEE_ID` ASC";

                $query = mysqli_query($db, $sql);
                echo "<option id='hy' value=''>Who Fed?</option>";
                while($rows = mysqli_fetch_assoc($query)){

                $dome = $rows['FIRST_NAME']. ' '.$rows['LAST_NAME'];
                echo "<option value='".$dome."'>".$dome."</option>";
              }
              }else{
                  $dome = $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME'];
                  echo "<option value='".$dome."'>".$dome."</option>";
              }
              
              
              ?>
            </select>
        
              </div>


              <div class="form-group">
                <select id="hy" class="form-control" name="FPERIOD">
              <option id="hy" value="">Select Period</option>
              <option id="hy" value="Morning">Morning</option>
              <option id="hy" value="Afternoon">Afternoon</option>
              <option id="hy" value="Evening">Evening</option>
              <option id="hy" value="Night">Night</option>
            </select>
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