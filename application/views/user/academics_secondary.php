
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.top-container {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

.header {
  padding: 10px ;
  background: #000;
  color: #f1f1f1;
  height: 58px;
}

.content1 {
  padding: 16px;
  margin-left: 10px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 85%;
}

.sticky + .content1 {
  padding-top: 40px;
}

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  margin-left: 0px;
  margin-right: 0px;
}
.tab2 {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  margin-left: 40px;
  margin-right: 40px;
}

/* Style the buttons inside the tab */
.tab a {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}
/* Change background color of buttons on hover */
.tab a:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab a.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  margin-left: 1px;
  margin-right: 20px;
}
#body table
{
 margin:0 auto;
 position:relative;
 bottom:50px;
}
table td,th
{
 padding:20px;
 border: solid #9fa8b0 1px;
 border-collapse:collapse;
}

.btn-upload{
  color: #fff;
  height: 40px;
  background-color: green;
}

select{
  height: 40px;
  width: 250px;
  margin-right: 10px;
  background-color: #f2f2f2
}

</style>

<div class="header" id="myHeader">
  <!-- <h4 style="margin-left: 20px; float: right; margin-right: 20px">
  	<?= $this->session->userdata('USER_NAME') ?>
  </h4> -->
  <div style="float: right; margin-right: 25px; padding-bottom: 10px">
  	<?php 
  	if (!empty($this->session->userdata('USER_ID')) && $this->session->userdata('USER_ID') > 0) { ?>
            
            <a href="<?= base_url('User/Panel') ?>" class="btn btn-primary my-2 my-sm-0">Admin [ <?= $this->session->userdata('USER_NAME') ?> ]</a> &nbsp;

            <a href="<?= base_url('User/logout') ?>" class="btn btn-danger my-2 my-sm-0">Logout</a>
            <?php }  ?>
  </div>
</div>

<div class="content1">
  <h3>Academics/ Secondary</h3>
  
  <div class="tab" style="margin-right: 2%">
  <a class="tablinks" onclick="openCity(event, 'curriculum')"><i class="glyphicon glyphicon-book"></i> Curriculum</a>
  <a class="tablinks" onclick="openCity(event, 'schemsofwork')"><i class="glyphicon glyphicon-menu-hamburger"></i> Schems of work</a>
  <a class="tablinks" onclick="openCity(event, 'lessonplans')"><i class="glyphicon glyphicon-list-alt"></i> Lesson Plans</a>
  <a class="tablinks" onclick="openCity(event, 'notes')"><i class="glyphicon glyphicon-duplicate"></i> Notes</a>
  <a class="tablinks" onclick="openCity(event, 'exercise')"><i class="fa fa-book"></i> Exercises</a>
  <a class="tablinks" onclick="openCity(event, 'tests')"><i class="fa fa-pencil-square-o"></i> Tests</a>
  <a class="tablinks" onclick="openCity(event, 'exams')"><i class="glyphicon glyphicon-pencil"></i> Exams</a>
  <a class="tablinks" onclick="openCity(event, 'seminars')"><i class="fa fa-users"></i> Quiz</a>
</div>

