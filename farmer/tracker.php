<?php include('../includes/session.php')?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Tracker - Farming Management System </title>
        <meta name="description" content="The system will allow the user to register online, then the information of the user will be validated. After registration the user will be allowed to login into the system. The user will then be allowed to choose the kind of truck she/he want to use, then the user will be required to enter the current location of his/her staff and destination location.">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="../assets/css/beautiful-dismissable-alert.css">
        <link rel="stylesheet" href="../assets/css/Button-Outlines---Pretty.css">
        <link rel="stylesheet" href="../assets/css/Google-Style-Login.css">
        <link rel="stylesheet" href="../assets/css/top-alert-ie-E-Mail-Confirmation.css">

    </head>
<style>
    body{
        background-image:url('../assets/img/livestock2.jpg');
        background-size: cover;
    }
    .parent {
        line-height: 100vh;
        text-align: center;
    }

    .child {
        display: inline-block;
        vertical-align: middle;
        line-height: 100%;
        padding-top: 15%;
    }
    form{
        background: cadetblue;
        border-radius:5px ;
    }
    .beautiful{
        margin: 50px;
        text-align: center;
    }
</style>
<body>

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
<input class="tracker_id" value="<?php if(isset($_SESSION['tracker_token'])){echo $_SESSION['tracker_token'];} ?>" hidden>
<?php

if(isset($_SESSION['tracker_token'])) {
    echo '
    <div class="parent">
        <div class="child">
    
            <p><h2>Tracker: '.$_SESSION['tracker_token'].'  <i class="fa fa-circle text-success"></i></h2></p>
            <p>
            <form class="form-signin" method="POST" action="../verify.php" >
            <input name="tracker_off"  value="'.$_SESSION['tracker_token'].'" hidden>
            <i class="glyphicon glyphicon-log-in"><input type="submit" value="Deactivate"></i>
            </form>
            </p>
        </div>
    </div>';

}else{

    echo '
    <div class="parent">
        <div class="child">
             <h5 class="error-message" style="color: red"></h5>
            <form class="form-signin" method="POST" action="../verify.php" id="form_id" onsubmit="return activateTracker()">
                <div style="padding: 30px">
                    <i style="padding-bottom: 5px">Enter Serial Number To Activate Tracker</i>
                    <input name="lat" >
                    <input name="lng" >
                    <div class="errorm"></div>
                    <input style="margin-top: 10px" class="form-control" type="text" required="" placeholder="Serial Numbers" autofocus="" name="tracker_id">
                    <br/>
                    <button class="btn btn-success btn-block btn-lg" type="submit">Activate</button>
                </div>
            </form>
        </div>
    </div>';
}

?>
</body>
<?php include('./../includes/scripts.php') ?>
<script>
    $(function() {
        $(document).on('click', '.activate', function (e) {

            e.preventDefault();

        });

    });


    navigator.permissions.query({name:'geolocation'})
        .then(function(permissionStatus) {
            localStorage.setItem('location', permissionStatus.state);

            permissionStatus.onchange = function() {
                localStorage.setItem('location', this.state);
            };
        });

    function activateTracker() {
        if(localStorage.getItem('location') =='prompt'){
            $('.error-message').html('ERROR -> Allow Geo Location To Activate Tracker');
            return false;
        }else{

            $('.error-message').html('');
            return true;

        }
    }
    getLocation();

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {

        localStorage.setItem('lat',position.coords.latitude);
        localStorage.setItem('lng',position.coords.longitude);
        $('.errorm').html('0');

    }
    setTimeout(function () {
        $('input[name=lat]').val(localStorage.getItem('lat'));
        $('input[name=lng]').val(localStorage.getItem('lng'));
    },1000);

    var id, options;

    function success(position) {
        if($('.tracker_id').val() !=''){
            var id = $('.tracker_id').val();
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

            $.ajax({
                type: 'POST',
                url: '../verify.php',
                data: {
                    update_now: id,
                    lat: lat,
                    lng: lng
                },
                dataType: 'json',
                success: function (response) {

                    console.log('updated');

                }});
        }

    }

    function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
    }

    options = {
        enableHighAccuracy: false,
        timeout: 5000,
        maximumAge: 0
    };

    navigator.geolocation.watchPosition(success, error, options);
    // $("#form_id").on("submit", function (e) {
    //     e.preventDefault();//stop submit event
    //     var self = $(this);//this form
    //
    //     showPosition;
    //     $('input[name=lat]').val(lat);
    //
    //     $("#form_id").off("submit");//need form submit event off.
    //     self.submit();//submit form
    // });
    //getLocation();

    // Check for Geolocation API permissions



    // navigator.geolocation.watchPosition(function(position) {
    //         console.log("i'm tracking you!");
    //     },
    //     function(error) {
    //         if (error.code == error.PERMISSION_DENIED)
    //             console.log("you denied me :-(");
    //     });
</script>
