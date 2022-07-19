<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>