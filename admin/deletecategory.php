<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        if(isset($_GET['category_id']))
        {
            $id = intval($_GET['category_id']);

            $sql = "DELETE FROM category WHERE category_id=$id";

            $result = mysqli_query($connect, $sql);

            $sql_product = "DELETE FROM product WHERE product_category_id = $id";

            $result_product = mysqli_query($connect, $sql_product);

            if($result && $result_product)
            {
                write('s', "Category Deleted");
                back(2, "viewcategory.php");
            }
            else
            {
                write('d', "SQL Syntax Error!");
                back(2, "viewcategory.php");
            }
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>