<!--start curriculum -->
<div id="curriculum" class="tabcontent">
    <div class="container">
      <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 18%">
        <li><a data-toggle="tab" href="#"></a></li>
        <li class="active"><a data-toggle="tab" href="#senior1">Senior One (S.1)</a></li>
        <li><a data-toggle="tab" href="#senior2">Senior Two (S.2)</a></li>
        <li><a data-toggle="tab" href="#senior3">Senior Three (S.3)</a></li>
        <li><a data-toggle="tab" href="#senior4">Senior Four (S.4)</a></li>
        <li><a data-toggle="tab" href="#senior5">Senior Five (S.5)</a></li>
        <li><a data-toggle="tab" href="#senior6">Senior Six (S.6)</a></li>
      </ul><br>

      <div class="tab-content">
        <div id="curriculum1" class="tab-pane fade in active">
          <!-- start curriculum1-->
          
          <!-- end curriculum1 -->
          
        </div>
        <div id="senior1" class="tab-pane fade in active">
               <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-upload" class="btn-upload">Upload Curriculum</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-upload']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/curriculum/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO curriculum(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior one','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM curriculum WHERE level = 'Senior one' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/curriculum/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
               <!-- end curriculum1 -->
          
              </div>
              <div id="senior2" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-upload1" class="btn-upload">Upload Curriculum</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-upload1']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/curriculum/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO curriculum(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior two','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM curriculum WHERE level = 'Senior two' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/curriculum/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.2 -->
              </div>
              <div id="senior3" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-upload2" class="btn-upload">Upload Curriculum</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-upload2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/curriculum/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO curriculum(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior three','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM curriculum WHERE level = 'Senior three' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/curriculum/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.3 -->
              </div>
              <div id="senior4" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-upload3" class="btn-upload">Upload Curriculum</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-upload3']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/curriculum/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO curriculum(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior four','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM curriculum WHERE level = 'Senior four' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/curriculum/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.4 -->
              </div>
              <div id="senior5" class="tab-pane fade">
                <div>
                  <!-- display -->
                <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-upload4" class="btn-upload">Upload Curriculum</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-upload4']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/curriculum/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO curriculum(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM curriculum WHERE level = 'Senior five' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/curriculum/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.5 -->
              </div>
              <div id="senior6" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-upload5" class="btn-upload">Upload Curriculum</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-upload5']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/curriculum/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO curriculum(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior six','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM curriculum WHERE level = 'Senior six' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/curriculum/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.6 -->
              </div>
            </div>
          </div>
    </div>
<!--end curriculum -->

<!--start schemsofwork -->
<div id="schemsofwork" class="tabcontent">
    <div class="container">
      <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 18%">
        <li><a data-toggle="tab" href="#"></a></li>
        <li class="active"><a data-toggle="tab" href="#schems_senior1">Senior One (S.1)</a></li>
        <li><a data-toggle="tab" href="#schems_senior2">Senior Two (S.2)</a></li>
        <li><a data-toggle="tab" href="#schems_senior3">Senior Three (S.3)</a></li>
        <li><a data-toggle="tab" href="#schems_senior4">Senior Four (S.4)</a></li>
        <li><a data-toggle="tab" href="#schems_senior5">Senior Five (S.5)</a></li>
        <li><a data-toggle="tab" href="#schems_senior6">Senior Six (S.6)</a></li>
      </ul><br>

      <div class="tab-content">
        
        <div id="schems_senior1" class="tab-pane fade in active">
               <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadSchems" class="btn-upload">Upload Schems of work</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadSchems']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/schemsofwork/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO schemsofwork(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior one','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM schemsofwork WHERE level = 'Senior one' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/schemsofwork/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
               <!-- end curriculum1 -->
          
              </div>
              <div id="schems_senior2" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadSchems1" class="btn-upload">Upload Schems of work</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadSchems1']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/schemsofwork/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO schemsofwork(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior two','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM schemsofwork WHERE level = 'Senior two' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/schemsofwork/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.2 -->
              </div>
            </div>
              <div id="schems_senior3" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadSchems2" class="btn-upload">Upload Schems of work</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadSchems2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/schemsofwork/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO schemsofwork(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior three','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM schemsofwork WHERE level = 'Senior three' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/schemsofwork/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.3 -->
              </div>
            </div>
              <div id="schems_senior4" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadSchems3" class="btn-upload">Upload Schems of work</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadSchems3']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/schemsofwork/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO schemsofwork(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior four','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>
                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM schemsofwork WHERE level = 'Senior four' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/schemsofwork/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.4 -->
              </div>
            </div>
              <div id="schems_senior5" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadSchems4" class="btn-upload">Upload Schems of work</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadSchems4']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/schemsofwork/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO schemsofwork(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM schemsofwork WHERE level = 'Senior five' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/schemsofwork/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.5 -->
              </div>
            </div>
              <div id="schems_senior6" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadSchems5" class="btn-upload">Upload Schems of work</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadSchems5']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/schemsofwork/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO schemsofwork(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior six','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM schemsofwork WHERE level = 'Senior six' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/schemsofwork/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.6 -->
              </div>
            </div>
          </div>
    </div>
  </div>

    <!--start lessonplans -->
