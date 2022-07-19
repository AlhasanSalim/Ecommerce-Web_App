<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login']) && $_SESSION['admin_id'] == 1)
    {
        include_once('header.php');

        if(isset($_GET['admin_id']))
        {
            $id =  intval($_GET['admin_id']);

            $sql = "DELETE FROM admin WHERE admin_id=$id";
            $result = mysqli_query($connect, $sql);

            if($result)
            {
                write('s', "Delete of  id: " .$id);
                back(2, "viewadmin.php");
            }
            else
            {
                write('d', "SQL Syntax Error!");
                back(2, "viewadmin.php");
            }

        }
        else
        {
            write('d', "Unexpected Error!");
            back(2, "viewadmin.php");
            
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>