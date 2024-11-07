<?php
include'../includes/connection.php';

#|| $_GET['do'] != 1
	if (isset($_GET['id'])) {

        $do = $_GET['action'];  

						
    	if (isset($_GET['action']) == 'delete') {


            $query = "DELETE FROM product WHERE PRODUCT_ID = ". $_GET['id'];
                
            $result = mysqli_query($db, $query) or die(mysqli_error($db));

    		#case 'delete':

    		#echo "hello world";				

            ?>
    			<script type="text/javascript">alert("Product Successfully Deleted.");window.location = "product.php";</script>					
            <?php
    			//break;
            }
	}
?>

                            <script type="text/javascript">
                                    

                                    $(document).ready(function(){
                                        $('#hole').onkey();
                                    });


                            </script>