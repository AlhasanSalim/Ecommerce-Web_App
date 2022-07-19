<?php
session_start();
   include_once('webSiteSettings/site_methods.php');
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>E-commerce</title>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/site.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="fonts/icon-font.min.css">
   </head>
   <body>
      <nav class="navbar navbar-default navbar-inverse" style="border-radius: 0px;">
         <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <?php
                  if (isset($_SESSION['admin_login'])){
                     ?>
                        <a class="navbar-brand" target="_blank" href="admin/index.php" style="font-family: cursive;">DashBoard</a>
                     <?php
                  }
                  else{
                     ?>
                        <a class="navbar-brand" target="_blank" href="index.php" style="font-family: cursive;">Welcome</a>
                     <?php
                  } 
               ?>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li class="<?php if(get_page_name() == "index.php"){echo "active";} ?>"><a href="index.php">Home</a></li>
                  <li class="<?php if(get_page_name() == "about.php"){echo "active";} ?>"><a href="about.php">About</a></li>
                  <li class="<?php if(get_page_name() == "contact.php"){echo "active";} ?>"><a href="contact.php">Contact us</a></li>
                  
                  <li class="dropdown" class="<?php if(get_page_name() == "products.php"){echo "active";} ?>">
                     <a href="products.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Category
                        <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="products.php">All</a></li>
                        <?php

                              $sql = "SELECT * FROM category"; 

                              $result = mysqli_query($connect, $sql);

                              if($result)
                              {
                                 if(mysqli_num_rows($result) > 0)
                                 {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                       ?>
                                          <li><a href="products.php?category_id=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
                                       <?php
                                    }
                                 }
                              }
                        ?>
                     </ul>
                  </li>
               </ul>
               <form class="navbar-form navbar-right" role="search" method="post" action="search.php">
                  <div class="form-group">
                    <input name="search" type="text" class="form-control" placeholder="Search">
                  </div>
                  <button name="submit" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
               </form>
            </div>
         </div>
      </nav>
      
      
      
      
      
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-10 col-md-offset-1">