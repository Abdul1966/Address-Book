<?php
    $users = new Users;
    $main = new Main;
    if(isset($_POST["site-logout"])){    
        echo "logged out";  
       $_SESSION["user-name"]="";
       $_SESSION["email-address"]="";
       redirect("login.php");
       unset($_POST["logout"]);       
    }
?>

<div class="header">
    <div class="logo">
        <a href="index.php"><img src="assets/images/logo.png"/></a>
    </div>


    <div class="display-user-name">
        <h3>
            <?php
                if($users->is_user_logged_in()){
                    echo "Hi " . $_SESSION["user-name"];
                }
            ?>
        </h3>
    </div>
    
    <div class="page-title">
            <h1>Address Book </h1>
    </div> 

   <div class="header-login-logout-container"> 
       <?php
            if($users->is_user_logged_in()){
                $main->logout_form();
            }
            else{
                $main->login_form();
            }   
        ?>
    </div>  
</div>