<?php


    include_once('header.php');

    if(isset($_POST['submit']))
    {
        $search = noinjuction($_POST['search']);

        $sql = "SELECT * FROM product WHERE product_name like '%$search%' ";

        $result = mysqli_query($connect, $sql);

        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $num = mysqli_num_rows($result);
                write('s', "Found. $num. times ");
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
        else
        {
            write('d', "Found 0 times");
        }


    }
    else
    {
        write('d', "Unexpected Error!");

    }

    include_once('footer.php');
?>