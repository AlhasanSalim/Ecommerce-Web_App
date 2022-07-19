<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        if(isset($_GET['category_id']))
        {
            $id = intval($_GET['category_id']);

            $sql = "SELECT * FROM category WHERE category_id=$id";

            $result = mysqli_query($connect, $sql);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    $row_old = mysqli_fetch_array($result);

                    if(isset($_POST['submit']))
                    {
                       $category = noInjuction($_POST['category']);

                       if($category == NULL)
                       {
                           write('d', "Please Fill all data!");
                           back(2, "editcategory.php?category_id=$id");
                       }
                       else
                       {
                          $sql = "UPDATE category SET category_name='$category' WHERE category_id=$id";

                          $result = mysqli_query($connect, $sql);

                           if($result)
                           {
                               write('s', "Category Updated");
                               back(2, "viewcategory.php");
                           }
                           else
                           {
                               write('d', "SQL Syntax Error!");
                               back(2 ,"editcategory.php?category_id=$id");
                           }
                       }
                    }

                    else
                    {
                        ?>
                          <h3 class="bg-success" style="padding: 1%; margin-right:57%;">Edit Password</h3>
                            <div class="col-md-4">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <input value="<?php echo $row_old['category_name']; ?>" name="category" type="text" class="form-control" id="exampleInputcategory" placeholder="Edit Category">
                                    </div>  
                                  <button name="submit" type="submit" class="btn btn-success">Edit</button>      
                                </form> 
                            </div>       
                        <?php
                    }
                }
                else
                {
                    write('w', "Unexpected Error!");
                    back(2, "editcategory.php");
                }
            }
            else
            {
                write('d', "SQL Syntax Error!");
                back(2, "editcategory.php?category_id=$id");
            }
        }
        else
        {
            write('d', "Unexpected Error!");
            back(2, "viewcategory.php");
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>