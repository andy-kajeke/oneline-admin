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
            <a href="<?= base_url('User/Panel') ?>" class="btn btn-primary my-2 my-sm-0"><?= $this->session->userdata('USER_NAME') ?></a> &nbsp;
            <a href="<?= base_url('User/logout') ?>" class="btn btn-danger my-2 my-sm-0">Logout</a>
            <?php }  ?>
  </div>
</div>

<div class="content">
  <h3>Dashboard</h3>
  <hr/>
  <div class="container-fluid d-flex justify-content-center">
  	<h4>System Users</h4>
	<div class="row">
		<div class="col-md-3 widget">
			<div class="stats-left ">
				<h5>Total</h5>
				<h4>Admins</h4>
			</div>
			<div class="stats-right">
				<label>
					<?php
					include 'dbconnection.php';

                    $result = mysqli_query($db, "SELECT  COUNT(*) as count
                    FROM users");

                    while ($row = mysqli_fetch_array($result)) {

                    $var = $row['count'];

                    echo "" .$var. " ";

                    }?>
                </lable>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-3 widget states-mdl">
			<div class="stats-left">
				<h5>Total</h5>
				<h4>Quiz Clients</h4>
			</div>
			<div class="stats-right">
				<label>
					<?php
					include 'dbconnection.php';

                    $result = mysqli_query($db, "SELECT  COUNT(*) as count
                    FROM user");

                    while ($row = mysqli_fetch_array($result)) {

                    $var = $row['count'];

                    echo "" .$var. " ";

                    }?>
                </lable>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-3 widget states-thrd">
			<div class="stats-left">
				<h5>Total</h5>
				<h4>Courses</h4>
			</div>
			<div class="stats-right">
				<label>51</label>
			</div>
			<div class="clearfix"> </div>
		</div>
		
		<div class="clearfix"> </div>
	</div>
  </div>
  <br/>
  <div class="container-fluid d-flex justify-content-center">
  	<h4>Academic Content</h4>
	<div class="row">
		<div class="col-md-4">
			<div class="stats-left ">
				<h5>Total</h5>
				<h5>Curriculum</h5>
				<h4>
					<?php
					include 'dbconnection.php';

                    $result = mysqli_query($db, "SELECT  COUNT(*) as count
                    FROM curriculum");

                    while ($row = mysqli_fetch_array($result)) {

                    $var = $row['count'];

                    echo "(" .$var. ")";

                    }?>
                </h4>
			</div>
			<!-- <div class="stats-right">
				
			</div> -->
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-4 widget states-mdl">
			<div class="stats-left">
				<h5>Total</h5>
				<h5>Schems of work</h5>
				<h4>
					<?php
					include 'dbconnection.php';

                    $result = mysqli_query($db, "SELECT  COUNT(*) as count
                    FROM schemsofwork");

                    while ($row = mysqli_fetch_array($result)) {

                    $var = $row['count'];

                    echo "(" .$var. ")";

                    }?>
                </h4>
			</div>
			<!-- <div class="stats-right">
				
			</div> -->
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-3">
			<div class="stats-left">
				<h5>Total</h5>
				<h5>Lesson plans</h5>
				<h4>
					<?php
					include 'dbconnection.php';

                    $result = mysqli_query($db, "SELECT  COUNT(*) as count
                    FROM lessonplans");

                    while ($row = mysqli_fetch_array($result)) {

                    $var = $row['count'];

                    echo "(" .$var. ")";

                    }?>
                </h4>
			</div>
			<!-- <div class="stats-right">
				<label>51</label>
			</div> -->
			<div class="clearfix"> </div>
		</div>
		
		<div class="clearfix">
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
