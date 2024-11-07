<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $fname = $_POST['FNAME'];
            $fbag = $_POST['FPERIOD'];
	        $rdate = $_POST['DATES'];

					$query = "UPDATE `froutine` SET `FNAME`='$fname', `FPERIOD` = '$fbag', `DATES`='$rdate' WHERE `ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("list added successfully.");
			window.location = "attr.php";
		</script>