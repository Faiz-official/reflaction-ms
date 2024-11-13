<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>RMStudio | Service Page</title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body id="home">
    <?php include_once('includes/header.php');?>

    <script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
    <script src="assets/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->

    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>

    <!-- breadcrumbs -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner services ">
            <div class="container">   
                <div class="main-titles-head text-center">
                    <h3 class="header-name" style="font-weight: bold;">Our Service</h3>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">   
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                    <li class="active">Services</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumbs //-->

    <!-- Services Section -->
    <section class="w3l-recent-work-hobbies"> 
        <div class="recent-work">
            <div class="container">
                <div class="row about-about">
                    <?php
                    $ret = mysqli_query($con, "select * from tblservices");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 propClone">
                        <!-- Service Box -->
                        <div class="service-box" style="display: flex; flex-direction: column; justify-content: space-between; margin-bottom: 30px; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 100%;">
                            <!-- Image -->
                            <img src="admin/images/<?php echo $row['Image']?>" alt="Service Image" class="img-fluid about-me" style="height: 200px; width: 100%; object-fit: cover;">
                            
                            <!-- Content -->
                            <div class="service-details" style="flex-grow: 1; padding: 10px;">
                                <hr>
                                <h5 class="para" style="font-weight: bold;"><?php echo $row['ServiceName'];?></h5>
                                <p class="para"><?php echo $row['ServiceDescription'];?></p>
                            </div>
                            
                            <!-- Cost of Service in a new row -->
                            <div class="service-cost" style="margin-top: 20px; text-align: left;">
    <p class="para" style="color: hotpink; font-weight: bold;">Cost of Service: ₹<?php echo $row['Cost'];?></p>
</div>

                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <?php include_once('includes/footer.php');?>

    <!-- Scroll to Top Button -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-long-arrow-up"></span>
    </button>
  </body>
</html>
