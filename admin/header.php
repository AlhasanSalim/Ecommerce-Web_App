<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/all.main.css">
    <link rel="stylesheet" type="text/css" href="../fonts/icon-font.min.css">
  </head>
  <body>
    
    <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Dashboard</a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li <?php if(get_page_name() == "index.php") {echo "class='active'";} ?>><a href="index.php">Home</a></li>
              <li <?php if(get_page_name() == "editpassword.php") {echo "class='active'";} ?>><a href="editpassword.php">Edit Password</a></li>
              <li <?php if(get_page_name() == "editaccount.php") {echo "class='active'";} ?>><a href="editaccount.php">Edit Account</a></li>
              <li <?php if(get_page_name() == "logout.php") {echo "class='active'";} ?>><a href="logout.php">Logout</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a style="font-size: 20px; font-weight:bold" href="#"><?php echo ucfirst($_SESSION['admin_username']); ?></a></li>
              <li><a class="nav-link" href="../index.php" target="_blank">View Web Site <span class="sr-only">(current)</span></a></li>
            </ul>  
          </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <ul class="nav nav-pills nav-stacked">


                  <?php
                    if($_SESSION['admin_id'] == 1)
                    {
                      ?>
                        <li class="active"><a href="#">Admin</a></li>
                        <li><a href="addadmin.php">Add</a></li>
                        <li><a href="viewadmin.php">View</a></li>
                      <?php
                    }
                  ?>

                    <li class="active"><a href="#">Category</a></li>
                    <li><a href="addcategory.php">Add</a></li>
                    <li><a href="viewcategory.php">View</a></li>
                    
                    <li class="active"><a href="#">Product</a></li>
                    <li><a href="addproduct.php">Add</a></li>
                    <li><a href="viewproduct.php">View</a></li>
                  </ul>
            </div>
            
            
            <div class="col-md-11">