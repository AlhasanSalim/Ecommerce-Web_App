<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        $sql = "SELECT * FROM product";
        $result = mysqli_query( $connect, $sql);

        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                ?>
                  <h3 class="bg-success" style="padding: 1%; margin-right:57%;">View Product</h3>  
                    <div class="panel panel-primary" style="margin-top: 50px;">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th>Product id</th>
                                    <th>Product Name</th>
                                    <th>Product Category id</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $index = 1;
                                    while($row = mysqli_fetch_array($result))  # function mysqli_fetch_array() for return data from database as ArrayList
                                    {
                                        $sql_category = "SELECT category_name FROM category WHERE category_id=$row[product_category_id]";
                                        $result_category = mysqli_query($connect, $sql_category);

                                        if($result_category)
                                        {
                                            if(mysqli_num_rows($result_category) > 0)
                                            {
                                                $row_category = mysqli_fetch_array($result_category);
                                            }
                                           
                                        }

                                       ?>
                                            <tr>
                                                <td><?php echo $row['product_id']; ?></td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td><?php echo $row_category['category_name']; ?></td>
                                                <td><?php echo $row['product_price']; ?></td>
                                                <td><?php echo stripcslashes($row['product_description']); ?></td>  <!-- function stripcslachers() for remove slaches --->
                                                <td><img style="width:150px;" src="../imgs/<?php echo $row['product_image']; ?>"></td>
                                                <td>
                                                    <a href="editproduct.php?product_id=<?php echo $row['product_id'];?>">
                                                      <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <!--<a href="deleteproduct.php?product_id=<?php //echo $row['product_id'];?>"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a>-->

                                                    <!-- Button trigger modal -->                         <!-- (rel) it main relashion attribute in HTML5 used for send data from PHP to Javascript -->
                                                    <button type="button" class="btn btn-link btn_delete" rel="<?php echo $row['product_id']; ?>" data-toggle="modal" data-target="#myModal<?php echo $index; ?>">
                                                        <span class="glyphicon glyphicon-trash" style="color: red;"></span>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this product ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                                    <button type="button" class="btn btn-danger deleted_yes" data-dismiss="modal">Yes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                       <?php
                                    $index++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div> 
                <?php
            }
            else
            {
                write('w', "There is No Data For View");
                back(2, "addproduct.php");
            }
        }
        else
        {
            write('d', "SQL Syntax Error!");
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>