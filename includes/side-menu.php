<div class="sidebar-menu">
    <div style="background: black;color: gray;padding-top: 80px;padding-bottom: 10px;display: grid;padding-left: 10px;text-align: left;">
        <span><i class="fa fa-user"></i>  <?php echo $_SESSION['name'].' '.$_SESSION['surname'] ?></span>
        <br/>
        <span><?php echo $_SESSION['email']?></span>
    </div>
    <a href="#"><div class="side-options">View All</div></a>
    <a href="#"><div class="side-options">Add Tracker</div></a>
    <a href="#"><div class="side-options">Update Profile</div></a>
    <a href="#"><div class="side-options">Logout</div></a>
</div>
