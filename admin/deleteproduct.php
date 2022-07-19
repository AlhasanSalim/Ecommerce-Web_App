<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        if(isset($_GET['product_id']))
        {
            $product_id = intval($_GET['product_id']);

            $sql = "DELETE FROM product WHERE product_id=$product_id ";

            $result = mysqli_query($connect, $sql);

            if($result)
            {
                write('s', "Product Deleted");
                back(2, "viewproduct.php");
            }
            else
            {
                write('d' , "SQL Syntax Error!");
                back(2, "viewproduct.php");
            }
        }
        else
        {
            write('d', "Unexpected Error!");
            back(2,"viewproduct.php");
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>