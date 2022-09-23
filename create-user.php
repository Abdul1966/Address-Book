<?php
    session_start();
    require_once ('functions.php');
    $users = new Users;
        
    get_header();

    if(isset($_POST["next"])){
        $users->otp=$_POST["otp"];
        $users->first_name=$_POST["first-name"];
        $users->last_name=$_POST["last-name"];
        $users->email_address=$_POST["email-address"];
        $message = '<p> OTP for Address Book Registration is  </p>
                    <h1>'. $users->otp . '</h1>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($users->email_address,"One Time Password",$message,$headers);    
    }
    
        if($users->is_email_duplicate($users->email_address)){ 
            
            echo '<div class="row80">
                        <h3>This email address already exists. You can <a href="login.php">login</a> with this email address if you want or use 
                        a different email address to <a href="sign-up.php">signup</a> for  a new account</h3>
                  </div>';
        }
        
        else{ ?>
        
            <div class="row80">
                <h3>One Time Password is sent to your email address. Input the one time password in the below form</h3>
            </div>
        
        <?php
            
                $users->add_user_form();

        }

    get_footer();

?>