<?php
  require('session.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sunday Emmanuel Farms</title>
  <link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<script type="text/javascript" src="jquery.min.js"></script>
<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="margin-top: -2.1em">

      <!-- Sidebar - Brand --><br>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fish"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SE Farms</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tables
      </div>
      <!-- Tables Buttons -->




<script type="text/javascript">
  $('#people').hide();
  $('#basic').hide();
  $('#attendance').hide();
  $('#finance').hide();
  $('#sectionx').hide();
  $(document).ready(function(){
    // people
    $('#people').hide();
    $('#onpeople').click(function(){
      $('#people').toggle();
    });
    // attendance
    $('#attendance').hide();
    $('#onattendance').click(function(){
      $('#attendance').toggle();
    });
    // finance
    $('#finance').hide();
    $('#onfinance').click(function(){
      $('#finance').toggle();
    });
    // sectionx
    $('#sectionx').hide();
    $('#onsectionx').click(function(){
      $('#sectionx').toggle();
    });
    // basic
    $('#basic').hide();
    $('#onbasic').click(function(){
      $('#basic').toggle();
    });
    // analysis
    $('#analysis').hide();
    $('#onanalysis').click(function(){
      $('#analysis').toggle();
    });
  });
</script>



<?php  

      $customer = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="customer.php">
          <i class="fas fa-fw fa-user"></i>
          <span><small>Customer</small></span></a>
      </li>';
      $employee = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="employee.php">
          <i class="fas fa-fw fa-users"></i>
          <span><small>Employee</small></span></a>
      </li>';
      $attcat = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="att.php">
          <i class="fas fa-fw fa-fish"></i>
          <span><small>Fish Type</small></span></a>
      </li>';
      $fishcat = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="attc.php">
          <i class="fas fa-fw fa-fish" style="color: white;"></i>
          <span style="color: white;">BREED MANAGEMENT</span></a>
      </li>';
      $attsize = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="atts.php">
          <i class="fas fa-fw fa-fish"></i>
          <span><small>Fish Size</small></span></a>
      </li>';
      $attpond = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="attp.php">
          <i class="fas fa-fw fa-water"></i>
          <span><small>Pond Type</small></span></a>
      </li>';
      $attdeath = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="attd.php">
          <i class="fas fa-fw fa-medkit" style="color: white;"></i>
          <span style="color: white;">DEATH MANAGEMENT</span></a>
      </li>';
      $feedlist = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="attf.php">
          <i class="fas fa-fw fa-scroll"></i>
          <span><small>Feed List</small></span></a>
      </li>';
      $pondbudget = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="attfb.php">
          <i class="fas fa-fw fa-list"></i>
          <span><small>Pond Budget</small></span></a>
      </li>';
      $ffeeds = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="attff.php">
          <i class="fas fa-fw fa-shopping-basket"  style="color: white;"></i>
          <span style="color: white;">FINISHED FEED</span></a>
      </li>';
      $froutine = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="attr.php">
          <i class="fas fa-fw fa-industry" style="color: white;"></i>
          <span style="color: white;">FEEDING ROUTINE</span></a>
      </li>';
      $product_entry = '<li class="nav-item">
        <a class="nav-link" href="product.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Product Entry</span></a>
      </li>';
      $sale_entry = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="purchases.php">
          <i class="fas fa-fw fa-crown" style="color: white;"></i>
          <span style="color: white;">SALES ENTRY</span></a>
      </li>';
      $sales_checker = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="sales_checker.php">
          <i class="fas fa-fw fa-crown"></i>
          <span><small>Sales Analysis</small></span></a>
      </li>';
      $cashier = '<li class="nav-item">
        <a class="nav-link" href="cashier.php">
          <i class="fas fa-fw fa-tv"></i>
          <span>Cashier</span></a>
      </li>';
      $cashier_checker = '<li class="nav-item">
        <a class="nav-link" href="cashier_checker.php">
          <i class="fas fa-fw fa-tv"></i>
          <span>Cashier Checker</span></a>
      </li>';
      $expenses_checker = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="expenses_checker.php">
          <i class="fas fa-fw fa-tv"></i>
          <span><small>Expenses Analysis</small></span></a>
      </li>';
      $add_stock_quantity = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="addq.php">
          <i class="fas fa-fw fa-plus" style="color: white;"></i>
          <span style="color: white;">ADD STOCK (FEEDS) </span></a>
      </li>';
      $supplier = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="supplier.php">
          <i class="fas fa-fw fa-cogs" style="color: white;"></i>
          <span style="color: white;">SUPPLIER</span></a>
      </li>';
      $product_description = '<li class="nav-item">
        <a class="nav-link" href="productd.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Product Description</span></a>
      </li>';
      $cash_flow = '<li class="nav-item">
        <a class="nav-link" href="cashy.php">
          <i class="fas fa-fw fa-water"></i>
          <span>Cash Flow</span></a>
      </li>';
      $stock_flow = '<li class="nav-item">
        <a class="nav-link" href="stocky.php">
          <i class="fas fa-fw fa-ring"></i>
          <span>Stock Flow</span></a>
      </li>';
      $expenditure = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="expenses.php">
          <i class="fas fa-fw fa-fire" style="color: white;"></i>
          <span style="color: white;">EXPENDITURE</span></a>
      </li>';
      $net_profit = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="proloss.php">
          <i class="fas fa-fw fa-coins"></i>
          <span><small>Net Profit Analysis</small></span></a>
      </li>';
      $account = '<li class="nav-item" style="margin-bottom:-0.8em;">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-users" style="color: white;"></i>
          <span style="color: white;">ACCOUNTS</span></a>
      </li>';
      $ffeeds_checker = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="ffeeds_checker.php">
          <i class="fas fa-fw fa-users"></i>
          <span><small>Finished Feeds Analysis</small></span></a>
      </li>';
      $death_checker = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="death_checker.php">
          <i class="fas fa-fw fa-users"></i>
          <span><small>Death Analysis</small></span></a>
      </li>';
      $froutine_checker = '<li class="nav-item" style="margin-top:-1em; margin-left:1em;">
        <a class="nav-link" href="froutine_checker.php">
          <i class="fas fa-fw fa-users"></i>
          <span><small>Feeding Routine Analysis</small></span></a>
      </li>';
    

?>



<?php
include'connection.php';
  $query = 'SELECT ID,PRIVILEGE 
            FROM users WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['PRIVILEGE'];
                   
 if ($Aa=='all'){
              echo '<li class="nav-item" style="margin-bottom:-0.8em;" id="onpeople">
        <a class="nav-link" href="#a">
          <i class="fas fa-fw fa-user" style="color: white;"></i>
          <span style="color: white;">PEOPLE <i class="fas fa-fw fa-angle-down" style="color: white;"></i></span></a>
      </li>
<div id="people">';
              echo $customer;
              echo $employee;
echo '<hr class="sidebar-divider">
</div>';

echo '<li class="nav-item" style="margin-bottom:-0.8em;" id="onbasic">
        <a class="nav-link" href="#a">
          <i class="fas fa-fw fa-info-circle" style="color: white;"></i>
          <span style="color: white;">BASIC INFO <i class="fas fa-fw fa-angle-down" style="color: white;"></i></span></a>
      </li>
<div id="basic">';

              echo $attcat;
              echo $attsize;
              echo $attpond;
              echo $feedlist;
              echo $pondbudget;

echo '<hr class="sidebar-divider">
</div>';


echo '<li class="nav-item" style="margin-bottom:-0.8em;" id="onanalysis">
        <a class="nav-link" href="#a">
          <i class="fas fa-fw fa-chart-line" style="color: white;"></i>
          <span style="color: white;">ANALYSIS <i class="fas fa-fw fa-angle-down" style="color: white;"></i></span></a>
      </li>
<div id="analysis">';

              echo $ffeeds_checker;
              echo $death_checker;
              echo $froutine_checker;
              echo $sales_checker;
              echo $net_profit;
              echo $expenses_checker;

echo '<hr class="sidebar-divider">
</div>';


              echo $fishcat;
              echo $attdeath;
              
              echo $ffeeds;
              echo $add_stock_quantity;
              echo $froutine;
              //echo $product_entry;
              echo $sale_entry;
              //echo $cashier;
              //echo $cashier_checker;
              echo $supplier;
              //echo $product_description;
              //echo $cash_flow;
              //echo $stock_flow;
              echo $expenditure;
              //echo $net_profit;
              echo $account;


}elseif($Aa == 'sale'){
              echo $sale_entry;
              echo $sales_checker;
              echo $product_description;
}elseif($Aa == 'cashier'){
              echo $customer;
              echo $cashier;
              echo $cashier_checker;
}else{
}





}

?>






      <!--
      <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Inventory</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-fw fa-retweet"></i>
          <span>Transaction</span></a>
      </li>
      -->
     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
