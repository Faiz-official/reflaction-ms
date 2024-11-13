<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
} else {

if(isset($_POST['submit']))
{
    $slidename = $_POST['slidename'];
    $slidedesc = $_POST['slidedescription'];
    $eid = $_GET['editid'];
    
    // Check if a new image is being uploaded
    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];
        $extension = substr($image, strlen($image) - 4, strlen($image));
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg / png / gif format allowed');</script>";
        } else {
            // Rename the image file and move to images folder
            $newimage = md5($image) . time() . $extension;
            move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $newimage);
            
            $query = mysqli_query($con, "UPDATE tblslides SET slidename='$slidename', slidedescription='$slidedesc', image='$newimage' WHERE ID='$eid'");
        }
    } else {
        // If no new image, update other details only
        $query = mysqli_query($con, "UPDATE tblslides SET slidename='$slidename', slidedescription='$slidedesc' WHERE ID='$eid'");
    }

    if ($query) {
        echo "<script>alert('Slide has been updated.');</script>";
        echo "<script>window.location.href = 'manage-slides.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>RMS Admin | Edit Slide</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/metisMenu.min.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="css/custom.css" rel="stylesheet">
<script> new WOW().init(); </script>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<?php include_once('includes/sidebar.php');?>
		<?php include_once('includes/header.php');?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Edit Slide</h3>
					<div class="form-grids row widget-shadow">
						<div class="form-title">
							<h4>Update Slide Details:</h4>
						</div>
						<div class="form-body">
							<form method="post" enctype="multipart/form-data">
								<?php
								$eid = $_GET['editid'];
								$ret = mysqli_query($con, "SELECT * FROM tblslides WHERE ID='$eid'");
								while ($row = mysqli_fetch_array($ret)) {
								?>
									<div class="form-group">
										<label for="exampleInputEmail1">Slide Name</label>
										<input type="text" class="form-control" id="slidename" name="slidename" value="<?php echo $row['slidename']; ?>" required="true">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Slide Description</label>
										<textarea type="text" class="form-control" id="slidedescription" name="slidedescription" required="true"><?php echo $row['slidedescription']; ?></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Image</label><br>
										<img src="images/<?php echo $row['image']; ?>" width="120" /><br>
										<input type="file" class="form-control" id="image" name="image">
									</div>
								<?php } ?>
								<button type="submit" name="submit" class="btn btn-default">Update Slide</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php include_once('includes/footer.php');?>
		</div>
	</div>
	<script src="js/classie.js"></script>
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>
									