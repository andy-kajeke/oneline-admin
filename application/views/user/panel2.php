<?php 
include ('config.php');
?> 

<!DOCTYPE HTML>
<html>

<head>
	<title>Oneline Educater| Admin: Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="<?=base_url()?>assets/meadmin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="<?=base_url()?>assets/meadmin/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="<?=base_url()?>assets/meadmin/css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="<?=base_url()?>assets/meadmin/js/jquery-1.10.2.min.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/amcharts.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/serial.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/light.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/radar.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/tabControl.js"></script>
	<link href="<?=base_url()?>assets/meadmin/css/barChart.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url()?>assets/meadmin/css/fabochart.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url()?>assets/meadmin/css/tabControl.css" rel='stylesheet' type='text/css' />
	<!--clock init-->
	<script src="<?=base_url()?>assets/meadmin/js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="<?=base_url()?>assets/meadmin/js/skycons.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/jquery.easydropdown.js"></script>
	<!-------->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!--//skycons-icons-->
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">

					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->
		
				<?php 
				
				$homepage = "home1";
				if(isset($_GET['oneline']))
				{
					$homepage = $_GET['oneline'];
				}
				include $homepage.".php";
						
				?>
				
				<!--footer section start-->
				<!-- <footer>
					<p>&copy 2019. All Rights Reserved | Oneline Educater</p>
				</footer> -->
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		
		<div class="sidebar-menu" style="background-color: #000">
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Admin Panel</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<!-- <a href="index.html"><img src="images/admin.jpg"></a>
				 <a href="index.php"><span class=" name-caret"><?php echo $info_display['t_fullname']; ?></span></a> 
				<p>System Administrator in Company</p> -->
				<img src="<?php echo base_url();?>assets/img/logo.png" alt="logo" width="150" height="40"><hr>
				<!-- <ul>
					<li><a class="tooltips" href="#"><span>Profile</span><i class="glyphicon glyphicon-user"></i></a></li>
					<li><a class="tooltips" href="#"><span>Settings</span><i class="glyphicon glyphicon-cog"></i></a></li>
					<li><a class="tooltips" href="logouts.php"><span>Log out</span><i class="glyphicon glyphicon-log-out"></i></a></li>
				</ul> -->
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li><a href="Panel"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li><br>
					<li id="menu-academico"><a href="#"><i class="fa fa-table"></i> <span>Learning Institutions</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="Panel?oneline=public_institutions">Public</a></li>
							<li id="menu-academico-boletim"><a href="Panel?oneline=private_institutions">Private</a></li>
							<!-- <li id="menu-academico-avaliacoes"><a href="calender.html">Add Institution</a></li> -->

						</ul>
					</li><br>
				<li id="menu-academico"><a href="#"><i class="glyphicon glyphicon-education"></i> <span>Academics</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="Panel?oneline=academics_secondary">Secondary</a></li>
							<li id="menu-academico-avaliacoes"><a href="Panel?oneline=academics_primary">Primary</a></li>
							<li id="menu-academico-avaliacoes"><a href="Panel?oneline=academics_nursery">Nursery</a></li>
							<li id="menu-academico-avaliacoes"><a href="#">Art Room</a></li>
							<li id="menu-academico-avaliacoes"><a href="#">Library & Laboratories</a></li>
						</ul>
					</li><br>
					
					<li id="menu-academico"><a href="Panel?oneline=service_providers"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Service Providers</span></a> 
					</li><br>
					
					<li id="menu-academico"><a href="#"><i class="glyphicon glyphicon-info-sign"></i> <span>FAQs & News</span></a></li><br>

					<!-- <li id="menu-academico"><a href="exploer?oneline=about_us"><i class="glyphicon glyphicon-text-background"></i> <span>About us</span></a></li>

					<li id="menu-academico"><a href="exploer?oneline=contact_us"><i class="glyphicon glyphicon-phone-alt"></i> <span>Contact us</span></a></li> -->

					<li id="menu-academico"><a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Settings</span></a> <!-- <span class="fa fa-angle-right" style="float: right"></span></a>
					<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=general-information">General Information</a></li>
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=edit-general-information">Edit General Information</a></li>
						
						</ul> -->
					</li>
					
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<link rel="stylesheet" href="css/vroom.css">
	<script type="text/javascript" src="<?=base_url()?>assets/meadmin/js/vroom.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/meadmin/js/TweenLite.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/meadmin/js/CSSPlugin.min.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/jquery.nicescroll.js"></script>
	<script src="<?=base_url()?>assets/meadmin/js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?=base_url()?>assets/meadmin/js/bootstrap.min.js"></script>
</body>

</html>