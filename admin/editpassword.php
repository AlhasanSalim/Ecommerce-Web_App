<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login']))
    {
        include_once('header.php');

        ?>
            <div class="row">
                <h3 class="bg-success" style="padding: 1%; margin-right:57%;">Edit Password</h3>
                    <div class="col-md-4">
                    <?php
                        if(isset($_POST['submit']))
                        {
                            $password = noInjuction($_POST['password']);

                            if($password == NULL)
                            {
                                write('d', "Error!  Please fill all data");
                                back(2, "editpassword.php");
                            }

                            else
                            {
                                $password = security($password);

                                $sql = "UPDATE admin SET admin_password= '$password' WHERE admin_id= $_SESSION[admin_id]";
                                $result = mysqli_query($connect, $sql);

                                if($result)
                                {
                                    write('s', "Password Updated");
                                    back(2, "index.php");
                                }
                                else
                                {
                                    write('d', "Error!  SQL Syntax error");
                                }
                            }
                        }
                        else
                        {
                            ?>
                                <form method="post" action=""> 
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                                        <span  style="position: relative; margin-left: 335px; top:-25px; cursor:pointer" id="hide"   class="fa-solid fa-eye"  onclick="change()" ></span>
                                    </div>
    
                                    <button id="edit" name="submit" type="submit" class="btn btn-danger">Edit</button>
                                </form>
                   
                            <?php
                        }
                    ?>
                    </div>
                    
            </div>
        <?php

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>