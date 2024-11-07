<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $fname = $_POST['FNAME'];
            $fdesc = 0;
            $fbag = $_POST['FBAG'];
	        $rdate = $_POST['DATES'];

					$query = "UPDATE `pondbudget` SET `FNAME`='$fname', `FDESC` = '$fdesc', `FBAG` = '$fbag', `DATES`='$rdate' WHERE `ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("list added successfully.");
			window.location = "attfb.php";
		</script>