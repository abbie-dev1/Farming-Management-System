<div class="sidebar-menu">

    <?php
    if(isset($_SESSION)) {
        if ($_SESSION['user'] == 'farmer') {
            echo "<div style='background: black;color: gray;padding-top: 80px;padding-bottom: 10px;display: grid;padding-left: 10px;text-align: left;'>
            <span><i class='fa fa-user'></i>  " . $_SESSION['name'] . " " . $_SESSION['surname'] . "</span>
            <br/>
            <span>" . $_SESSION['email'] . "</span>
            </div>
            
            <a href='#' id='track_all' class='anim_trace'><div class='side-options'>View All <i class='fa fa-location-arrow'></i></div></a>
            <a href='#'><div class='side-options'>Add Tracker <i class='fa fa-plus'></i></div></a>
            <a href='#'><div class='side-options profile'>Update Profile <i class='fa fa-edit'></i></div></a>
            <a href='#'><div class='side-options'>Logout <i class='glyphicon glyphicon-log-in'></i></div></a>
            
            ";

        } else {
            echo "<div style='background: black;color: gray;padding-top: 80px;padding-bottom: 10px;display: grid;padding-left: 10px;text-align: left;'>
            <span><i class='fa fa-user'></i>  " . $_SESSION['name'] . "</span>
            <br/>
            <span>" . $_SESSION['email'] . "</span>
            </div>
            
            <a href='#'><div class='side-options'>Admins</div></a>
            <a href='#'><div class='side-options'>Farmers</div></a>
            <a href='#'><div class='side-options profile'>Update Profile</div></a>
            <a href='../logout.php'><div class='side-options'>Logout</div></a>
            
            ";
        }
    }
    ?>



</div>
