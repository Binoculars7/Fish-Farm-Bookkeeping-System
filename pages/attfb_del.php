<?php
include'../includes/connection.php';

	if (isset($_GET['id'])) {
						
    	switch (isset($_GET['action'])) {
    		case 'delete':
    			$query = 'DELETE FROM pondbudget WHERE ID = '. $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
                #echo "Hello World!";
            ?>
    			<script type="text/javascript">alert("List successfully deleted.");window.location = "attfb.php";</script>					
            <?php
    			//break;
            }
	}
?>