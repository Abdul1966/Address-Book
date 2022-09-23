<?php
    require_once 'functions.php';
    
    $users =new Users;

    get_header();


    if(isset($_POST["send-email"])){ 
        $email_address= $users->validate_input($_POST["email-address"]);
            if($users->is_user_exists($email_address)){
                $token= $users->generate_token($email_address);
                $users->save_token($token, $email_address);
                $url ='http://addressbook.digitalnests.in/reset-password.php?token='. $token;
                $message = '<p>Please click the below link to reset your password</p></br>'.
                '<a href="' . $url .'">' .$url . '</a>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($email_address,"Link for resetting you password",$message,$headers); ?>
                <div class="row80">
                    <h3>Password reset link has been sent to your email.</h3>
                </div>
                <?php
            }
            else{ ?>
                <div class="row80">
                    <h2> This email does not exists in database. <a href="sign-up.php">Signup</a> for a new account</h2>
                </div>
                
            <?php }
        }
    
    ?>



<?php get_footer();?>