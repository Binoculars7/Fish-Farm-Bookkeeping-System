<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $fname = $_POST['NAMES'];

					$query = "UPDATE `job` SET `JOB_TITLE`='$fname' WHERE `JOB_ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Update Sub Church Successfully.");
			window.location = "sub.php";
		</script>