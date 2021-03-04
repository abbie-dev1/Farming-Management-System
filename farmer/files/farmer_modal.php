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
                    <label for="type" class="col-sm-3 control-label">Type</label>

                    <div class="col-sm-9">
                        <select name="animal_type" class="form-control" required>
                            <option value="" disabled selected>Select Animal Type ...</option>
                            <option value="Cow">Cow</option>
                            <option value="Goat">Goat</option>
                            <option value="Chicken">Chicken</option>
                            <option value="Horse">Horse</option>
                        </select>
                    </div>
                </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>
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
              <h4 class="modal-title"><b>Edit Lessor</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="./../lessor/students_handle.php">
                <input type="hidden" class="userid" name="userid">
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" onkeypress="return /[a-z]/i.test(event.key)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" onkeypress="return /[a-z]/i.test(event.key)">
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



<div class="modal fade" id="amin_delete">
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
