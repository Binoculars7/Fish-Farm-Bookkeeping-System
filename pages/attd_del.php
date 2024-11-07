<?php
include'../includes/connection.php';

	if (isset($_GET['id'])) {
						
    	switch (isset($_GET['action'])) {
    		case 'delete':
    			$query = 'DELETE FROM death WHERE ID = '. $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
                #echo "Hello World!";
            ?>
    			<script type="text/javascript">alert("Category successfully deleted.");window.location = "attd.php";</script>					
            <?php
    			//break;
            }
	}
?>