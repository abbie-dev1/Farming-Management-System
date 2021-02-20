let Validation = false;
let emailvalidation = false;
let validatedpassword = false;
let strongpassword = false;
let contactValidated = false;

function ValueKeyPress(trigger) {

    if (trigger === 'mobile') {
        var contact = $('input[name=mobile]').val();

        if (contact.length === 0) {
            $('#verify').html('');
        }

        if (contact.length < 10) {
            $('#verify').css('color', 'red').html('<i>**the number is invalid!**</i>');
            contactValidated = false;
        }

        if ((contact.length === 10 && contact[0] === "0" && (contact[1] === "6" || contact[1] === "7" || contact[1] === "8"))
            || (contact.length === 11 && contact[0] === "2" && contact[1] === "7")) {
            $('#verify').css('color', 'Green').html(' <i>the number is valid</i>');
            contactValidated = true;
        } else if (contact.length > 10) {
            $('#verify').css('color', 'red').html('<i>**the number is invalid!**</i>');
            contactValidated = false;
        }
        else {
            $('#verify').css('color', 'red').html('<i>**the number is invalid!**</i>');
            contactValidated = false;
        }
    }
}


function emailValidate(n) {
    if (n === 'register') {
        var count =0;
        let email = $('#email').val();
        let atpos = email.indexOf("@");
        let dotpos = email.lastIndexOf(".");
        let afterDot = email.substr(dotpos,email.length -1);

        //To check if We have one @ character
        var iChar = "@";
        for (var i = 0; i < email.length; i++) {
            if (iChar.indexOf(email.charAt(i)) != -1) {
                count= count+1;
            }
        }

        //
        if (atpos > 1 && dotpos > atpos && email.length > dotpos + 1 && count == 1) {
            emailvalidation = true;
            document.getElementById('email').style.borderColor = "#ced4da";
        } else if (email.length === 0) {
            document.getElementById('email').style.borderColor = "#ced4da";
            emailvalidation = true;
        } else {
            document.getElementById('email').style.borderColor = "red";
            emailvalidation = false;
        }

        //Checking if the last character after dot
        if(afterDot !== '.com'&& afterDot !== '.za'&& afterDot !== '.org'&& afterDot !== '.net'&& afterDot !== '.uk'){
            document.getElementById('email').style.borderColor = "red";
            emailvalidation = false;
        }

        //Checking if the email does not have symbolic characters
        var iChars = "!#$%^&*()+=,~[]\\\';/{}|\":<>?";
        for (var i = 0; i < email.length; i++) {
            if (iChars.indexOf(email.charAt(i)) != -1) {

                document.getElementById('email').style.borderColor = "red";
                emailvalidation = false;
            }
        }
    }
}

function CheckPassword()
{

    let n = $('#password').val();
    let passwordPatten=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{8,64}$/;
    if(n.length > 0) {
        if (n.match(passwordPatten)) {
            $('#strongPassword').css('color', 'Green').html('<i>strong</i>');
            strongpassword = true;
        } else {
            $('#strongPassword').css('color', 'red').html('<i>weak</i>');
            strongpassword = false;
        }
        if(n.length > 7){
            $('#miniCharacters').css('color','green');
        }else {
            $('#miniCharacters').css('color','black');
        }
        if(/[a-z]/.test(n)){
            $('#lowercase').css('color','green');
        }else{
            $('#lowercase').css('color','black');
        }
        if(/[A-Z]/.test(n)){
            $('#uppercase').css('color','green');
        }else{
            $('#uppercase').css('color','black');
        }
        if(/[0-9]/.test(n)){
            $('#hasNumber').css('color','green');
        }else{
            $('#hasNumber').css('color','black');
        }
        if(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(n)){
            $('#special_character').css('color','green');
        }else{
            $('#special_character').css('color','black');
        }
    }else{
        $('#strongPassword').html('');
        $('.tooltiptext label').css('color','black');
        strongpassword = false;
    }

    if ($(".tooltiptext > label").css('color') == 'rgb(0, 128, 0)' ){
        strongpassword = true;
    }
}

function matchPassword(){
    let password = $('#password').val();
    let password_confirm = $('#password-input').val();
    if (password_confirm.length === 0) {
        $('#passwordMatch').html('');
        validatedpassword=false;
        return;
    }

    if (password === password_confirm) {
        $('#passwordMatch').css('color', 'Green').html('<i>Match!</i>');
        validatedpassword = true;
        return;
    }
    else {
        $('#passwordMatch').css('color', 'red').html('<i>**Don\'t Match!**</i>');
        validatedpassword=false;
        return;
    }
}

function sendForm(){
    if (validatedpassword && emailvalidation && strongpassword && contactValidated){
        Validation = true;
        return true;
    }
        if (!validatedpassword){
            $('#password-input').focus();
            return false;
        }
        if (!emailvalidation){
            $('#email').focus();
            return false;
        }
        if (!strongpassword){
            $('#password').focus();
            return false;
        }
        if (!contactValidated) {
            $('#pNumber').focus();
            return false;
        }

}

$('.eyespan').on('click', function (e){
    let type = $('.inputTxt');
    $('.fa-eye').toggleClass('fa-eye-slash');
    if (type.attr('type') == 'text'){
        type.attr({type:"password"});
    }else{
        type.attr({type:"text"});
    }

});
