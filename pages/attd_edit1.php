<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			

            $FTYPE = $_POST['FTYPE'];
            $FSIZE = $_POST['FSIZE'];
            $PTYPE = $_POST['PTYPE'];
            $NDEATH = $_POST['NDEATH'];
			$CDEATH = $_POST['CDEATH'];
            $DATE = $_POST['DATE'];

	        $rdate = $_POST['DATE'];

					$query = "UPDATE `death` SET `FTYPE`='$FTYPE', `FSIZE` = '$FSIZE', `PTYPE` = '$PTYPE', `NDEATH` = '$NDEATH', `CDEATH` = '$CDEATH', `DATE`='$rdate' WHERE `ID` ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("Category added successfully.");
			window.location = "attd.php";
		</script>