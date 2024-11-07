<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $fname = $_POST['FNAME'];
            $fbag = $_POST['FFIN'];
	        $rdate = $_POST['DATES'];

					$query = "UPDATE `ffeeds` SET `FNAME`='$fname', `FFIN` = '$fbag', `DATES`='$rdate' WHERE `ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("list added successfully.");
			window.location = "attff.php";
		</script>