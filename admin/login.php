<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Template for Bootstrap</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/site.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/all.main.css">
    <link rel="stylesheet" type="text/css" href="../fonts/icon-font.min.css">
  </head>

  <body>

    <div class="container">
      <?php
        if(isset($_POST['submit']))
        {
          $username = noInjuction($_POST['username']);
          $password = noInjuction($_POST['password']);

          if($username == NULL || $password == NULL)
          {
            write('d', "Error!  Please fill all data");
            back(2, "index.php");
          }

            else
            {
              $password = security($password);
              $sql = "SELECT * FROM admin WHERE admin_username='$username' and admin_password='$password'";
              $result = mysqli_query($connect, $sql);

              if($result)
              {
                if(mysqli_num_rows($result) > 0)
                {
                  $row = mysqli_fetch_array($result);

                  $_SESSION['admin_login'] = "yes";
                  $_SESSION['admin_username'] = $row['admin_username'];
                  $_SESSION['admin_id'] = $row['admin_id'];
                  $_SESSION['admin_email'] = $row['admin_email'];

                  
                  write('s', "Welcome, $username");
                  back(2, "index.php");

                }
                else
                {
                  write('d', "Error!  Wrong Username or Password");
                  back(2, "index.php");
                }
              }
              else
              {
                write('d', "Error!  SQl Syntax error");
                back(2, "index.php");
              }
            }

        }
        else
          {
            ?>
                <form class="form-signin" method="post" action="">
                  <h2 class="form-signin-heading">Please sign in</h2>

                  <div class="form-group">
                    <input  name="username" type="Username" id="inputusername" class="form-control" placeholder="Username">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                    <span id="eye" aria-hidden="true" style="position: relative; margin-left:271px; top:-42px; font-size: 20px; cursor:pointer; " class="fa-solid fa-eye" onclick="toggle()"></span>
                  </div>
                
                  <button id="ok" name="submit" class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
                </form>
            <?php
          }
      ?>
    </div>
    <script src="../js/eye.js"></script>
   </body>
</html>
