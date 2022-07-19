<?php

    include_once('configurations.php');

    function noInjuction($data)
    {
        global $connect;   // variable at configurations.php
        $data = trim($data);  // function trim()  for canncel spaces
        $data = htmlspecialchars($data);   //  function htmlspecialchars() for check of feilds html from any attack 
        $data = mysqli_real_escape_string($connect, $data);  // function mysqli_real_escape_string()  from canncel of single 
        
        return $data;
    }
    /////////////////////////////////////////////////////////////////////////

    function write($char, $syntax = "")
    {
        ?>
            <div class="alert <?php if($char == 'i'){echo "alert-info";}  elseif($char == 's') {echo "alert-success";} elseif($char == 'd') {echo "alert-danger";} elseif($char == 'w') {echo "alert-warning";} ?>">
                <?php echo $syntax; ?>
            </div>  
        <?php
    }
    /////////////////////////////////////////////////////////////////////////


    function back($sec, $url)
    {
        header("refresh:$sec;url=$url");
    }
    /////////////////////////////////////////////////////////////////////////

    function security($password)
    {
        $password = md5($password);
        $password = substr($password, 3, 5);
        $password = sha1($password);
        $password = substr($password, 2, 3);

        return $password;
    }

    /////////////////////////////////////////////////////////////////////////

    function get_page_name()
    {
        $path = $_SERVER['PHP_SELF'];
        $last_slash_pos = strrpos($path, '/');
        $page_name = substr($path, $last_slash_pos+1);

        return $page_name;


    }

?>