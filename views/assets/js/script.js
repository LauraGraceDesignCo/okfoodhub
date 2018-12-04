//global variable
var createAccountPasswordsMatch = false;


$(document).ready(function(){

    $('#password2').keyup(checkPasswordMatch);


    $('.click-switch-index').click(function(){
        $('#form-create').fadeIn();
        $('#form-login').hide();
        $('#white-login-hello').hide();


    });

    $('.click-switch-index2').click(function(){
        $('#form-create').hide();
        $('#form-login').fadeIn();
        $('#white-login-hello').fadeIn();


    });

    $('#createAccountForm').submit(function(e){
        if(createAccountPasswordsMatch == false ){
            e.preventDefault();
        }

    });

    // $('.price-create-edit-post').click(function() {
    //     $(this).val("$");
    //
    // });

    $('.price-create-edit-post').keypress(function(event) {
      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });

    //produce on hover
    $('.img-produce').hover(function(){
        $('.p-produce').show();

    });

    $('.img-produce').mouseleave(function(){
        $('.p-produce').hide();

    });

    //meat on hover
    $('.img-meat').hover(function(){
        $('.p-meat').show();

    });

    $('.img-meat').mouseleave(function(){
        $('.p-meat').hide();

    });

    //dairy on hover
    $('.img-dairy').hover(function(){
        $('.p-dairy').show();

    });

    $('.img-dairy').mouseleave(function(){
        $('.p-dairy').hide();

    });


    //grain on hover
    $('.img-grain').hover(function(){
        $('.p-grain').show();


    });

    $('.img-grain').mouseleave(function(){
        $('.p-grain').hide();

    });


    $('.delete-btn').click(function(){

        if( !confirm('Are you sure you want to delete this product?') ){
            return false; // if they hit cancel
        }

    });


}); // END DOCUMENT READY

//checking to see on create an account if passwords match using keyup
function checkPasswordMatch() {
    var password1 = $('#password1').val();
    var password2 = $('#password2').val();

    if( password1 != password2){
        createAccountPasswordsMatch = false;
        $('#passMessage').html("Passwords must match!");

    }else{
        createAccountPasswordsMatch = true;
        $('#passMessage').html("Passwords match!");
    }

}

function previewFile() {
    var preview = document.getElementById('img-preview');
    var file = document.getElementById('file-profile').files[0];

    var reader = new FileReader();

    reader.onloadend = function(){
        preview.src = reader.result;
    }

    if(file){
        reader.readAsDataURL(file);
    }else{
        preview.src = "";
    }

}
