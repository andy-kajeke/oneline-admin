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

#body table
{
 margin:0 auto;
 position:relative;
 bottom:50px;
}
table td,th
{
 padding:10px;
 border: solid #9fa8b0 1px;
 border-collapse:collapse;
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
<div class="container" style="margin-left: 0px;">
  <h3>Service providers</h3><hr/>
  
  <ul class="nav nav-tabs" style="background-color: #f1f1f1; margin-right: 15%">
    <li><a data-toggle="tab" href="#"></a></li>
    <li class="active"><a data-toggle="tab" href="#educational">Educational</a></li>
    <li><a data-toggle="tab" href="#finanical">Finanical</a></li>
    <li><a data-toggle="tab" href="#suplies">Suplies</a></li>
    <li><a data-toggle="tab" href="#printing">Printing</a></li>
    <li><a data-toggle="tab" href="#Communication">Communication & Transportation</a></li>
    <li><a data-toggle="tab" href="#health">Health</a></li>
    <li><a data-toggle="tab" href="#hospitality">Hospitality</a></li>
  </ul>

  <div class="tab-content">
    <div id="educational" class="tab-pane fade in active">
      <h3>Educational</h3>
      <div>
        <table width="85%" border="1" class="table-bordered table-striped">
          <tr style="font-size: 16px;">
            <td>Business Name</td>
            <td>Product / Service</td>
            <td>Location</td>
            <td>Owner</td>
            <td>Contact</td>
            <td>Posted Date</td>
          </tr>

          <?php

            include 'dbconnection.php';
                    
            $sql="SELECT * FROM service_providers WHERE businessType = 'Educational' ORDER BY id DESC";

            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['businessName'] ?></td>
                  <td><?php echo $row['businesProduct'] ?></td>
                  <td><?php echo $row['businessLocation'] ?></td>
                  <td><?php echo $row['businessOwner'] ?></td>
                  <td><?php echo $row['businessContact'] ?></td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
              <?php
            }
          ?>
        </table>
      </div>
    </div>
    <div id="finanical" class="tab-pane fade">
      <h3>Finanical</h3>
      <div>
        <table width="85%" border="1" class="table-bordered table-striped">
          <tr style="font-size: 16px;">
            <td>Business Name</td>
            <td>Product / Service</td>
            <td>Location</td>
            <td>Owner</td>
            <td>Contact</td>
            <td>Posted Date</td>
          </tr>

          <?php

            include 'dbconnection.php';
                    
            $sql="SELECT * FROM service_providers WHERE businessType = 'Finanical' ORDER BY id DESC";

            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['businessName'] ?></td>
                  <td><?php echo $row['businesProduct'] ?></td>
                  <td><?php echo $row['businessLocation'] ?></td>
                  <td><?php echo $row['businessOwner'] ?></td>
                  <td><?php echo $row['businessContact'] ?></td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
              <?php
            }
          ?>
        </table>
      </div>
    </div>
    <div id="suplies" class="tab-pane fade">
      <h3>Suplies</h3>
      <div>
        <table width="85%" border="1" class="table-bordered table-striped">
          <tr style="font-size: 16px;">
            <td>Business Name</td>
            <td>Product / Service</td>
            <td>Location</td>
            <td>Owner</td>
            <td>Contact</td>
            <td>Posted Date</td>
          </tr>

          <?php

            include 'dbconnection.php';
                    
            $sql="SELECT * FROM service_providers WHERE businessType = 'Suplies' ORDER BY id DESC";

            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['businessName'] ?></td>
                  <td><?php echo $row['businesProduct'] ?></td>
                  <td><?php echo $row['businessLocation'] ?></td>
                  <td><?php echo $row['businessOwner'] ?></td>
                  <td><?php echo $row['businessContact'] ?></td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
              <?php
            }
          ?>
        </table>
      </div>
    </div>
    <div id="printing" class="tab-pane fade">
      <h3>Printing</h3>
      <div>
        <table width="85%" border="1" class="table-bordered table-striped">
          <tr style="font-size: 16px;">
            <td>Business Name</td>
            <td>Product / Service</td>
            <td>Location</td>
            <td>Owner</td>
            <td>Contact</td>
            <td>Posted Date</td>
          </tr>

          <?php

            include 'dbconnection.php';
                    
            $sql="SELECT * FROM service_providers WHERE businessType = 'Printing' ORDER BY id DESC";

            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['businessName'] ?></td>
                  <td><?php echo $row['businesProduct'] ?></td>
                  <td><?php echo $row['businessLocation'] ?></td>
                  <td><?php echo $row['businessOwner'] ?></td>
                  <td><?php echo $row['businessContact'] ?></td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
              <?php
            }
          ?>
        </table>
      </div>
    </div>
    <div id="Communication" class="tab-pane fade">
      <h3>Communication & Transportation</h3>
      <div>
        <table width="85%" border="1" class="table-bordered table-striped">
          <tr style="font-size: 16px;">
            <td>Business Name</td>
            <td>Product / Service</td>
            <td>Location</td>
            <td>Owner</td>
            <td>Contact</td>
            <td>Posted Date</td>
          </tr>

          <?php

            include 'dbconnection.php';
                    
            $sql="SELECT * FROM service_providers WHERE businessType = 'Communication' ORDER BY id DESC";

            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['businessName'] ?></td>
                  <td><?php echo $row['businesProduct'] ?></td>
                  <td><?php echo $row['businessLocation'] ?></td>
                  <td><?php echo $row['businessOwner'] ?></td>
                  <td><?php echo $row['businessContact'] ?></td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
              <?php
            }
          ?>
        </table>
      </div>
    </div>
    <div id="health" class="tab-pane fade">
      <h3>Health</h3>
      <div>
        <table width="85%" border="1" class="table-bordered table-striped">
          <tr style="font-size: 16px;">
            <td>Business Name</td>
            <td>Product / Service</td>
            <td>Location</td>
            <td>Owner</td>
            <td>Contact</td>
            <td>Posted Date</td>
          </tr>

          <?php

            include 'dbconnection.php';
                    
            $sql="SELECT * FROM service_providers WHERE businessType = 'Health' ORDER BY id DESC";

            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['businessName'] ?></td>
                  <td><?php echo $row['businesProduct'] ?></td>
                  <td><?php echo $row['businessLocation'] ?></td>
                  <td><?php echo $row['businessOwner'] ?></td>
                  <td><?php echo $row['businessContact'] ?></td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
              <?php
            }
          ?>
        </table>
      </div>
    </div>
    <div id="hospitality" class="tab-pane fade">
      <h3>Hospitality</h3>
      <div>
        <table width="85%" border="1" class="table-bordered table-striped">
          <tr style="font-size: 16px;">
            <td>Business Name</td>
            <td>Product / Service</td>
            <td>Location</td>
            <td>Owner</td>
            <td>Contact</td>
            <td>Posted Date</td>
          </tr>

          <?php

            include 'dbconnection.php';
                    
            $sql="SELECT * FROM service_providers WHERE businessType = 'Hospitality' ORDER BY id DESC";

            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['businessName'] ?></td>
                  <td><?php echo $row['businesProduct'] ?></td>
                  <td><?php echo $row['businessLocation'] ?></td>
                  <td><?php echo $row['businessOwner'] ?></td>
                  <td><?php echo $row['businessContact'] ?></td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
              <?php
            }
          ?>
        </table>
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
