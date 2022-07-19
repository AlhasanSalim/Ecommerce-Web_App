<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login']))
    {
        include_once('header.php');

        write('i', "Logged out Successfully, $_SESSION[admin_username]");

        session_destroy();
        back(2, "index.php");

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>