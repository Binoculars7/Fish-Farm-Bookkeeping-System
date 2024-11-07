<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $FTYPE = $_POST['FTYPE'];
            $FSIZE = $_POST['FSIZE'];
            $PTYPE = $_POST['PTYPE'];
            $NFISH = $_POST['NFISH'];
            $DATE = $_POST['DATE'];

	        $rdate = $_POST['DATE'];

					$query = "UPDATE `fishcat` SET `FTYPE`='$FTYPE', `FSIZE` = '$FSIZE', `PTYPE` = '$PTYPE', `NFISH` = '$NFISH', `DATE`='$rdate' WHERE `ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("Category added successfully.");
			window.location = "attc.php";
		</script>