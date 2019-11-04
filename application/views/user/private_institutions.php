<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.top-container {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
}

.header {
  padding: 10px ;
  background: #000;
  color: #f1f1f1;
  height: 58px;
}

.content {
  padding: 16px;
  margin-left: 15px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 85%;
}

.sticky + .content {
  padding-top: 60px;
}

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  margin: 20px;
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
  margin-left: 20px;
  margin-right: 20px;
}
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}
.topnav .search-container {
  float: right;
  margin-right: 100px;
}
.topnav .search-container button:hover {
  background: #ccc;
}
.topnav a {
  float: left;
  display: block;
  color: blue;
  text-align: center;
  padding: 14px 18px;
  text-decoration: none;
  font-size: 17px;
}
.topnav input[type=text] {
  padding: 6px;
  margin: 5px;
  font-size: 17px;
  border-color: #e9e9e9;
}
/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: ;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 100px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=text] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
#img_div{
  width: 100%;
  padding: 5px;
  margin: 15px auto;
  
  border: 1px solid #cbcbcb;
  -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    -webkit-column-width: 20%;
    -moz-column-width: 20%;
    column-width: 20%;
}
#img_div:after{
  content: "";
  display: block;
  clear: both;
}
#img{
  float: right;
  margin: 5px;
  width: 50px;
  height: 50px;
}
.gallery {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
-webkit-column-width: 23%;
-moz-column-width: 23%;
column-width: 23%;
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1); 
}

table{
  width: 90%;
}
th {
  height: 20px;
  font-size: 18px;
}
tr:nth-child(even){
  background-color: #f2f2f2
}

table, th, td {
  border: 2px solid black;
  padding: 15px;
  text-align: left;
  font-size: 18;
}
input {
  height: 40px;
}
select{
  height: 40px;
  width: 275px;
  background-color: #f2f2f2
}

</style>


<!-- <div class="top-container">
  <h1>Scroll Down</h1>
  <p>Scroll down to see the sticky effect.</p>
</div> -->

<div class="header" id="myHeader">
  <!-- <h4 style="margin-left: 20px; float: right; margin-right: 20px">
  	<?= $this->session->userdata('USER_NAME') ?>
  </h4> -->
  <div style="float: right; margin-right: 25px; padding-bottom: 10px">
  	<?php 
  	if (!empty($this->session->userdata('USER_ID')) && $this->session->userdata('USER_ID') > 0) { ?>
            <!-- <a style="background-color: green" class="btn btn-primary my-2 my-sm-0" onclick="openForm0()"><i class="glyphicon glyphicon-plus-sign"></i> Subscrib New Institutions</a> &nbsp; -->

            <a style="background-color: green" class="btn btn-primary my-2 my-sm-0" onclick="openForm5()"><i class="glyphicon glyphicon-plus-sign"></i> Add Non subscribed Institutions</a> &nbsp;

            <a href="<?= base_url('User/Panel') ?>" class="btn btn-primary my-2 my-sm-0">Admin [ <?= $this->session->userdata('USER_NAME') ?> ]</a> &nbsp;

            <a href="<?= base_url('User/logout') ?>" class="btn btn-danger my-2 my-sm-0">Logout</a>
            <?php }  ?>
  </div>
</div>

