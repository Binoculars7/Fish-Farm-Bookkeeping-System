<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $fname = $_POST['FNAME'];
            $fdesc = $_POST['FDESC'];
            $fbag = $_POST['FBAG'];
	        $rdate = $_POST['DATES'];

					$query = "UPDATE `feedlist` SET `FNAME`='$fname', `FDESC` = '$fdesc', `FBAG` = '$fbag', `DATES`='$rdate' WHERE `ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("list added successfully.");
			window.location = "attf.php";
		</script>