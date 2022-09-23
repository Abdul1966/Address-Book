<?php

    session_start();
    require_once 'functions.php';
    
    get_header();?>
    
    <div class="lost-password-container">
        <h3 class="align-center">Enter your Email Address</h3>
        <form class="lost-password" method="post" action="send-reset-link.php">
            <div class="row">
                <div class="col1">
                    <label for ="email-address">Email Address</label>
                </div>
                <div class="col2">
                    <input class="text-input" type="email" name="email-address" required>
                </div>
            </div>
            <div class="button-row">
                <input class="submit-button" type="submit" name = "send-email"value = "Send">
            </div>
        </form>
    </div>
    
    
    <?php get_footer();?>