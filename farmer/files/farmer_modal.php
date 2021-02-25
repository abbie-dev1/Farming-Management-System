<!-- Add -->
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




<div class="modal fade" id="payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title"><b>Secure Payment <i class="fa fa-lock"></i></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./search.php">

                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="from" class="col-sm-3 control-label">From</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="from" name="from"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="to" class="col-sm-3 control-label">To</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="to" name="to" required>
                        </div>
                    </div>

                 
                   <input type="hidden" class="form-control" id="type_id" name="type_id">
                    

                    <div class="form-group">
                        <label for="number" class="col-sm-3 control-label">Card Number</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="number" name="number" maxlength="8" onkeypress="return /[0-9]/i.test(event.key);" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="holder" class="col-sm-3 control-label">Account Holder</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="holder" name="holder" onkeypress="return /[a-z]/i.test(event.key)" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valid" class="col-sm-3 control-label">Valid Until</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="valid" name="valid" onkeypress="return /[a-z]/i.test(event.key)" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cvv" class="col-sm-3 control-label">CVV</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3" onkeypress="return /[0-9]/i.test(event.key);" required>
                        </div>
                    </div>

                    <span class="price" style="color: red"></span>
                    <input type="hidden" class="form-control" name="price">
                    <!-- <input type="hidden" class="form-control" name="space_type"> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="paynow"><i class="fa fa-check-square-o"></i> Pay Now</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"style="font-size: -webkit-xxx-large;z-index: 999;position: fixed" >
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