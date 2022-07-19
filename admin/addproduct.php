<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        if(isset($_POST['submit']))
        {
            $product_name = noInjuction($_POST['product_name']);
            $product_category_id = intval($_POST['product_category_id']);
            $product_price = intval($_POST['product_price']);
            $product_description = noInjuction($_POST['product_description']);

            $product_image = time().$_FILES['product_image']['name'];
            $product_image_path = $_FILES['product_image']['tmp_name'];

            if($product_name != NULL && $product_category_id != NULL &&  $product_price != NULL && $product_price > 0 && $product_description != NULL && $product_image_path != NULL )
            {
                $sql = "INSERT INTO product VALUES (NULL, '$product_name', $product_category_id, $product_price, '$product_description','$product_image')";
                $result = mysqli_query($connect, $sql);

                if($result)
                {
                    if(move_uploaded_file($product_image_path, "../imgs/$product_image"))
                    {
                        write('s', "Product Added");
                        back(2, "viewproduct.php");
                    }
                    else
                    {
                        write('d', "Error! Upload failed");
                        back(2, "addproduct.php");
                    }

                }
                else
                {
                    write('d', "SQL Syntax Error!");
                    back(2, "addproduct.php");
                }
            }
            else
            {
                write('d', "Please Fill all Data!  or Product Price not available : " .$product_price);
                back(2, "addproduct.php");
            }


        }
        else
        {
           ?>
                <div class="row">
                  <h3 class="bg-success" style="padding: 1%;margin-right:57% ;">Add Product</h3>
                    <div class="col-md-4">
                        
                        <form method="post"  action=""  enctype="multipart/form-data">
                            <div class="form-group">
                              <input name="product_name" type="text" class="form-control" id="product_name" placeholder="Product Name">
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
                                                        <option  value="<?php echo $row['category_id']; ?>">
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
                              <input name="product_price" type="number" class="form-control" id="product_price" placeholder="Product Price">
                            </div>


                            <div class="form-group">
                                <textarea name="product_description" class="form-control" rows="2" placeholder="Description"></textarea>
                            </div>



                            <div class="form-group">
                                <label for="exampleInputFile">Proudct Image</label>
                                <input name="product_image" type="file" id="exampleInputFile" placeholder="Proudct Image">
                            </div>
                            
                            

                            
                            <button name="submit" type="submit" class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
           <?php
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>