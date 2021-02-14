<!-- Add -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Student Details</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./../admin/students_handle.php" enctype="multipart/form-data">
                    <input name="view" hidden>
                    <div class="form-group">
                        <label for="id" class="col-sm-3 control-label">ID Number</label>

                        <div class="col-sm-9">
                            <span type="text" class="form-control" id="id" name="id" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                        <div class="col-sm-9">
                            <span type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                        <div class="col-sm-9">
                            <span type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <span type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="course_name" class="col-sm-3 control-label">Student Course</label>

                        <div class="col-sm-9">
                            <span class="form-control" id="course_name" name="course_name" required>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mark" class="col-sm-3 control-label">Student Mark%</label>

                        <div class="col-sm-9">
                            <span class="form-control" id="mark" name="mark" required>
                            </span>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Add Student-->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="./../admin/students_handle.php" enctype="multipart/form-data">
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
                      <label for="course_name" class="col-sm-3 control-label">Course name</label>

                      <div class="col-sm-9">
                          <select class="form-control" id="course_name" name="course_name" required>
                            <option value="" selected hidden>Select Course Name</option>
                              <?php
                              $conn = $pdo->open();

                              $stmt = $conn->prepare("SELECT * FROM lessor ");
                              $stmt->execute();
                              foreach($stmt as $row){

                                  echo'<option>'.$row['course_name'].'</option>';

                              }
                              $pdo->close();
                              ?>
                          </select>
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
<!--<div class="modal fade" id="edit">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--              <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                  <span aria-hidden="true">&times;</span></button>-->
<!--              <h4 class="modal-title"><b>Edit Student</b></h4>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--              <form class="form-horizontal" method="POST" action="./../admin/students_handle.php">-->
<!--                <input type="hidden" class="userid" name="id">-->
<!--                <div class="form-group">-->
<!--                    <label for="edit_email" class="col-sm-3 control-label">Email</label>-->
<!---->
<!--                    <div class="col-sm-9">-->
<!--                      <input type="email" class="form-control" id="edit_email" name="email">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="edit_password" class="col-sm-3 control-label">Password</label>-->
<!---->
<!--                    <div class="col-sm-9">-->
<!--                      <input type="password" class="form-control" id="edit_password" name="password">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>-->
<!---->
<!--                    <div class="col-sm-9">-->
<!--                      <input type="text" class="form-control" id="edit_firstname" name="firstname" onkeypress="return /[a-z]/i.test(event.key)">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>-->
<!---->
<!--                    <div class="col-sm-9">-->
<!--                      <input type="text" class="form-control" id="edit_lastname" name="lastname" onkeypress="return /[a-z]/i.test(event.key)">-->
<!--                    </div>-->
<!--                </div>-->
<!--                  <div class="form-group">-->
<!--                      <label for="course_name" class="col-sm-3 control-label">Course name</label>-->
<!---->
<!--                      <div class="col-sm-9">-->
<!--                          <select class="form-control" id="course_name" name="course_name" required>-->
<!--                              <option value="" selected hidden>Select Course Name</option>-->
<!--                              -->
//                              $conn = $pdo->open();
//
//                              $stmt = $conn->prepare("SELECT * FROM lessor ");
//                              $stmt->execute();
//                              foreach($stmt as $row){
//
//                                  echo'<option>'.$row['course_name'].'</option>';
//
//                              }
//                              $pdo->close();
//
<!--                          </select>-->
<!--                      </div>-->
<!--                  </div>-->
<!--                  <div class="form-group">-->
<!--                      <label for="mark" class="col-sm-3 control-label">Mark %</label>-->
<!---->
<!--                      <div class="col-sm-9">-->
<!--                          <input type="text" placeholder="Enter Mark Out Of 100 (e.g 55 = 55%)" class="form-control" id="mark" name="mark" onkeypress="return /[0-9]/i.test(event.key)">-->
<!--                      </div>-->
<!--                  </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>-->
<!--              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>-->
<!--              </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



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

<!-- Courses -->
<div class="modal fade" id="courses">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Available Courses...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="./../admin/students_handle.php">
                <input type="hidden" class="course_add" name="course_add">
                <div class="text-center">
                    <button class="btn-secondary add-course">Add New Course <i class="fa fa-plus"></i></button><br/><br/>
                    <?php
                    $conn = $pdo->open();

                    $stmt = $conn->prepare("SELECT * FROM course ");
                    $stmt->execute();

                    if($stmt->rowCount() > 0) {

                        echo' 
                                    <table>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Fees</th>
                                        </tr>
                                        <tr>';
                        foreach ($stmt as $row) {

                            echo '
                                <td>' . $row['course_name'] . '</td>
                                 <td>' . $row['fee'] . '</td>
                                </tr>';
                        }
                        echo '</table>';
                        $pdo->close();
                    }else{
                        echo '<h3>No Course Found ...</h3>' ;
                    }
                    ?>
                    <span class="input-course"></span>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat add-btn" disabled><i class="fa fa-check"></i> ADD</button>
              </form>
            </div>
        </div>
    </div>
</div> 


     