<div id="lessonplans" class="tabcontent">
    <div class="container">
      <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 18%">
        <li><a data-toggle="tab" href="#"></a></li>
        <li class="active"><a data-toggle="tab" href="#lessons_senior1">Senior One (S.1)</a></li>
        <li><a data-toggle="tab" href="#lessons_senior2">Senior Two (S.2)</a></li>
        <li><a data-toggle="tab" href="#lessons_senior3">Senior Three (S.3)</a></li>
        <li><a data-toggle="tab" href="#lessons_senior4">Senior Four (S.4)</a></li>
        <li><a data-toggle="tab" href="#lessons_senior5">Senior Five (S.5)</a></li>
        <li><a data-toggle="tab" href="#lessons_senior6">Senior Six (S.6)</a></li>
      </ul><br>

      <div class="tab-content">
        
        <div id="lessons_senior1" class="tab-pane fade in active">
          <div>
               <!-- start curriculum1-->
            <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadLesson" class="btn-upload">Upload Lesson plans</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadLesson']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/lesson_plans/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO lessonplans(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior one','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM lessonplans WHERE level = 'Senior one' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/lesson_plans/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
               <!-- end curriculum1 -->
              </div>
              </div>
              <div id="lessons_senior2" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadLesson1" class="btn-upload">Upload Lesson plans</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadLesson1']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/lesson_plans/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO lessonplans(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior two','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM lessonplans WHERE level = 'Senior two' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/lesson_plans/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.2 -->
              </div>
              </div>
              <div id="lessons_senior3" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadLesson2" class="btn-upload">Upload Lesson plans</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadLesson2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/lesson_plans/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO lessonplans(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior three','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM lessonplans WHERE level = 'Senior three' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/lesson_plans/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
                <!-- end S.3 -->
              </div>
              </div>
              <div id="lessons_senior4" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadLesson3" class="btn-upload">Upload Lesson plans</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadLesson3']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/lesson_plans/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO lessonplans(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior four','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM lessonplans WHERE level = 'Senior four' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/lesson_plans/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
                <!-- end S.4 -->
              </div>
              </div>
              <div id="lessons_senior5" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadLesson4" class="btn-upload">Upload Lesson plans</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadLesson4']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/lesson_plans/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO lessonplans(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM lessonplans WHERE level = 'Senior five' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/lesson_plans/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
                <!-- end S.5 -->
              </div>
            </div>
            <!--start s.6-->
            <div id="lessons_senior6" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadLesson5" class="btn-upload">Upload Lesson plans</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadLesson5']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/lesson_plans/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO lessonplans(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>


                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM lessonplans WHERE level = 'Senior six' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/lesson_plans/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
                <!-- end S.6 -->
              </div>
            </div>
          </div>
    </div>
  </div>
