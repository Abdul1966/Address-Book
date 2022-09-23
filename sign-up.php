<?php 
    session_start();
    require_once('functions.php');
    $users = new Users;       
    $users->otp = $users->generate_otp();
    get_header();?>

    <h1 class="align-center">Sign Up</h1>
    <?php 
        $users->signup_form();  
       
    ?>

<?php get_footer();?>