<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $fname = $_POST['NAMES'];
	        $rdate = $_POST['DATES'];

					$query = "UPDATE `fishsize` SET `NAMES`='$fname', `DATES`='$rdate' WHERE `ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("Fish size added successfully.");
			window.location = "atts.php";
		</script>