<?php
    include_once("header.php");

    ?>
                <div class="container-contact100">
                    <div class="wrap-contact100">
                       <?php
                            if(isset($_POST['submit']))
                            {
                                $name = noinjuction($_POST['name']);
                                $email = noinjuction($_POST['email']);
                                $phone = noinjuction($_POST['phone']);
                                $massage = noinjuction($_POST['massage']);

                                $to = "alhasan1997@hotmail.com";
                                $title = "You have a massage from $name";
                                $massage = "Massage from $name <br> E-mail : $email <br> Phone : $phone <br> Massage : $massage";

                                // Always set content-type when sending HTML email
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                if(mail($to, $title, $massage, $headers))
                                {
                                    write('s', "Send Success");
                                }
                                else
                                {
                                    write('d', "Unexpected Error!");
                                }

                            }
                            else
                            {
                                ?>
                                    <form method="post" action="">
                                        <span class="contact100-form-title">
                                            Get in Touch
                                        </span>
            
                                        <div class="wrap-input100">
                                            <input class="input100" id="name" type="text" name="name" placeholder="Name">
                                            <label class="label-input100" for="name">
                                                <span class="lnr lnr-user"></span>
                                            </label>
                                        </div>
            
                                        <div class="wrap-input100">
                                            <input class="input100" id="email" type="text" name="email" placeholder="Email">
                                            <label class="label-input100" for="email">
                                                <span class="lnr lnr-envelope"></span>
                                            </label>
                                        </div>
            
                                        <div class="wrap-input100">
                                            <input class="input100" id="phone" type="text" name="phone" placeholder="Phone">
                                            <label class="label-input100" for="phone">
                                                <span class="lnr lnr-phone-handset"></span>
                                            </label>
                                        </div>
            
                                        <div class="wrap-input100">
                                            <textarea class="input100" name="message" placeholder="Your message..."></textarea>
                                        </div>
            
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-send"></span>
                                            </button>
                                        </div>
        
                                    <form>
                                <?php
                            }
                       ?>
                    </div>
               </div>
    <?php

    include_once("footer.php");
?>