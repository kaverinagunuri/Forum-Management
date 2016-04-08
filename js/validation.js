$(document).ready(function(){
   
    $("#Password").blur(function () {

        var ValidatePassword = $("#Password").val();
        if(ValidatePassword.length<8)
        {
           $("#Password_error").html("Password should be atleast 8 characters");  
        }
        
        else{
          $("#Password_error").html("");
    }

    });
$("#ConfirmPassword").blur(function()
{ 
    var ValidateconfirmPassword=$("#ConfirmPassword").val();
    if(ValidateconfirmPassword != $("#Password").val())
    {
        $("#ConfirmPassword_error").html("Confirm Password Should be same as Password")
    }
    else{
        $("#ConfirmPassword_error").html("");
    }
});
    
});