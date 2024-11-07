<?php    
 	include'../includes/connection.php';


        $me = ($_GET['q']);

        $sql = "SELECT * FROM `product` WHERE `NAME` = '".$me."'";

        $query = mysqli_query($db, $sql);

        while($rows = mysqli_fetch_assoc($query)){
        $pdname = $rows['ON_HAND'];
        echo $pdname;

         $openfile = fopen('price.txt','w');
         $write = fwrite($openfile, $pdname);
         $close = fclose($openfile);

        }
        ?>