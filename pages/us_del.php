<?php
include'../includes/connection.php';

	if (isset($_GET['id']) && $_GET['id'] != 1) {
						
    	switch (isset($_GET['action'])) {
    		case 'del':
    			$query = 'DELETE FROM users WHERE ID = '. $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("User Successfully Deleted.");
    			window.location = "user.php";</script>					
            <?php
    			//break;
            }
	}
?>