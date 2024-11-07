<?php
include'../includes/connection.php';

	if (isset($_GET['id'])) {
						
    	switch (isset($_GET['action'])) {
    		case 'delete':
    			$query = 'DELETE FROM pondtype WHERE ID = '. $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
                #echo "Hello World!";
            ?>
    			<script type="text/javascript">alert("Pond type successfully deleted.");window.location = "attp.php";</script>					
            <?php
    			//break;
            }
	}
?>