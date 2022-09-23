
jQuery(document).ready(function($){

    $("#user-add-button").click(function(){
        var pass =document.getElementById("user-pass");
        var confirmPass =document.getElementById("user-confirm-pass");
        var otp = document.getElementById("otp");
        var confirmOtp =document.getElementById("confirm-otp");
        var addFormStatus = document.getElementById("add-form-status");
        var addForm = document.getElementById("add-user-form");
        if(pass.value != confirmPass.value){
            addFormStatus.innerHTML="Passwords do not match";
            return;    
        }

        if(otp.value != confirmOtp.value){
            addFormStatus.innerHTML="Incorrect One Time Password";
            return; 
        }
        addForm.submit();
    });
    
    //---------------------------------------------------------------------
    
    $("#change-password-button").click(function(){
        var newPass = document.getElementById("new-password");
        var confirmNewPass = document.getElementById("confirm-password");
        var changePasswordStatus = document.getElementById("change-password-status");
        var changePassForm = document.getElementById("change-password-form");
        changePasswordStatus.innerHTML="";
        if(newPass.value!=confirmNewPass.value){
            changePasswordStatus.innerHTML="Passwords do not match";
        }
        else{
            
            changePassForm.submit();
        }
  

    });



});