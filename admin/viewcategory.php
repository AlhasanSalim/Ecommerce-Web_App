<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login'])) 
    {
        include_once('header.php');

        $sql = "SELECT * FROM category";
        $result = mysqli_query($connect, $sql);

        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                ?>
                  <h3 class="bg-success" style="padding: 1%; margin-right:57%;">View Category</h3>  
                    <div class="panel panel-primary" style="margin-top: 50px;">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['category_id']; ?></td>

                                                <td><?php echo $row['category_name']; ?></td>


                                                <td>
                                                    <a href="editcategory.php?category_id=<?php echo $row['category_id'];?>">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                </td>


                                                <td>
                                                    <a href="deletecategory.php?category_id=<?php echo $row['category_id'];?>">
                                                        <span class="glyphicon glyphicon-trash" style="color: red;"></span>
                                                    </a>
                                                </td>


                                            </tr>
                                        <?php
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
                back(2, "addcategory.php");
            }

        }
        else
        {
            write('d', "SQL Syntax Error!");
            back(2, "viewcategory.php");
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>