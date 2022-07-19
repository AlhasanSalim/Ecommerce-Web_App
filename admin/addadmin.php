<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login']) && $_SESSION['admin_id'] == 1)
    {
        include_once('header.php');
        ?>
            <div class="row">
                <h3 class="bg-success" style="padding: 1%; margin-right:57%;">Add Admin</h3>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $username = noInjuction($_POST['username']);
                        $password = noInjuction($_POST['password']);
                        $email = noInjuction($_POST['email']);

                        if($username == NULL || $password == NULL || $email == NULL)
                        {
                            write('d', "Error!  Please fill all data");
                            back(2, "addadmin.php");
                        }
                        else
                        {
                            $password = security($password);

                            $sql = "INSERT into admin VALUES(NULL, '$username', '$password', '$email')";
                            $result = mysqli_query($connect, $sql);

                            if($result)
                            {
                                write('s', "Admin added");
                                back(2, "viewadmin.php");
                            }
                            else
                            {
                                write('d', "Error!  Please fill all data");
                                back(2, "addadmin.php");
                            }
                        }
                    }
                    else
                    {
                        ?>
                            <div class="col-md-4">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <input name="username" type="username" class="form-control" id="exampleInputusername" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                    </div>

                                    <button name="submit" type="submit" class="btn btn-info">Add</button>
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