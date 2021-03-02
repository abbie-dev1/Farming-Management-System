<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .navbar{
        margin-bottom: 0px !important;
        border-radius: 0px !important;
        position: fixed;
        width: 100%;
    }
    .sidebar-menu{
        width: 20%;
        background-color: lightgrey;
        text-decoration: none;
        text-underline: none;
    }
    .body-content{
        padding-top: 10%;
        width: 100%;
        padding: 50px;
    }
    .side-options{
        border: grey solid 2px;
        font-size: x-large;
        padding: 14px;
        margin: 5px;
    }
    .full-sidebar{
        background: black;color: gray;padding-top: 80px;padding-bottom: 10px;display: grid;padding-left: 10px;text-align: left;
    }
    .half-sidebar{
        padding-top: 10%;
        z-index: 9999999;
        position: fixed;
        display: none;
    }
    /*.side-options{*/
    /*    border: grey solid 2px;*/
    /*    font-size: x-large;*/
    /*    padding: 14px;*/
    /*    margin: 5px;*/
    /*}*/
    /*.side-options i{*/
    /*    float: left;*/
    /*}*/

    /*.sidebar {*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*    width: 200px;*/
    /*    background-color: #f1f1f1;*/
    /*    position: fixed;*/
    /*    height: 100%;*/
    /*    overflow: auto;*/
    /*}*/

    /*.sidebar a {*/
    /*    display: block;*/
    /*    color: black;*/
    /*    padding: 16px;*/
    /*    text-decoration: none;*/
    /*}*/

    /*.sidebar a.active {*/
    /*    background-color: #4CAF50;*/
    /*    color: white;*/
    /*}*/

    /*.sidebar a:hover:not(.active) {*/
    /*    background-color: #555;*/
    /*    color: white;*/
    /*}*/

    /*div.content {*/
    /*    margin-left: 200px;*/
    /*    padding: 1px 16px;*/
    /*    height: 1000px;*/
    /*}*/

    @media screen and (max-width: 1300px) and (min-width: 950px) {
        .side-options{
            font-size: unset;
        }
        .side-options i{
            float: left;
        }
    }
    @media screen and (min-width: 0px) and (max-width: 949px) {
        .sidebar-menu{
            display: none;
        }
        .half-sidebar{
            display: block;
        }
    }

    .mapboxgl-canvas{
        width: 100% !important;
        height: 100% !important;
    }
</style>
<?php
    if(isset($_SESSION['loggedin'])){

    echo '
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0);">Farming Management System </a>
        </div>
        <ul class="nav navbar-nav" style="display: contents;">
            <li class="active"><a href="./../admin/welcome.php"><i class="fa fa-home"></i> Home</a></li>
            
            
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">'.$_SESSION['email'].'</a></li>
            <li><a href="./../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>';
}else{

echo '
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Farming Management System </a>
        </div>
      
        <ul class="nav navbar-nav navbar-right" style="display: contents;">
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign-In</a></li><br/>
            <li><a href="register.php"><span class="fa fa-check-circle-o"></span> Register</a></li>
        </ul>
    </div>
</nav>';}

 ?>



