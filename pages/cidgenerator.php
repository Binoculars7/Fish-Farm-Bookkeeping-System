<?php 
include'../includes/connection.php';
include'../includes/sidebar.php';
session_start();

                 
               if ($_SERVER['REQUEST_METHOD'] == "POST") {

                  $rand_id = rand(100, 99999);
                  $rand_letter = chr(rand(65, 90));
                  $c_id = $rand_letter.$rand_id;

                  date_default_timezone_set("africa/lagos");
                  $datess = date("Y-m-d");
                
                  $query = "INSERT INTO cust_id
                              (CID, DATESS)
                              VALUES ('{$c_id}', '{$datess}')";
                  mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                  $_SESSION['local_cid'] = $c_id;
                  $_SESSION['local_cidd'] = $c_id;
                  echo $_SESSION['local_cidd'];
                  echo $_SESSION['local_cid'];
                  //echo "<script>window.alert('A new customer\'s ID has been generated')</script>";
                  
              }


?>

