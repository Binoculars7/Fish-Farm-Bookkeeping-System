<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

        
              switch($_GET['action']){
                case 'phone':  
                    #$query = "";
                    #mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);

                #echo "<script>alert('Welcome User')</script>";


                $query = "SELECT `CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`, `EMAIL` FROM `customer`";
                $result = mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                echo "<textarea id='textarea' style='width:300px; height:300px;'>";
                while ($row = mysqli_fetch_assoc($result)) {
                      $phones = $row['PHONE_NUMBER'];
                      echo $phones."\n";
                }
                echo '</textarea>';
                break;
                case 'email':  
                    #$query = "";
                    #mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);

                $query = "SELECT `CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`, `EMAIL` FROM `customer`";
                $result = mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                echo "<textarea id='textarea' style='width:300px; height:300px;'>";
                while ($row = mysqli_fetch_assoc($result)) {
                      $emails = $row['EMAIL'];
                      echo $emails."\n";
                }
                echo '</textarea>';
                break;
              }
            ?>
             
          </div>

<button onclick="copy()">To Clipboard</button>

<script>
function copy(){
  let textarea = document.getElementById('textarea');
  textarea.select();
  document.execCommand('copy');
}

</script>