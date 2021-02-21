<div class="sidebar-menu">

    <?php
    if(isset($_SESSION)) {
        if ($_SESSION['admin'] == 'farmer') {
            echo "<div style='background: black;color: gray;padding-top: 80px;padding-bottom: 10px;display: grid;padding-left: 10px;text-align: left;'>
            <span><i class='fa fa-user'></i>  " . $_SESSION['name'] . " " . $_SESSION['surname'] . "</span>
            <br/>
            <span>" . $_SESSION['email'] . "</span>
            </div>
            
            <a href='#'><div class=side-options'>View All</div></a>
            <a href='#'><div class='side-options'>Add Tracker</div></a>
            <a href='#'><div class='side-options'>Update Profile</div></a>
            <a href='#'><div class='side-options'>Logout</div></a>
            
            ";

        } else {
            echo "<div style='background: black;color: gray;padding-top: 80px;padding-bottom: 10px;display: grid;padding-left: 10px;text-align: left;'>
            <span><i class='fa fa-user'></i>  " . $_SESSION['name'] . "</span>
            <br/>
            <span>" . $_SESSION['email'] . "</span>
            </div>
            
            <a href='#'><div class='side-options'>Admins</div></a>
            <a href='#'><div class='side-options'>Farmers</div></a>
            <a href='#'><div class='side-options'>Update Profile</div></a>
            <a href='#'><div class='side-options'>Logout</div></a>
            
            ";
        }
    }
    ?>



</div>
