<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>DELETING ...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./../admin/admin_handle.php" enctype="multipart/form-data">
                    <input type="hidden" class="id_delete">
                    <h4><span class="fullname"></span></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat" ><i class="fa fa-trash-o"></i> DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit User</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./../admin/admin_handle.php">
                    <div class="editUsers">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Profile Update -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Update Profile</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./../admin/admin_handle.php">
                    <input type="hidden" id="edit_id" name="profile_admin">
                    <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                        </div>
                    <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                       </div>
                    <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>

    <div class="col-sm-9">
                                   <input type="password" class="form-control" id="password" name="password" required>
                               </div>
                       </div>

                    <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label">Mobile</label>

                           <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                               </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New User</b></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="col-sm-9">
                        <select class="form-control" name="form" onchange="changeForm()" required>
                            <option value="" selected hidden>Select Member You Wish To Add</option>
                            <option value="admin">Admin</option>
                            <option value="farmer" >Farmer</option>
                        </select>
                </div><br/>

                <div class="farmer-form" hidden>
                    <div><h3>Add Farmer</h3></div>
              <form class="form-horizontal" method="POST" action="./../admin/admin_handle.php" enctype="multipart/form-data">
                <input name="addFarmer" hidden>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>
                </div>
                  <div class="form-group">
                      <label for="mobile" class="col-sm-3 control-label">Contact no.</label>
                      <div class="col-sm-9">
                          <input class="form-control" type="text" id="mobile" name="mobile"  placeholder="Cellphone no." onkeypress="return i.test(event.key)" onkeyup="ValueKeyPress('mobile');" required>

                      </div>
                 </div>
                  <span id="verify"></span>
                  <div class="form-group">
                      <label for="address" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-9">
                          <input class="form-control" type="text" id="address" name="address" placeholder="Your residential address"  required>

                      </div>
                  </div>
                  <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email&nbsp;</label>
                      <div class="col-sm-9">
                          <input class="form-control" type="email" id="email" name="email" placeholder="e.g example@gmail.com" onkeyup="emailValidate('register')" required>
                      </div>
                    </div>


                  <div class="form-group">
                      <label for="gender" class="col-sm-3 control-label">Gender</label>

                      <div class="col-sm-9">
                          <select class="form-control" id="gender" name="gender" required>
                            <option value="" selected hidden>Select Gender</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="other">Other</option>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Password</label>

                      <div class="col-sm-9">
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                  </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
                </div>


                <div class="admin-form" hidden>
                    <h3>Add Admin</h3>
                <form class="form-horizontal" method="POST" action="./../admin/admin_handle.php" enctype="multipart/form-data">
                    <input name="addAdmin" hidden>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" onkeypress="return /[a-z]/i.test(event.key)" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Contact no.</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="mobile" name="mobile"  placeholder="Cellphone no." onkeypress="return i.test(event.key)" onkeyup="ValueKeyPress('mobile');" required>

                        </div>
                    </div>
<!--                    <span id="verify"></span>-->
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="address" name="address" placeholder="Your residential address"  required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email&nbsp;</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="email" id="email" name="email" placeholder="e.g example@gmail.com" onkeyup="emailValidate('register')" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password&nbsp;</label>
                        <div class="col-sm-9">
                            <input class="form-control inputTxt" type="password" placeholder="New Password" id="password" name="password" onkeyup="CheckPassword()" required>
                        </div>
                       <span class="fa fa-eye eyespan" style="margin-top: -30px;"></span>
                    </div>
<!--                    <span class="tooltiptext">-->
<!--                        <label id="miniCharacters">* 8 Characters minimum</label>-->
<!--                        <br><label class="special_character" >* Has special character</label>-->
<!--                        <br><label class="lowercase" >* Has lowercase character</label><br>-->
<!--                        <label class="uppercase" >* Has uppercase character</label><br>-->
<!--                        <label class="hasNumber" >* Has a number</label>-->
<!--                    </span>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="new-password" class="col-sm-3 control-label">Password</label>-->
<!---->
<!--                        <div class="col-sm-9">-->
<!--                            <input type="password" class="form-control" id="new-password" name="new-password" required>-->
<!--                        </div>-->
<!--                    </div>-->



            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
                </div>

            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" >
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
                $('.strongPassword').css('color', 'Green').html('<i>strong</i>');
                strongpassword = true;
            } else {
                $('.strongPassword').css('color', 'red').html('<i>weak</i>');
                strongpassword = false;
            }
            if(n.length > 7){
                $('.miniCharacters').css('color','green');
            }else {
                $('.miniCharacters').css('color','black');
            }
            if(/[a-z]/.test(n)){
                $('.lowercase').css('color','green');
            }else{
                $('.lowercase').css('color','black');
            }
            if(/[A-Z]/.test(n)){
                $('.uppercase').css('color','green');
            }else{
                $('.uppercase').css('color','black');
            }
            if(/[0-9]/.test(n)){
                $('.hasNumber').css('color','green');
            }else{
                $('.hasNumber').css('color','black');
            }
            if(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(n)){
                $('.special_character').css('color','green');
            }else{
                $('.special_character').css('color','black');
            }
        }else{
            // $('#strongPassword').html('');
            $('.tooltiptext label').css('color','black');
            strongpassword = false;
        }

        if ($(".tooltiptext > label").css('color') == 'rgb(0, 128, 0)' ){
            strongpassword = true;
        }
    }

    function matchPassword(){
        let password = $('#password').val();
        let password_confirm = $('#new-password').val();
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

</script>

     