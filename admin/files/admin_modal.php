<!-- Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="./../admin/admin_handle.php" enctype="multipart/form-data">
                <input name="addnew" hidden>
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
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
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
              <h4 class="modal-title"><b>Edit Student</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="./../admin/students_handle.php">
                <input type="hidden" id="edit_id" name="edit_id">
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
                  <div class="form-group">
                      <label for="course_name" class="col-sm-3 control-label">Course name</label>

                      <div class="col-sm-9">
                          <select class="form-control" id="course_name" name="course_name" required>
                              <option value="" selected hidden>Select Course Name</option>
<!--                              --><?php
//                              $conn = $pdo->open();
//
//                              $stmt = $conn->prepare("SELECT * FROM course ");
//                              $stmt->execute();
//                              foreach($stmt as $row){
//
//                                  echo'<option>'.$row['course_name'].'</option>';
//
//                              }
//                              $pdo->close();
//                              ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="mark" class="col-sm-3 control-label">Mark %</label>

                      <div class="col-sm-9">
                          <input type="text" placeholder="Enter Mark Out Of 100 (e.g 55 = 55%)" class="form-control" id="mark" name="mark" onkeypress="return /[0-9]/i.test(event.key)">
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

<!-- Deklete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>DELETING ...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./../admin/admin_handle.php" enctype="multipart/form-data">
                    <input type="hidden" id="id_delete" name="id_delete">
                    <h4>Delete User: <span class="fullname"></span></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat" name="upload"><i class="fa fa-trash-o"></i> DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 



<!-- Update Materials -->
<div class="modal fade" id="materials">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="">MATERIALS</span></b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="./../admin/students_handle.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tool" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter Material Description" class="form-control" name="tool" required>
                        </div><span style="padding-top: 5px"></span>

                        <label for="file" class="col-sm-3 control-label">File</label>

                        <div class="col-sm-9">
                            <input type="file" id="photo" name="file" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Announcements -->
<div class="modal fade" id="announcements">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="">ANNOUNCEMENTS</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./../admin/students_handle.php" enctype="multipart/form-data">
                    <input type="hidden" class="userid" name="announce">
                    <div class="form-group">


                        <textarea style="width: 90%;height: 20%" name="news" placeholder="Type In Announcements"></textarea>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Post</button>
                </form>
            </div>
        </div>
    </div>
</div>


     