<!--start notes -->
<div id="notes" class="tabcontent">
  
  <div class="container">
      <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 18%">
        <li><a data-toggle="tab" href="#"></a></li>
        <li class="active"><a data-toggle="tab" href="#notes_senior1">Senior One (S.1)</a></li>
        <li><a data-toggle="tab" href="#notes_senior2">Senior Two (S.2)</a></li>
        <li><a data-toggle="tab" href="#notes_senior3">Senior Three (S.3)</a></li>
        <li><a data-toggle="tab" href="#notes_senior4">Senior Four (S.4)</a></li>
        <li><a data-toggle="tab" href="#notes_senior5">Senior Five (S.5)</a></li>
        <li><a data-toggle="tab" href="#notes_senior6">Senior Six (S.6)</a></li>
      </ul><br>

      <div class="tab-content">
        
        <div id="notes_senior1" class="tab-pane fade in active">
          <div>
               <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadNotes" class="btn-upload">Upload Notes</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadNotes']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/notes/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO notes(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior one','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM notes WHERE level = 'Senior one' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/notes/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
               <!-- end curriculum1 -->
              </div>
              </div>
              <div id="notes_senior2" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadNotes1" class="btn-upload">Upload Notes</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadNotes1']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/notes/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO notes(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior two','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM notes WHERE level = 'Senior two' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/notes/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
                <!-- end S.2-->
              </div>
              </div>
              <div id="notes_senior3" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadNotes2" class="btn-upload">Upload Notes</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadNotes2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/notes/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO notes(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior three','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM notes WHERE level = 'Senior three' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/notes/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.3 -->
              </div>
              <div id="notes_senior4" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadNotes3" class="btn-upload">Upload Notes</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadNotes3']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/notes/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO notes(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior four','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM notes WHERE level = 'Senior four' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/notes/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.4 -->
              </div>
              <div id="notes_senior5" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadNotes4" class="btn-upload">Upload Notes</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadNotes4']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/notes/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO notes(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM notes WHERE level = 'Senior five' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/notes/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
                <!-- end S.6 -->
              </div>
            </div>
            <div id="notes_senior6" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadNotes5" class="btn-upload">Upload Notes</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadNotes5']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/notes/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO notes(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior six','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM notes WHERE level = 'Senior six' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/notes/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
                <!-- end S.6 -->
              </div>
            </div>
          </div>
        </div>
</div>
<!--end notes -->
<!--start exercise -->
<div id="exercise" class="tabcontent">
  
  <div class="container">
      <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 18%">
        <li><a data-toggle="tab" href="#"></a></li>
        <li class="active"><a data-toggle="tab" href="#exercise_senior1">Senior One (S.1)</a></li>
        <li><a data-toggle="tab" href="#exercise_senior2">Senior Two (S.2)</a></li>
        <li><a data-toggle="tab" href="#exercise_senior3">Senior Three (S.3)</a></li>
        <li><a data-toggle="tab" href="#exercise_senior4">Senior Four (S.4)</a></li>
        <li><a data-toggle="tab" href="#exercise_senior5">Senior Five (S.5)</a></li>
        <li><a data-toggle="tab" href="#exercise_senior6">Senior Six (S.6)</a></li>
      </ul><br>

      <div class="tab-content">
        
        <div id="exercise_senior1" class="tab-pane fade in active">
          <div>
               <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExercise" class="btn-upload">Upload Exercises</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExercise']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exercises/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exercises(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior one','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exercises WHERE level = 'Senior one' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exercises/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
              </div>
               <!-- end curriculum1 -->
          
              </div>
              <div id="exercise_senior2" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Economics">Economics</option>
                    <option value="Divinity">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExercise1" class="btn-upload">Upload Exercises</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExercise1']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exercises/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exercises(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior two','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exercises WHERE level = 'Senior two' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exercises/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
              </div>
                <!-- end S.2 -->
              </div>
              <div id="exercise_senior3" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Economics">Economics</option>
                    <option value="Divinity">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExercise2" class="btn-upload">Upload Exercises</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExercise2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exercises/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exercises(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior three','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exercises WHERE level = 'Senior three' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exercises/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>

                </div>
              </div>
                <!-- end S.3 -->
              </div>
              <div id="exercise_senior4" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Economics">Economics</option>
                    <option value="Divinity">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExercise3" class="btn-upload">Upload Exercises</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExercise3']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exercises/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exercises(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior four','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exercises WHERE level = 'Senior four' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exercises/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.4 -->
              </div>
              <div id="exercise_senior5" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Economics">Economics</option>
                    <option value="Divinity">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExercise4" class="btn-upload">Upload Exercises</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExercise4']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exercises/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exercises(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exercises WHERE level = 'Senior five' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exercises/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.5 -->
              </div>
              <div id="exercise_senior6" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Economics">Economics</option>
                    <option value="Divinity">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExercise5" class="btn-upload">Upload Exercises</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExercise5']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exercises/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exercises(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior six','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exercises WHERE level = 'Senior six' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exercises/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.6 -->
              </div>
            </div>
          </div>
