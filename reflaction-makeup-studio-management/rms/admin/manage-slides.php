<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    // Delete Slide
    if ($_GET['delid']) {
        $sid = $_GET['delid'];
        mysqli_query($con, "DELETE FROM tblslides WHERE ID = '$sid'");
        echo "<script>alert('Slide Deleted');</script>";
        echo "<script>window.location.href='manage-slides.php'</script>";
    }

    // Toggle Slide Status
    if ($_GET['statusid']) {
        $sid = $_GET['statusid'];
        $currentStatus = $_GET['status'];
        $newStatus = ($currentStatus == 'active') ? 'inactive' : 'active';

        mysqli_query($con, "UPDATE tblslides SET status = '$newStatus' WHERE ID = '$sid'");
        echo "<script>window.location.href='manage-slides.php'</script>";
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>RMS Admin | Manage Slides</title>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php');?>
		
        <?php include_once('includes/header.php');?>

        <!-- Main Content -->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <h3 class="title1">Manage Slides</h3>
                    <div class="table-responsive bs-example widget-shadow">
                        <h4>Slides List:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Slide Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM tblslides");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                <tr style="text-align: justify;">
                                    <th scope="row"><?php echo $cnt; ?></th>
                                    <td><?php echo $row['slidename']; ?></td>
                                    <td style="max-width: 300px; word-wrap: break-word; white-space: normal;"><?php echo $row['slidedescription']; ?></td>
                                    <td style="text-align: center;"><img src="images/<?php echo $row['image']; ?>" width="100" height="50"></td>
                                    <td style="text-align: center;">
                                        <a href="manage-slides.php?statusid=<?php echo $row['ID']; ?>&status=<?php echo $row['status']; ?>" 
                                           class="btn <?php echo ($row['status'] == 'active') ? 'btn-success' : 'btn-danger'; ?>">
                                            <?php echo ucfirst($row['status']); ?>
                                        </a>
                                    </td>
                                    <td style="text-align: center;"><?php echo $row['creationdate']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="edit-slides.php?editid=<?php echo $row['ID']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="manage-slides.php?delid=<?php echo $row['ID']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    $cnt++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
    </div>
    <!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>
