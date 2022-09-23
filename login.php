<?php
        session_start();
        $_SESSION["email-address"]="";

    require_once("functions.php");

    $users =new Users;
    $status="";

    if(isset($_POST["login"])){
        $email_address= $users->validate_input($_POST["email-address"]);
        $user_pass= $users->validate_input($_POST["user-pass"]);
        $user_pass = md5($user_pass);
        if($users->is_user_exists($email_address)){
            $user_validated = $users->validate_user($email_address, $user_pass);

            if($user_validated){
                $record=$users->get_record_by_user_email("users", "email_address", $email_address);

                $_SESSION["email-address"]=$email_address;
                $_SESSION["user-name"]=$record["first_name"] . "  " .$record["last_name"];
                redirect("index.php");
                exit();
            }
            else{
                $users->status="Incorrect password";
            }    
            
        }
        else{
            $users->status= "User Email does not exists";
        }

    }
    get_header();

    $users->login_form();
    get_footer();


?>