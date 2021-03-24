<!-- Add -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Tracker</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="./../farmer/farmer_handle.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="type" class="col-sm-3 control-label">Animal Type</label>

                    <div class="col-sm-9">
                        <select name="animal_type" class="form-control" onchange="changeBreed()" required>
                            <option value="" disabled selected>Select Animal Type ...</option>
                            <option value="cattle">Cattle</option>
                            <option value="goat">Goat</option>
                            <option value="chicken">Chicken</option>
                            <option value="horse">Horse</option>
                            <option value="pig">Pig</option>
                        </select>
                    </div>
                </div>

                    <div class="form-group breed_container" hidden>
                        <label for="breed_type" class="col-sm-3 control-label">Breed Type</label>

                        <div class="col-sm-9 breed_select">

                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-9">

                            <img class="breed_img"  width="300">
                        </div>
                    </div>
                    <div class="form-group anim_desc" hidden>
                        <label for="description" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-9">
                            <textarea type="input" class="form-control" id="description" name="description" style="border: none;height: 20%;" readonly></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weight" class="col-sm-3 control-label">Weight</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="weight" name="weight" maxlength="4" onkeypress="return /[0-9]/i.test(event.key)" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" ><i class="fa fa-check-square-o"></i> Add</button>
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
                <form class="form-horizontal" method="POST" action="./../farmer/farmer_handle.php">
                    <input type="hidden" id="edit_id" name="edit_farmer">
                                        <div class="form-group">
                                               <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                                                <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                                                    </div>
                                           </div>
                                        <div class="form-group">
                                               <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                                                <div class="col-sm-9">
                                                       <input type="text" class="form-control" id="lastname" name="lastname" required>
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
                                                <label for="address" class="col-sm-3 control-label">Home Address</label>

                                                <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="address" name="address" required>
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


<div class="modal fade" id="img" style="height: 400px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
            </div>
            <img class="img-show" height="800">

        </div>
    </div>
</div>


<div class="modal fade" id="maps" style="height: 100%;width: 100%;">
    <div class="modal-dialog" style="height: 100%;width: 100%;">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"style="font-size: -webkit-xxx-large;z-index: 999;position: fixed;color: black" >
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" label="Close" style="color: cadetblue"><b>VIEW TRACKER...</b></h4>
            </div>
                <div id="map"></div>

        </div>
    </div>
</div>


<div class="modal fade" id="anim_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: gray"><b>View Animal</b></h4>
            </div>
            <div class="modal-body" style="display:  inline-grid;font-size: x-large">
                <span class="anim-ser"></span>
                <span class="anim-type"></span>
                <span class="anim-btype"></span>
                <span class="anim-desc"></span>
                <span class="anim-weight"></span>
                <img class="anim-img" width="300">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="anim_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: red"><b>DELETING ...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./../farmer/farmer_handle.php" enctype="multipart/form-data">
                    <input type="hidden" class="anim_delete"  name="anim_delete">
                    <h4><span>Delete Tracker</span></h4>
                    <h5><span class="anim_span"></span></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat" ><i class="fa fa-trash-o"></i> DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>
