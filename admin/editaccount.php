<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login']))
    {
        include_once('header.php');
        ?>
             <div class="row">
                    <h3 class="bg-success" style="padding: 1%; margin-right:57% ;">Edit Account</h3>
                    <?php
                        if(isset($_POST['submit']) && $_SESSION['admin_id'] == 1)
                        {
                            $username = noInjuction($_POST['username']);
                            $email= noInjuction($_POST['email']);

                            if($username == NULL || $email == NULL)
                            {
                                write('w', "Error!  Please fill all data");
                                back(2, "editaccount.php");
                            }
                            else
                            {
                                $sql = "UPDATE admin SET admin_username= '$username',admin_email= '$email' WHERE admin_id= $_SESSION[admin_id]";
                                $result = mysqli_query($connect, $sql);

                                if($result)
                                {
                                    write('s', "Account Updated");
                                    $_SESSION['admin_username'] = $username;
                                    $_SESSION['admin_email'] = $email;
                                    back(2, "index.php");
                                }
                                else
                                {
                                    write('d', "Error!  Please fill all data");
                                    back(2, "editaccount.php");
                                }
                            }
                        }
                        else
                        {
                            ?>
                                <div class="col-md-4">
                                    <form method="post" action="">
                                        <div class="form-group">
                                        <input value="<?php echo $_SESSION['admin_username']; ?>" name="username" type="username" class="form-control" id="exampleInputusername" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                        <input value="<?php echo $_SESSION['admin_email']; ?>" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>
                                
                                        
                                        <button name="submit" type="submit" class="btn btn-success">Edit</button>
                                    </form>
                                </div>
                            <?php
                        }
                    ?>
                </div>

        <?php
        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>