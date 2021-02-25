<?php include('../includes/session.php')?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Login - Farming Management System </title>
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

<div class="parent">
    <div class="child">

        <form class="form-signin" method="POST" action="../verify.php">
            <div style="padding: 30px">
                <i style="padding-bottom: 5px">Enter Serial Number To Activate Tracker</i>
                <input style="margin-top: 10px" class="form-control" type="text" required="" placeholder="Serial Number" autofocus="" name="serial">
                <br/>
                <button class="btn btn-success btn-block btn-lg "type="submit">Activate</button>
            </div>
        </form>
    </div>
</div>
</body>