<div class="content">
  <h3>Learning Institutions/ Private</h3>
  <hr/>
  <?php

    $msg = "";
    // if upload button is clicked
    if (isset($_POST['uploadNon'])) {
    //connect to db
    include 'dbconnection.php';

    $school_level = $_POST['school_level'];
    $name = $_POST['school_name'];
    $district = $_POST['district'];
    $county = $_POST['county'];
    $subCounty = $_POST['sub_county'];
        
    $sql = "INSERT INTO learning_institutions (badge_img, school_name, district, county, sub_county, school_level, status, institution, contact) VALUES ('', '$name', '$district', '$county', '$subCounty', '$school_level', 'not subscribed', 'private', '')";

    if (mysqli_query($db, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    $db->close();
    }
  ?>

  <div class="container" style="margin: 10px">
    <ul class="nav nav-tabs" style="background-color: #f1f1f1;margin-right: 15%">
      <li><a data-toggle="tab" href="#"></a></li>
      <li class="active"><a data-toggle="tab" href="#subscribed">Subscribed Institutions</a></li>
      <li><a data-toggle="tab" href="#unsubscribed">Non subscribed Institutions</a></li>
        <!-- <li><a data-toggle="tab" href="#menu2">Lesson Plans</a></li>
          <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
    </ul>

    <div class="tab-content" style="margin-right: 15%">
        <div id="subscribed" class="tab-pane fade in active">
          <!---- start Subscribed --->
            <div class="tab">
               <a class="tablinks" onclick="openCity(event, 'kindergarten')"><i class="glyphicon glyphicon-book"></i> Kindergarten</a>
               <a class="tablinks" onclick="openCity(event, 'primary')"><i class="glyphicon glyphicon-book"></i> Primary</a>
               <a class="tablinks" onclick="openCity(event, 'secondary')"><i class="glyphicon glyphicon-duplicate"></i> Seconday</a>
               <a class="tablinks" onclick="openCity(event, 'colleges')"><i class="fa fa-book"></i> Colleges</a>
               <a class="tablinks" onclick="openCity(event, 'universties')"><i class="fa fa-pencil-square-o"></i> Universities</a>
               <a class="tablinks" onclick="openCity(event, 'others')"><i class="glyphicon glyphicon-pencil"></i> Other institutions</a>
            </div>

            <!--start kindergarten -->
            <div id="kindergarten" class="tabcontent">
                <div class="topnav">
                  <!-- <a class="open-button" onclick="openForm0()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a> -->

                  <div class="search-container">
                    <form action="/action_page.php">
                      <input type="text" placeholder="Search.." name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
                </div><hr>
                <div>
                  <?php

                    $msg = "";
                    // if upload button is clicked
                    if (isset($_POST['upload0'])) {
                    // the path to store the uploaded images
                    $target = "assets/badge_imgs/".basename($_FILES['badge_img']['name']);

                    //connect to db
                    include 'dbconnection.php';

                    //Get all data uploaded
                    $image = $_FILES['badge_img']['name'];
                    $school_level = $_POST['school_level'];
                    $name = $_POST['school_name'];
                    $district = $_POST['district'];
                    $county = $_POST['county'];
                    $subCounty = $_POST['sub_county'];
                    // $parish = $_POST['parish'];
                    // $village = $_POST['village'];

                    $ServerURL = "http://localhost/webapps/onelineducater/$target";
                    //$ServerURL = "https://onelineducater.com/on/$target";

                    $sql = "INSERT INTO learning_institutions (badge_img, school_name, district, county, sub_county, school_level, status, institution) VALUES ('$ServerURL', '$name', '$district', '$county', '$subCounty', '$school_level', 'subscribed', 'private')";

                    if (mysqli_query($db, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                    }

                    //saving badge to target folder
                    if (move_uploaded_file($_FILES['badge_img']['tmp_name'], $target)) {
      
                        $msg = "Image uploaded successfully";
                        //echo $msg;

                    }else{

                        $msg = "Something went wrong on upload";
                        echo $msg;
                    }

                       $db->close();
                    }
                    ?>

                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px;">
                            <th>Badge</th>
                            <th>School Name [ Kindergarten ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'Kindergarten' AND status = 'subscribed' AND institution = 'private'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start primary -->
            <div id="primary" class="tabcontent">
                <div class="topnav">
                  <!-- <a class="open-button" onclick="openForm1()"><i class="glyphicon glyphicon-plus-sign"></i> Add New School</a> -->

                  <div class="search-container">
                    <form action="/action_page.php">
                      <input type="text" placeholder="Search.." name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
                </div><hr>
                <div>
                  <?php

                    $msg = "";
                    // if upload button is clicked
                    if (isset($_POST['upload1'])) {
                    // the path to store the uploaded images
                    $target = "assets/badge_imgs/".basename($_FILES['badge_img']['name']);

                    //connect to db
                    include 'dbconnection.php';

                    //Get all data uploaded
                    $image = $_FILES['badge_img']['name'];
                    $name = $_POST['school_name'];
                    $district = $_POST['district'];
                    $county = $_POST['county'];
                    $subCounty = $_POST['sub_county'];
                    $contact = $_POST['contact'];
                    // $village = $_POST['village'];

                    //$ServerURL = "http://localhost/webapps/onelineducater/$target";
                    $ServerURL = "https://onelineducater.com/on/$target";

                    $sql = "INSERT INTO learning_institutions (badge_img, school_name, district, county, sub_county, school_level, status, institution, contact) VALUES ('$ServerURL', '$name', '$district', '$county', '$subCounty', 'primary', 'subscribed', 'public', '$contact')";

                    if (mysqli_query($db, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                    }

                    //saving badge to target folder
                    if (move_uploaded_file($_FILES['badge_img']['tmp_name'], $target)) {
      
                        //$msg = "Image uploaded successfully";
                        echo $msg;

                    }else{

                        $msg = "Something went wrong on upload";
                        echo $msg;
                    }

                       $db->close();
                    }
                    ?>

                </div>
                <div></div>

                 <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <th>Badge</th>
                            <th>School Name [ Primay ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                            <th>Contact</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'primary' AND status = 'subscribed' AND institution = 'private'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>
                                            <td style="padding-top: 20px"> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                            <td> <?php echo $row['contact']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>  
            </div>

            <!--start secondary -->
            <div id="secondary" class="tabcontent">
                <div class="topnav">
                  <!-- <a class="open-button" onclick="openForm2()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a> -->

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr>
                <div>
                  <?php

                    $msg = "";
                    // if upload button is clicked
                    if (isset($_POST['upload2'])) {
                    // the path to store the uploaded images
                    $target = "assets/badge_imgs/".basename($_FILES['badge_img']['name']);

                    //connect to db
                    include 'dbconnection.php';

                    //Get all data uploaded
                    $image = $_FILES['badge_img']['name'];
                    $name = $_POST['school_name'];
                    $district = $_POST['district'];
                    $county = $_POST['county'];
                    $subCounty = $_POST['sub_county'];
                    $contact = $_POST['contact'];
                    // $village = $_POST['village'];

                    //$ServerURL = "http://localhost/webapps/onelineducater/$target";
                    $ServerURL = "https://onelineducater.com/on/$target";

                    $sql = "INSERT INTO learning_institutions (badge_img, school_name, district, county, sub_county, school_level, status, institution, contact) VALUES ('$ServerURL', '$name', '$district', '$county', '$subCounty', 'secondary', 'subscribed', 'public', '$contact')";

                    if (mysqli_query($db, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                    }

                    //saving badge to target folder
                    if (move_uploaded_file($_FILES['badge_img']['tmp_name'], $target)) {
      
                        //$msg = "Image uploaded successfully";
                        echo $msg;

                    }else{

                        $msg = "Something went wrong on upload";
                        echo $msg;
                    }

                       $db->close();
                    }
                    ?>

                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <th>Badge</th>
                            <th>School Name [ Secondary ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                            <th>Contact</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'secondary' AND status = 'subscribed' AND institution = 'private'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                            <td> <?php echo $row['contact']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start colleges -->
            <div id="colleges" class="tabcontent">
                <div class="topnav">
                  <!-- <a class="open-button" onclick="openForm3()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a> -->

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr>
                <div>
                  <?php

                    $msg = "";
                    // if upload button is clicked
                    if (isset($_POST['upload3'])) {
                    // the path to store the uploaded images
                    $target = "assets/badge_imgs/".basename($_FILES['badge_img']['name']);

                    //connect to db
                    include 'dbconnection.php';

                    //Get all data uploaded
                    $image = $_FILES['badge_img']['name'];
                    $name = $_POST['school_name'];
                    $district = $_POST['district'];
                    $county = $_POST['county'];
                    $subCounty = $_POST['sub_county'];
                    $contact = $_POST['contact'];
                    // $village = $_POST['village'];

                    //$ServerURL = "http://localhost/webapps/onelineducater/$target";
                    $ServerURL = "https://onelineducater.com/on/$target";

                    $sql = "INSERT INTO learning_institutions (badge_img, school_name, district, county, sub_county, school_level, status, institution, contact) VALUES ('$ServerURL', '$name', '$district', '$county', '$subCounty', 'college', 'subscribed', 'public', '$contact')";

                    if (mysqli_query($db, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                    }

                    //saving badge to target folder
                    if (move_uploaded_file($_FILES['badge_img']['tmp_name'], $target)) {
      
                        //$msg = "Image uploaded successfully";
                        echo $msg;

                    }else{

                        $msg = "Something went wrong on upload";
                        echo $msg;
                    }

                       $db->close();
                    }
                    ?>

                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <th>Badge</th>
                            <th>School Name [ Colleges ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                            <th>Contact</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'college' AND status = 'subscribed' AND institution = 'private'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                            <td> <?php echo $row['contact']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start universties -->
            <div id="universties" class="tabcontent">
                <div class="topnav">
                  <!-- <a class="open-button" onclick="openForm4()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a> -->

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr>
                <div>
                  <?php

                    $msg = "";
                    // if upload button is clicked
                    if (isset($_POST['upload4'])) {
                    // the path to store the uploaded images
                    $target = "assets/badge_imgs/".basename($_FILES['badge_img']['name']);

                    //connect to db
                    include 'dbconnection.php';
                    
                    //Get all data uploaded
                    $image = $_FILES['badge_img']['name'];
                    $name = $_POST['school_name'];
                    $district = $_POST['district'];
                    $county = $_POST['county'];
                    $subCounty = $_POST['sub_county'];
                    $contact = $_POST['contact'];
                    // $village = $_POST['village'];

                    //$ServerURL = "http://localhost/webapps/onelineducater/$target";
                    $ServerURL = "https://onelineducater.com/on/$target";

                    $sql = "INSERT INTO learning_institutions (badge_img, school_name, district, county, sub_county, school_level, status, institution, contact) VALUES ('$ServerURL', '$name', '$district', '$county', '$subCounty', 'university', 'subscribed', 'public', '$contact')";

                    if (mysqli_query($db, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                    }

                    //saving badge to target folder
                    if (move_uploaded_file($_FILES['badge_img']['tmp_name'], $target)) {
      
                        //$msg = "Image uploaded successfully";
                        echo $msg;

                    }else{

                        $msg = "Something went wrong on upload";
                        echo $msg;
                    }

                       $db->close();
                    }
                    ?>

                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <th>Badge</th>
                            <th>School Name [ Universities ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                            <th>Contact</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'university' AND status = 'subscribed' AND institution = 'private'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                            <td> <?php echo $row['contact']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start others -->
            <div id="others" class="tabcontent">
                <div class="topnav">
                  <!-- <a class="open-button" onclick="openForm5()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a> -->

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr>
                <div>
                  <?php

                    $msg = "";
                    // if upload button is clicked
                    if (isset($_POST['upload5'])) {
                    // the path to store the uploaded images
                    $target = "assets/badge_imgs/".basename($_FILES['badge_img']['name']);

                    //connect to db
                    include 'dbconnection.php';

                    //Get all data uploaded
                    $image = $_FILES['badge_img']['name'];
                    $name = $_POST['school_name'];
                    $district = $_POST['district'];
                    $county = $_POST['county'];
                    $subCounty = $_POST['sub_county'];
                    $parish = $_POST['contact'];
                    // $village = $_POST['village'];

                    //$ServerURL = "http://localhost/webapps/onelineducater/$target";
                    $ServerURL = "https://onelineducater.com/on/$target";

                    $sql = "INSERT INTO learning_institutions (badge_img, school_name, district, county, sub_county, school_level, status, institution, contact) VALUES ('$ServerURL', '$name', '$district', '$county', '$subCounty', 'others', 'subscribed', 'public', '$contact')";

                    if (mysqli_query($db, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                    }

                    //saving badge to target folder
                    if (move_uploaded_file($_FILES['badge_img']['tmp_name'], $target)) {
      
                        //$msg = "Image uploaded successfully";
                        echo $msg;

                    }else{

                        $msg = "Something went wrong on upload";
                        echo $msg;
                    }

                       $db->close();
                    }
                    ?>

                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <th>Badge</th>
                            <th>School Name [ Others ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                            <th>Contact</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'others' AND status = 'subscribed' AND institution = 'private'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                            <td> <?php echo $row['contact']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>
            <!---- end Subscribed --->
        </div>
        <div id="unsubscribed" class="tab-pane fade">
            <!-- start unsubscribed ----->
            <div class="tab">
               <a class="tablinks" onclick="openCity(event, 'kindergarten2')"><i class="glyphicon glyphicon-book"></i> Kindergarten</a>
               <a class="tablinks" onclick="openCity(event, 'primary2')"><i class="glyphicon glyphicon-book"></i> Primary</a>
               <a class="tablinks" onclick="openCity(event, 'secondary2')"><i class="glyphicon glyphicon-duplicate"></i> Seconday</a>
               <a class="tablinks" onclick="openCity(event, 'colleges2')"><i class="fa fa-book"></i> Colleges</a>
               <a class="tablinks" onclick="openCity(event, 'universties2')"><i class="fa fa-pencil-square-o"></i> Universities</a>
               <a class="tablinks" onclick="openCity(event, 'others2')"><i class="glyphicon glyphicon-pencil"></i> Other institutions</a>
            </div>

            <!--start kindergarten -->
            <div id="kindergarten2" class="tabcontent">
                <!-- <div class="topnav">
                  <a class="open-button" onclick="openForm()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a>

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr> -->
                
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px;">
                            <!--<th>Badge</th>-->
                            <th>School Name [ Kindergarten ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'kindergarten' AND institution = 'private' AND status = 'not subscribed'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <!--<td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>-->
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start primary -->
            <div id="primary2" class="tabcontent">
                <!-- <div class="topnav">
                  <a class="open-button" onclick="openForm()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a>

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr> -->
                
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <!--<th>Badge</th>-->
                            <th>School Name [ Primary ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'Primary' AND institution = 'private' AND status = 'not subscribed'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <!--<td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>-->
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start secondary -->
            <div id="secondary2" class="tabcontent">
                <!-- <div class="topnav">
                  <a class="open-button" onclick="openForm()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a>

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr> -->
                
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <!--<th>Badge</th>-->
                            <th>School Name [ Secondary ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'Secondary' AND institution = 'private' AND status = 'not subscribed'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <!--<td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>-->
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start colleges -->
            <div id="colleges2" class="tabcontent">
                <!-- <div class="topnav">
                  <a class="open-button" onclick="openForm()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a>

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr> -->
                
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <!--<th>Badge</th>-->
                            <th>School Name [ Colleges ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'College' AND institution = 'private' AND status = 'not subscribed'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <!--<td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>-->
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start universties -->
            <div id="universties2" class="tabcontent">
                <!-- <div class="topnav">
                  <a class="open-button" onclick="openForm()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a>

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr> -->
                
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <!--<th>Badge</th>-->
                            <th>School Name [ Universities ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'University' AND institution = 'private' AND status = 'not subscribed'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <!--<td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>-->
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>

            <!--start others -->
            <div id="others2" class="tabcontent">
                <!-- <div class="topnav">
                  <a class="open-button" onclick="openForm()"><i class="glyphicon glyphicon-plus-sign"></i> Add Your School</a>

                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div><hr> -->
                
                <div>
                    <table class="table table-bordered table-striped table-hover">

                        <thead style="font-size: 20px">
                            <!--<th>Badge</th>-->
                            <th>School Name [ Others ]</th>
                            <th>District</th>
                            <th>County</th>
                            <th>Sub county</th>
                        </thead>

                        <tbody>

                            <?php

                                include 'dbconnection.php';

                                $sql_fetch = "SELECT * FROM learning_institutions WHERE school_level = 'Others' AND institution = 'private' AND status = 'not subscribed'";

                                $result = $db->query($sql_fetch);

                                while($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <!--<td><img src=" <?php echo $row['badge_img']; ?>" height="100px" width="100px"></td>-->
                                            <td> <?php echo $row['school_name']; ?></td>
                                            <td> <?php echo $row['district']; ?></td>
                                            <td> <?php echo $row['county']; ?></td>
                                            <td> <?php echo $row['sub_county']; ?></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>
            <!-- end unsubscribed -->
        </div>
            
        </div>
    </div>
    <div class="form-popup" id="myForm0">
        <form method="post" action="Panel?oneline=private_institutions" class="form-container" enctype="multipart/form-data">
          <h4>Subscribe New Institution [Private]</h4><hr>

          <label for="psw"><b>School Budge</b></label>
          <input type="file" name="badge_img">

          <select name="school_level">
            <option value="">Select School level</option>
            <option value="Kindergarten">Kindergarten</option>
            <option value="Primary">Primary</option>
            <option value="Secondary">Secondary</option>
            <option value="Colleges">College</option>
            <option value="Universities">University</option>
            <option value="Others">Others</option>
          </select>
          <br>

          <input type="text" placeholder="School Name" name="school_name" required>

          <input type="text" placeholder="District" name="district" required>

          <input type="text" placeholder="County" name="county" required>

          <input type="text" placeholder="Sub County" name="sub_county" required>

          <input type="text" placeholder="Contact number" name="contact" required>

          <input type="submit" name="upload0">
          <button type="button" class="btn cancel" onclick="closeForm0()">Close</button>
        </form>
    </div>

    <div class="form-popup" id="myFormNon">
        <form method="post" action="Panel?oneline=private_institutions" class="form-container" enctype="multipart/form-data">
          <h4>Non Subscribed [ Private Only ]</h4><hr>

          <select name="school_level">
            <option value="">Select School Level</option>
            <option value=""></option>
            <option value="Kindergarten">Kindergarten</option>
            <option value="Primary">Primary</option>
            <option value="Secondary">Secondary</option>
            <option value="Colleges">College</option>
            <option value="Universities">University</option>
            <option value="Others">Others</option>
          </select>
         
          <div style="height: 15px"></div>

          <input type="text" placeholder="School Name" name="school_name" required>

          <input type="text" placeholder="District" name="district" required>

          <input type="text" placeholder="County" name="county" required>

          <input type="text" placeholder="Sub County" name="sub_county" required>

          <!-- <input type="text" placeholder="Contact number" name="contact" required></input> -->

          <input type="submit" name="uploadNon">
          <button type="button" class="btn cancel" onclick="closeForm5()">Close</button>
        </form>
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
function openForm0() {
  document.getElementById("myForm0").style.display = "block";
}

function closeForm0() {
  document.getElementById("myForm0").style.display = "none";
}
</script> 

<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}
</script>

<script>
function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}

function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
}
</script>  

<script>
function openForm3() {
  document.getElementById("myForm3").style.display = "block";
}

function closeForm3() {
  document.getElementById("myForm3").style.display = "none";
}
</script>  

<script>
function openForm4() {
  document.getElementById("myForm4").style.display = "block";
}

function closeForm4() {
  document.getElementById("myForm4").style.display = "none";
}
</script>

<script>
function openForm5() {
  document.getElementById("myFormNon").style.display = "block";
}

function closeForm5() {
  document.getElementById("myFormNon").style.display = "none";
}
</script>    