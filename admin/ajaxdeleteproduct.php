<?php
    include_once('../webSiteSettings/configurations.php');

    $product_id = $_POST['product_id'];

    $sql = "DELETE FROM product WHERE product_id =$product_id";

    $result = mysqli_query($connect, $sql);

    if($result)
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }


?>