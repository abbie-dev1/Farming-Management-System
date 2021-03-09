<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php';

if($_SESSION['user'] == 'farmer'){
    header('location: ./../farmer/welcome.php');
}

if(!isset($_SESSION['loggedin'])){
    header('location: ./../login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style type="text/css"> body{ font: 14px sans-serif;text-align: center; }</style>
</head>
 <body style="display: flex">
 <?php include("../includes/side-menu.php")?>
 <div class="body-content">
<div class="intro-text" style="padding-top: 50px">
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
                        <div class='alert btn-success  beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['success']."</div>
                        ";
        unset($_SESSION['success']);
    }

    ?>
</div>
     <input type="hidden" class="user_token" value="<?php echo $_SESSION['admin']?>">
<div class="page-header">
     <h1>REPORTS</h1>
 </div>
     <section>
     <div class="row">
         <div class="col-xs-12">
             <div class="box">
                 <div class="box-header with-border">

                     <div class="pull-right">
                         <div class="form-group">
                             <label for="type" class="col-sm-3 control-label">Report Type</label>

                             <div class="col-sm-9">
                                 <select name="type" id="type" class="form-control" required>
                                     <option selected disabled>Select report type</option>
                                     <option value="admins">Admins</option>
                                     <option value="farmers">Farmers</option>
<!--                                     <option value="bookings">Booking</option>-->
<!--                                     <option value="history">History</option>-->
                                 </select>
                             </div>
                         </div>
                         <div class="input-group">
                             Search Keys:
                             <input type="text" id="search" name="search" class="form-control" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" />
                             <br/>
                         </div>
                     </div>
                 </div>

                 <div style="padding-left: 30%;">
                     <div class="input-group calenda">
                         Start Date: <span class="fromdate"><span class="fa fa-calendar-times-o"></span></span>
                         <input type="date" name="fromD" class="form-control" placeholder="Date" required />
                         <br/>
                         End Date: <span class="todate"><span class="fa fa-calendar-times-o"></span></span>
                         <input type="date" name="toD" class="form-control" placeholder="Date" required />
                     </div>
                     <br/>
                     <span class="date-error"></span><br/>
                     <button name="generate" class="btn btn-success" onclick="generateRep()"><i class="fa fa-gears"></i> Generate Report</button>
                     <button id="download" name="download" class="btn btn-warning" onclick="" disabled><i class="fa fa-download"></i> Download Report</button>
                 </div>

                 <div class="box-body" id="summery-report" >
                     <h5 id="text-primary" class="card-title text-primary"></h5>
                     <table id="example1" class="table table-bordered">
                         <thead></thead>
                         <tbody></tbody>
                     </table>
                 </div>
             </div>

         </div>
         </section>

 </div>
 </body>
 </html>
<?php include('./../includes/scripts.php') ?>
<?php include('./files/admin_modal.php') ?>

<script type="application/javascript" src="../assets/js/report.js"></script>
<script type="application/javascript" src="../assets/js/pdf.js"></script>

