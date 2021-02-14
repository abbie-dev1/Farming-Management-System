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
            <a class="navbar-brand" href="./../index.html">Farming Management System </a>
        </div>
      
        <ul class="nav navbar-nav navbar-right" style="display: contents;">
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign-In</a></li><br/>
            <li><a href="register.php"><span class="fa fa-check-circle-o"></span> Register</a></li>
        </ul>
    </div>
</nav>';}

 ?>