</div>
<!--end exercise -->
<!--start tests -->
<div id="tests" class="tabcontent">
  
  <div class="container">
      <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 18%">
        <li><a data-toggle="tab" href="#"></a></li>
        <li class="active"><a data-toggle="tab" href="#tests_senior1">Senior One (S.1)</a></li>
        <li><a data-toggle="tab" href="#tests_senior2">Senior Two (S.2)</a></li>
        <li><a data-toggle="tab" href="#tests_senior3">Senior Three (S.3)</a></li>
        <li><a data-toggle="tab" href="#tests_senior4">Senior Four (S.4)</a></li>
        <li><a data-toggle="tab" href="#tests_senior5">Senior Five (S.5)</a></li>
        <li><a data-toggle="tab" href="#tests_senior6">Senior Six (S.6)</a></li>
      </ul><br>

      <div class="tab-content">
        
        <div id="tests_senior1" class="tab-pane fade in active">
          <div>
               <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadTests" class="btn-upload">Upload Tests</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadTests']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/tests/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO tests(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior one','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM tests WHERE level = 'Senior one' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/tests/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
               <!-- end curriculum1 -->
          
              </div>
              <div id="tests_senior2" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadTests1" class="btn-upload">Upload Tests</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadTests2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/tests/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO tests(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior two','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM tests WHERE level = 'Senior two' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/tests/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
                </div>
                <!-- end S.2 -->
              </div>
              <div id="tests_senior3" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadTests2" class="btn-upload">Upload Tests</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadTests2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/tests/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO tests(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior three','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM tests WHERE level = 'Senior three' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/tests/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.3 -->
              </div>
              <div id="tests_senior4" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadTests3" class="btn-upload">Upload Tests</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadTests3']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/tests/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO tests(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior four','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM tests WHERE level = 'Senior four' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/tests/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.4 -->
              </div>
              <div id="tests_senior5" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadTests4" class="btn-upload">Upload Tests</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadTests4']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/tests/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO tests(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM tests WHERE level = 'Senior five' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/tests/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.5 -->
              </div>
              <div id="tests_senior6" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadTests5" class="btn-upload">Upload Tests</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadTests5']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/tests/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO tests(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior six','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM tests WHERE level = 'Senior six' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/tests/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.6 -->
              </div>
            </div>
          </div>
