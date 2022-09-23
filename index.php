<?php 

    session_start();
    require_once ('functions.php');
    $address_book = new Address_Book;
    $users = new Users;
    
    if(!$users->is_user_logged_in()){
        redirect("login.php");
    }

    if(isset($_POST["add"])){
        $contact_name = $address_book->validate_input($_POST["contact-name"]);
        $company_name = $address_book->validate_input($_POST["company-name"]);
        $designation = $address_book->validate_input($_POST["designation"]);
        $mobile_number = $address_book->validate_input($_POST["mobile-number"]);
        $telephone_number = $address_book->validate_input($_POST["telephone-number"]);
        $email_address = $address_book->validate_input($_POST["email-address"]);
        $website = $address_book->validate_input($_POST["website"]);
        $office_address = $address_book->validate_input($_POST["office-address"]);   

        $data = array(
            "user_email"        =>  $_SESSION["email-address"],
            "contact_name"      =>  $contact_name,
            "company_name"      =>  $company_name,
            "designation"       =>  $designation,
            "mobile_number"     =>  $mobile_number,
            "tel_number"        =>  $telephone_number,
            "email_address"     =>  $email_address,
            "website"           =>  $website,
            "office_address"    =>  $office_address
        );        

        $address_book->add_record($data, "address_book");

    }

    //----------------------------------------------------------------------------------------

    if(isset($_POST["update"])){
        $id = $address_book->validate_input($_POST["id"]);
        $contact_name = $address_book->validate_input($_POST["contact-name"]);
        $company_name = $address_book->validate_input($_POST["company-name"]);
        $designation = $address_book->validate_input($_POST["designation"]);
        $mobile_number = $address_book->validate_input($_POST["mobile-number"]);
        $telephone_number = $address_book->validate_input($_POST["telephone-number"]);
        $email_address = $address_book->validate_input($_POST["email-address"]);
        $website = $address_book->validate_input($_POST["website"]);
        $office_address = $address_book->validate_input($_POST["office-address"]);   

        $data = array(
            "id"                =>  $id,
            "contact_name"      =>  $contact_name,
            "company_name"      =>  $company_name,
            "designation"       =>  $designation,
            "mobile_number"     =>  $mobile_number,
            "tel_number"        =>  $telephone_number,
            "email_address"     =>  $email_address,
            "website"           =>  $website,
            "office_address"    =>  $office_address
        );        

        $address_book->update_record($data, $id,"address_book");
    }

    get_header(); 

    if(isset($_POST["delete-record"])){
        $id = $_POST["record-id"];
        $records=$address_book->confirm_form($id);

    }


    if(isset($_POST["yes"])){
        $id=$_POST["id"];
        $address_book->delete_record($id, "address_book");
    }
    ?>
        <div class="row90"><?php $address_book->add_record_button();?></div>

    <?php

    $records=$address_book->get_records("address_book", "contact_name");
    if(isset($_POST["search-button"])){
        if($_POST["search-option"]=="Contact Name"){
            $records=$address_book->search_records($_POST["search-input"],'contact_name');
        }

        elseif($_POST["search-option"]=="Company Name"){
            $records=$address_book->search_records($_POST["search-input"],'company_name');
        }
    }
    $address_book->search_form();
    $address_book->display_records($records);
    
    //-----------------------------------------------------------------------------

    if(isset($_POST["add-record"])){
        $address_book->add_record_form();?>
        <script>window.location.href="#add-record-form-container";</script>
    <?php

    }
    
    //------------------------------------------------------------------------------

    if(isset($_POST["edit-record"])){
        $id = $_POST["record-id"];
        $address_book->edit_record_form($id); ?>
        <script>window.location.href="#edit-record-form-container";</script>
        <?php
    }
?>

<?php get_footer(); ?>
    