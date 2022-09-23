<?php
    require_once 'functions.php';
    session_start();
    $admin = new Admin;
    $users =new Users;
    
    //-----------------------------------------------------------------------------
    if(isset($_POST["login"])){
        $email = $admin->validate_input($_POST["email-address"]);
        $pass = $admin->validate_input($_POST["user-pass"]);
        if($admin->validate_user($email, $pass)){
            $_SESSION["admin-user"]=$email;
        }
        else{
            $admin->$status="Either email or password is incorrect";
        }
    }
    
    
    
    
    
    get_header();
    
    if($_SESSION["admin-user"]==""){
        $admin->login_form();
    }
    else{
    $user_records =$users->get_users("users");
    $admin->display_users($user_records);?>
    
    <div class="row80">
        <h3>Total Number of Records <?php echo $users->count_records($user_records);?>  </h3>
    </div>
    
    <?php 
    
    } 
    ?>
    
    

    
   

    
    
    <?php get_footer();?>