<?php
    session_start();
    require_once ('functions.php');
    $users = new Users;

    get_header();


     if($_SERVER["REQUEST_METHOD"] == "POST"){
        $first_name = $users->validate_input($_POST["first-name"]);
        $last_name = $users->validate_input($_POST["last-name"]);
        $password = $users->validate_input($_POST["user-pass"]);
        $password = md5($password);
        $email_address = $users->validate_input($_POST["email-address"]);
        
        $user_data=array(
            'first_name'    =>$first_name,
            'last_name'     =>$last_name,
            'user_pass'     =>$password,
            'email_address' =>$email_address
            
            );
            
         $users->add_record($user_data, "users");
         
                echo '<div class="row80">
                <h3>Account created successfully. You can <a href="login.php">login</a> with your email address </h3>
          </div>';
            
     }



?>

<?php get_footer();?>