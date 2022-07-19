<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        if(isset($_GET['product_id']))
        {
            $product_id = intval($_GET['product_id']);

            $sql = "SELECT * FROM product WHERE product_id= $product_id";

            $result = mysqli_query($connect, $sql);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    $row_old = mysqli_fetch_array($result);

                    if(isset($_POST['submit']))
                    {
                        $product_name = noInjuction($_POST['product_name']);
                        $product_category_id = intval($_POST['product_category_id']);
                        $product_price = intval($_POST['product_price']);
                        $product_description = noInjuction($_POST['product_description']);
            
                        $product_image = time().$_FILES['product_image']['name'];
                        $product_image_path = $_FILES['product_image']['tmp_name'];
            
                        if($product_name != NULL && $product_category_id != NULL &&  $product_price != NULL && $product_description != NULL && $product_image_path != NULL )
                        {
                            $sql = "UPDATE product SET product_name='$product_name' ,  product_category_id= $product_category_id , 
                                                                    product_price= $product_price, product_description= '$product_description',
                                                                    product_image= '$product_image'
                                                                    WHERE product_id=$product_id";
                            $new_result = mysqli_query($connect, $sql);

                            if($new_result)
                            {
                                if(move_uploaded_file($product_image_path, "../imgs/$product_image"))
                                {
                                    write('s', "Product Updated");

                                    // function unlink()  for delete path of file
                                    unlink("../imgs/$row_old[product_image]");
                                    back(2, "viewproduct.php");
                                }
                                else
                                {
                                    write('d', "Upload Filed");
                                }
                            }
                            else
                            {
                                write('d', "SQL Syntax Error!");;
                            }

                        }
                        elseif($product_name != NULL && $product_category_id != NULL &&  $product_price != NULL && $product_description != NULL)
                        {   
                            $sql = "UPDATE product SET product_name='$product_name' ,  product_category_id= $product_category_id , 
                                                                    product_price= $product_price, product_description= '$product_description'
                                                                    WHERE product_id=$product_id";
                            $new_result = mysqli_query($connect, $sql);

                            if($new_result)
                            {
                                write('s', "Product Updated");
                                back(2, "viewproduct.php");
                            }
                            else
                            {
                                write('d', "SQL Syntax Error!");
                            }

                        }
                        else
                        {
                            write('w', "Please Fill all Data!");
                            back(2, "addproduct.php");
                        }
                        
                    }
                    else
                    {
                        ?>
                            <div class="row">
                             <h3 class="bg-success" style="padding: 1%;margin-right:57% ;">Edit Product</h3>
                                <div class="col-md-4">
                                    
                                    <form method="post"  action=""  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <form method="post"  action=""  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input value="<?php echo $row_old['product_name']; ?>" name="product_name" type="text" class="form-control" id="product_name" placeholder="Product Name">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputFile">Category</label>
                                                    <select class="form-control" name="product_category_id">
                                                        <?php

                                                            $sql = "SELECT * FROM category";

                                                            $result = mysqli_query($connect, $sql);

                                                            if($result)
                                                            {
                                                                if(mysqli_num_rows($result) > 0)
                                                                {
                                                                    while($row = mysqli_fetch_array($result))
                                                                    {
                                                                        ?>
                                                                            <option <?php if($row_old['product_category_id'] == $row['category_id']) {echo "selected";} ?>  value="<?php echo $row['category_id']; ?>">
                                                                                <?php echo $row['category_name']; ?>
                                                                            </option>
                                                                        <?php
                                                                    }
                                                                }

                                                                else
                                                                {
                                                                    write('d', "Unexpected Error!");
                                                                }
                                                            }
                                                            else
                                                            {
                                                                write('d', "SQL Syntax Error!");
                                                                back(2, "addproduct.php");
                                                            }

                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <input value="<?php echo $row_old['product_price']; ?>" name="product_price" type="number" class="form-control" id="product_price" placeholder="Product Price">
                                                </div>


                                                <div class="form-group">
                                                    <textarea  name="product_description" class="form-control" rows="2" placeholder="Description"> <?php echo $row_old['product_description']; ?></textarea>
                                                </div>



                                                <div class="form-group">
                                                    <label for="exampleInputFile">Proudct Image</label>
                                                    <input name="product_image" type="file" id="exampleInputFile" placeholder="Proudct Image">
                                                    <br>
                                                    <img src="../imgs/<?php echo $row_old['product_image'];?>">
                                                </div>
                                        
                                        

                                        
                                                <button name="submit" type="submit" class="btn btn-success">Edit</button>
                                            </form>
                                        </div>    
                                    </div>        
                                </div>            
                            </div>                
                        <?php                    
                    }
                }
                else
                {
                    write('d', "Unexpected Error!");
                }
            }

            else
            {
                write('w', "There is No Data!");
                back(2, "editproduct.php");
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