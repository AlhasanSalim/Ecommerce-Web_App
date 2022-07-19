<?php
    include_once("header.php");

   if(isset($_GET['category_id']))
   {
       $cid = intval($_GET['category_id']);
       $sql = "SELECT * FROM product WHERE product_category_id = $cid";

   }
   else
   {
    $sql = "SELECT * FROM product";
   }

   $result = mysqli_query($connect, $sql);

   if($result)
   {
       if(mysqli_num_rows($result) > 0)
       {
           ?>
                <div class="row">
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                    <img src="imgs/<?php echo $row['product_image']; ?>" style="width: 60%; height: 250px;">
                                        <div class="caption">
                                            <h3><?php echo $row['product_name']; ?></h3>
                                            <p>
                                                <?php echo stripcslashes($row['product_description']); ?>
                                            </p>
                                            <p><a href="product_details.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary" role="button">Details</a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
           <?php

       }
   }

    include_once("footer.php");
?>