</div>
<!--end tests -->
<!--start exam and quiz -->
<div id="exams" class="tabcontent">
  
  <div class="container">
      <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 18%">
        <li><a data-toggle="tab" href="#"></a></li>
        <li class="active"><a data-toggle="tab" href="#exams_senior1">Senior One (S.1)</a></li>
        <li><a data-toggle="tab" href="#exams_senior2">Senior Two (S.2)</a></li>
        <li><a data-toggle="tab" href="#exams_senior3">Senior Three (S.3)</a></li>
        <li><a data-toggle="tab" href="#exams_senior4">Senior Four (S.4)</a></li>
        <li><a data-toggle="tab" href="#exams_senior5">Senior Five (S.5)</a></li>
        <li><a data-toggle="tab" href="#exams_senior6">Senior Six (S.6)</a></li>
      </ul><br>

      <div class="tab-content">
        
        <div id="exams_senior1" class="tab-pane fade in active">
          <div>
               <!-- start curriculum1-->
               <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExams" class="btn-upload">Upload Exams</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExams']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exams/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exams(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior one','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exams WHERE level = 'Senior one' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exams/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
               <!-- end curriculum1 -->
          
              </div>
              <div id="exams_senior2" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExams1" class="btn-upload">Upload Exams</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExams1']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exams/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exams(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior two','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exams WHERE level = 'Senior two' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exams/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.2 -->
              </div>
              <div id="exams_senior3" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExams2" class="btn-upload">Upload Exams</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExams2']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exams/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exams(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior three','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exams WHERE level = 'Senior three' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exams/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.3 -->
              </div>
              <div id="exams_senior4" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExams3" class="btn-upload">Upload Exams</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExams3']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exams/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exams(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior four','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exams WHERE level = 'Senior four' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exams/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.4 -->
              </div>
              <div id="exams_senior5" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExams4" class="btn-upload">Upload Exams</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExams4']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exams/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exams(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior five','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exams WHERE level = 'Senior five' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exams/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.5 -->
              </div>
              <div id="exams_senior6" class="tab-pane fade">
                <div>
                  <!-- display -->
                  <form action="Panel?oneline=academics_secondary" method="post" enctype="multipart/form-data">
                  <label>Select Pdf only</label>
                  <input type="file" name="file" /><br>
                  <select name="subject">
                    <option value="">Select Subject</option>
                    <option value=""></option>
                    <option value="Mathmatics">Mathmatics</option>
                    <option value="Physcis">Physcis</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Literature">Economics</option>
                    <option value="Literature">Divinity</option>
                    <option value="Literature">Literature</option>
                  </select>
                  <button type="submit" name="btn-uploadExams5" class="btn-upload">Upload Exams</button>
                </form>

                <!-- post pdf -->
                <?php
                  $created = "".date("Y/m/d")."";

                  if(isset($_POST['btn-uploadExams5']))
                  {    

                    include 'dbconnection.php';
                    
                    //$file = rand(1000,100000)."-".$_FILES['file']['name'];
                    $file = $_FILES['file']['name'];
                    $file_loc = $_FILES['file']['tmp_name'];
                    $file_size = $_FILES['file']['size'];
                    $file_type = $_FILES['file']['type'];
                    $subject = $_POST['subject'];
                    $folder="assets/academics/exams/";
 
                    move_uploaded_file($file_loc,$folder.$file);
                    $sql="INSERT INTO exams(file,subject,type,size,level,created) VALUES('$file','$subject','$file_type','$file_size','Senior six','$created')";

                    mysqli_query($db, $sql); 
                  }
                ?>

                <div>
                  <!-- display -->
                  <br>
                  <table width="82%" border="1" class="table-bordered table-striped">
                    <tr style="font-size: 18px;">
                      <td>Subject Name (Curriculum)</td>
                      <td>File Type</td>
                      <td>File Size(KB)</td>
                      <td>Uploaded</td>
                      <td>View</td>
                    </tr>

                  <?php

                    include 'dbconnection.php';
                    
                    $sql="SELECT * FROM exams WHERE level = 'Senior six' ORDER BY id DESC";

                    $result = $db->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      ?>
                        <tr>
                          <td><?php echo $row['subject'] ?></td>
                          <td><?php echo $row['file'] ?></td>
                          <td><?php echo $row['size'] ?></td>
                          <td><?php echo $row['created'] ?></td>
                          <td><a href="<?=base_url()?>assets/academics/exams/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                        </tr>
                      <?php
                    }
                  ?>
                  </table>
                </div>
              </div>
                <!-- end S.6 -->
              </div>
            </div>
          </div>
</div>
</div>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<script>
function openCity2(evt, cityName) {
  var i, tabcontent2, tablinks2;
  tabcontent2 = document.getElementsByClassName("tabcontent2");
  for (i = 0; i < tabcontent2.length; i++) {
    tabcontent2[i].style.display = "none";
  }
  tablinks2 = document.getElementsByClassName("tablinks2");
  for (i = 0; i < tablinks2.length; i++) {
    tablinks2[i].className = tablinks2[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<script>
function openForm0() {
  document.getElementById("myForm0").style.display = "block";
}

function closeForm0() {
  document.getElementById("myForm0").style.display = "none";
}
</script>

<!-- jQuery library -->
  <!-- <script src="<?=base_url()?>assets/js/jquery.min.js"></script> -->  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- <script src="<?=base_url()?>assets/js/bootstrap.js"></script> -->   
  <!-- Slick slider -->
  <!-- <script type="text/javascript" src="<?=base_url()?>assets/js/slick.js"></script> -->
  <!-- Counter -->
  <!-- <script type="text/javascript" src="<?=base_url()?>assets/js/waypoints.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.counterup.js"></script> -->  
  <!-- Mixit slider -->
  <!-- <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.mixitup.js"></script> -->
  <!-- Add fancyBox -->        
  <!-- <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.fancybox.pack.js"></script> -->