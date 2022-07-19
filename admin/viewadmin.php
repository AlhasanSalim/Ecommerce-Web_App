<?php
    session_start();
    include_once('../webSiteSettings/site_methods.php');

    if(isset($_SESSION['admin_login']) && $_SESSION['admin_id'] == 1)
    {
        include_once('header.php');

        $sql = "SELECT * FROM admin";
        $result = mysqli_query($connect, $sql);

        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                ?>
                  <h3 class="bg-success" style="padding: 1%; margin-right:57%;">View Admin</h3>
                    <div class="panel panel-primary" style="margin-top: 50px;">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>E-mail</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['admin_id']; ?></td>
                                                <td><?php echo $row['admin_username']; ?></td>
                                                <td>**********</td>
                                                <td><?php echo $row['admin_email']; ?></td>
                                                <td>
                                                    <?php
                                                        if($row['admin_id'] == 1)
                                                        {
                                                            ?>  
                                                                <span class="glyphicon glyphicon-trash" style="color: black; cursor: not-allowed"></span>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <a href="deleteadmin.php?admin_id=<?php echo $row['admin_id'];?>">
                                                                    <span class="glyphicon glyphicon-trash" style="color: red;"></span>
                                                                </a>
                                                            <?php
                                                        }
                                                    ?>
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
                write('d', "There is no data for view!");
                back(2, "addadmin.php");
            }
        }

        else
        {
            write('d', "SQL Syntax error!");
            back(2, "viewadmin.php");
        }

        include_once('footer.php');
    }
    else
    {
        include_once('login.php');
    }
?>