<?php 
    require_once 'functions.php';
    $users = new Users;
    
    get_header();
    if(isset($_POST)){
        $token= $_GET['token'];
    }
    $records = $users->get_users("users");
    foreach($records as $record){
        if($token===$record["token"]){
            $email = $record["email_address"];
            $token_date =$record["token_date"];
            $token_expiry_date = date_create($token_date);
            date_add($token_expiry_date, date_interval_create_from_date_string("24 hours"));
            $token_expiry_date= date_format($token_expiry_date, "Y-m-d");
            $current_date=date("Y-m-d");
            if($token_expiry_date>$current_date){
                $users->change_password_form($email);
            }
            else{ ?>
                
                <div class="row80">
                    <h2>You token is expired go to <a href="lost-password.php"> Lost Password Page</a></h2>
                </div>
            <?php 
                
            }
            break;
        }
       
    }

    ?>
    <?php get_footer();?>
    