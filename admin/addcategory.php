<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        ?>
            <div class="row">
                <h3 class="bg-success" style="padding: 1%; margin-right:57%;">Add Category</h3>
                    <?php        
                        if(isset($_POST['submit']))
                        {
                            $category = noinjuction($_POST['category']);

                            if($category == NULL)
                            {
                                write('w', "Please fill all data!");
                                back(2, "addcategory.php");
                            }
                            else
                            {
                                $sql = "INSERT INTO category VALUES(NULL, '$category')";
                                $result = mysqli_query($connect, $sql);

                                if($result)
                                {
                                    write('s', "Added Category");
                                    back(2, "viewcategory.php");
                                }
                                else
                                {
                                    write('d', "SQL Syntax Error!");
                                    back(2, "addcategory.php");
                                }
                            }
                        }

                        else
                        {
                            ?>
                                <div class="col-md-4">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <input name="category" type="text" class="form-control" id="exampleInputcategoryname" placeholder="Catgory Name">
                                        </div>

                                        <button name="submit" type="submit" class="btn btn-info">Add</button>
                                    </form>
                                </div>
                            <?php
                        }
                    ?>
            </div>
        <?php              

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>