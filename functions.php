<?php 

    define("ABSPATH", (__DIR__));
    include_once (ABSPATH . '/inc/class-server.php');
    include_once (ABSPATH . '/inc/class-users.php');
    include_once (ABSPATH . '/inc/class-address-book.php');
    include_once (ABSPATH . '/inc/class-main.php');
    include_once (ABSPATH . '/inc/class-admin.php');


    function get_header(){
        require_once (ABSPATH .'/header.php');

    }

    function get_footer(){
        require_once (ABSPATH .'/footer.php');
    }

    function get_template_part($template){
        switch ($template){
            case "main-header":
                require_once (ABSPATH . '/template-parts/main-header.php');
                break;
            case "main-footer":
                require_once (ABSPATH . '/template-parts/main-footer.php');
                break;        }
    }

    function the_title($title){?>
        <h1 class="title"><?php echo $title;?></h1>
    <?php
    }

    function redirect($url){
        header("Location:" . $url);
    }

    ?>



    