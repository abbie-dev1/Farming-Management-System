<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Hot desk registrations</title>
    <meta name="description" content="The system will allow the user to register online, then the information of the user will be validated. After registration the user will be allowed to login into the system. The user will then be allowed to choose the kind of truck she/he want to use, then the user will be required to enter the current location of his/her staff and destination location.">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/beautiful-dismissable-alert.css">
    <link rel="stylesheet" href="assets/css/Button-Outlines---Pretty.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/top-alert-ie-E-Mail-Confirmation.css">

</head>

<body id="page-top">
<?php include 'includes/navbar.php';?>
<?php include 'includes/session.php'; ?>

    <header class="masthead" style="background-image:url('./../images/banner_img.png');    color: gray;">
        <div class="container">
            <div class="intro-text" style="padding-top: 20px">
            <?php
                    if(isset($_SESSION['error'])){
                        echo "
                        <div class='alert alert-warning beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['error']."</div>
                        ";
                        unset($_SESSION['error']);
                    }

                    if(isset($_SESSION['success'])){
                        echo "
                        <div class='alert btn-success beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['success']."</div>
                        ";
                        unset($_SESSION['success']);
                    }
                    ?>
                
                <div class="intro-lead-in"></div>
                <h2>Registration</h2>
                <div class="intro-heading text-uppercase"></div>
                 <form class="bootstrap-form-with-validation" action="signup.php" method="POST" onsubmit="sendForm();" enctype="multipart/form-data">

                    <div class="form-group"><label for="firstname">First Name</label><input class="form-control" type="text" id="firstname" name="firstName" placeholder="Enter your name" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="lastname">Last Name</label><input class="form-control" type="text" id="lastname" name="lastName" placeholder="Enter your surnname" onkeypress="return /[a-z]/i.test(event.key)" required></div>
                    <div class="form-group"><label for="mobile">Contact no.</label><input class="form-control" type="text" id="mobile" name="mobile"  placeholder="Cellphone no." onkeypress="return i.test(event.key)" onkeyup="ValueKeyPress('mobile');" required></div>
                     <span id="verify"></span>
                    <div class="form-group"><label for="address">Address</label><input class="form-control" type="text" id="address" name="address" placeholder="Your Residencial address" onkeypress="return i.test(event.key)" required></div>
                    <div class="form-group"><label for="email">Email&nbsp;</label><input class="form-control" type="email" id="email" name="email" placeholder="e.g example@gmail.com" onkeyup="emailValidate('register')" required></div>

                     <div class="form-group">
                         <label for="gender">Gender</label>
                             <select class="form-control" id="gender" name="gender" required>
                                 <option value="" selected hidden>Select Gender</option>
                                 <option value="male">Male</option>
                                 <option value="female">Female</option>
                                 <option value="other">Other</option>
                             </select>
                     </div>


                    <div class="form-group"><label for="password">Password&nbsp;</label><input class="form-control inputTxt" type="password" placeholder="New Password" id="password" name="password" onkeyup="CheckPassword()" required><span class="fa fa-eye eyespan" style="margin-top: -30px;"></span></div>
                    <span class="tooltiptext"><label id="miniCharacters">* 8 Characters minimum</label><br><label id="special_character" >* Has special character</label><br><label id="lowercase" >* Has lowercase character</label><br><label id="uppercase" >* Has uppercase character</label><br><label id="hasNumber" >* Has a number</label></span>
                    <div class="form-group"><label for="password-input">Confirm Password&nbsp;</label><input class="form-control inputTxt" type="password"  placeholder="Confirm Password"id="password-input" name="current_password" onkeyup="matchPassword()" required></div>
                    <span id="passwordMatch"></span>
                    <div class="form-group"><button class="btn btn-primary" name="signup" type="submit">Register</button></div>
                </form>
    </header>
   <?php include("includes/footer.php")?>
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1-full.jpg">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                        cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-unstyled">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul><button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>