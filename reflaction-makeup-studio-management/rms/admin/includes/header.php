<div class="sticky-header header-section " style="background-color: #4f52ba;">
      <div class="header-left" >
        <!--toggle button start-->
        <button id="showLeftPush" style="background-color: #4f52ba;"><i class="fa fa-bars" style="color: white; font-size: 25px;"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo" style="background-color: #4f52ba;">
          <a href="index.html">
            <h1>Reflection Makeup Studio</h1><span>AdminPanel</span>
          </a>
        </div>
        <!--//logo-->
       
       
        <div class="clearfix"> </div>
      </div>
      <div class="header-right">
        <div class="profile_details_left"><!--notifications of menu start -->
          <ul class="nofitications-dropdown">
            <?php
$ret1=mysqli_query($con,"select tbluser.FirstName,tbluser.LastName,tblbook.ID as bid,tblbook.AptNumber from tblbook join tbluser on tbluser.ID=tblbook.UserID where tblbook.Status is null");
$num=mysqli_num_rows($ret1);

?>  
            <li class="dropdown head-dpdn">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell" style="color: white; font-size: 25px;"></i>

              <span class="badge blue"><?php echo $num;?></span></a>
              
              <ul class="dropdown-menu">
                <li>
                  <div class="notification_header">
                    <h3>You have <?php echo $num;?> new notification</h3>
                  </div>
                </li>
                <li>
            
                   <div class="notification_desc">
                     <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
                 <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $result['bid'];?>">New appointment received from <?php echo $result['FirstName'];?> <?php echo $result['LastName'];?> (<?php echo $result['AptNumber'];?>)</a>
                 <hr />
<?php }} else {?>
    <a class="dropdown-item" href="all-appointment.php">No New Appointment Received</a>
        <?php } ?>
                           
                  </div>
                  <div class="clearfix"></div>  
                 </a></li>
                 
                
                 <li>
                  <div class="notification_bottom">
                    <a href="new-appointment.php">See all notifications</a>
                  </div> 
                </li>
              </ul>
            </li> 
          
          </ul>
          <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="profile_details">  
        <?php
$adid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?> 
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/admin.jpg" alt="" width="50" height="50" style="border: 3px solid white; border-radius: 50%;"></span> 
                  <div class="user-name">
                    <p  style="color:#fae637;"><?php echo $name; ?></p>
                    <span style="color: #ffffff; font-size: 18px; font-weight: bold;">Administrator</span>
                  </div>
                  <i class="fa fa-angle-down lnr" style="color: white; font-weight: bold;"></i>
                  <i class="fa fa-angle-up lnr" style="color: white; font-weight: bold;"></i>

                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>  
        <div class="clearfix"> </div> 
      </div>
      <div class="clearfix"> </div> 
    </div>