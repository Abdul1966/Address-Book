
    <?php
        require_once 'functions.php';
        $users = new Users;
        get_header();
        
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $email=$users->validate_input($_POST["email-address"]);
            $pass = $users->validate_input($_POST["new-password"]);
            $pass = md5($pass);
            $users->change_password($email, $pass);
            ?>
            
            <div class="row80">
                <h2>Your password is changed successfully. <a href="login.php">Login</a> now</h2>
            </div>
            
        <?php
            
        }
        
        
        
        
        ?>
        
        
        
        
    <?php get_footer();?>