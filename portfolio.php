<?php
error_reporting(0);
include('config.php');



if (isset($_GET['portfolio_id'])) {
    $portfolio_id = $_GET['portfolio_id'];


    $selectquery = mysqli_query($conn, "select * from portfolioimgmaster where `portfolio_id`='$portfolio_id' ");
    while ($fetchdata = mysqli_fetch_array($selectquery)) {
        $portfolio_img = $fetchdata['portfolio_img'];
        unlink($root . '/wamp64/www/ajaytambe.in/admin/portfolio/' . $portfolio_img);
    }
    $deletephoto = mysqli_query($conn, "delete from portfolioimgmaster where portfolio_id='$portfolio_id'");
    echo "Photo Deleted!";
}




if (isset($_POST['submit'])) {

    $portfolio = $_POST['portfolio'];
    $img_type = $_POST['img_type'];
    $portfolio_img_description = $_POST['portfolio_img_description'];

    

    if ($img_type != "") {


        $insert = mysqli_query($conn, "insert into `portfolioimgmaster` 
    set 
    `img_type`='$img_type',
    `portfolio_img_description`='$portfolio_img_description'
    
   
    ");

        $lastempid = mysqli_insert_id($conn);


        $target_dir = "portfolio/";
        $target_file = $target_dir . basename($_FILES["portfolio"]["name"]);
        $imagename = basename($_FILES["portfolio"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["portfolio"]["tmp_name"], $target_file)) {


            $updateprofilephotoquery = mysqli_query($conn, "update portfolioimgmaster set `portfolio_img`='$imagename' where `portfolio_id`='$lastempid'");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }




        $success_msg = " Update Succefully !";
    } else {
        $error_msg = "Error  !";
    }
    ;




}
?>




<?php
$selectquery = mysqli_query($conn, "SELECT * FROM `homemaster` where home_id='1' ");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $name = $fetchdata['name'];
    $profile_photo = $fetchdata['profile_photo'];
    $description = $fetchdata['description'];
    $description2 = $fetchdata['description2'];

}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users / Profile - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include('header.php') ?>
    <!-- ====End Header===== -->

    <div class="mb-3 col-md-12">
        <?php
        if ($success_msg != "") {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong>
                <?php echo $success_msg; ?>
            </div>
            <?php
        }
        if ($error_msg != "") {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <?php echo $error_msg; ?>
            </div>
            <?php
        }
        ?>
    </div>
    <!-- ======= Sidebar ======= -->
    <?php include('sidebar.php') ?>
    <!-- =======End sidebar==== -->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Portfolio Section</h1>

        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">


                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Portfolio</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Portfolio</button>
                                </li>




                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Portfolio</h5>


                                    
                                    <h5 class="label">Mobile App</h5>
                                    <div class="row">

                                        <?php
                                        $selectquery = mysqli_query($conn, "select * from portfolioimgmaster where img_type='1'");
                                        while ($fetchdata = mysqli_fetch_array($selectquery)) {
                                            $portfolio_id = $fetchdata['portfolio_id'];
                                            $portfolio_img = $fetchdata['portfolio_img'];

                                            ?>
                                            <div class="col-md-4">

                                                <img src="portfolio/<?php echo $portfolio_img; ?>"
                                                    style="width:100%;height:250px;">
                                                <a href="portfolio.php?portfolio_id=<?php echo $portfolio_id; ?>"
                                                    class="btn btn-danger mt-3" onclick="return confirm('Do you want to delete this record?');">Delete Photo</a>

                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    

                                    <h5 class="label">Logo</h5>
                                    <div class="row">

                                        <?php
                                        $selectquery = mysqli_query($conn, "select * from portfolioimgmaster where img_type='2'");
                                        while ($fetchdata = mysqli_fetch_array($selectquery)) {
                                            $portfolio_id = $fetchdata['portfolio_id'];
                                            $portfolio_img = $fetchdata['portfolio_img'];

                                            ?>
                                            <div class="col-md-4">

                                                <img src="portfolio/<?php echo $portfolio_img; ?>"
                                                    style="width:100%;height:250px;">
                                                <a href="portfolio.php?portfolio_id=<?php echo $portfolio_id; ?>"
                                                    class="btn btn-danger mt-3" onclick="return confirm('Do you want to delete this record?');">Delete Photo</a>

                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>


                                    
                                    <h5 class="label">Website</h5>
                                    <div class="row">

                                        <?php
                                        $selectquery = mysqli_query($conn, "select * from portfolioimgmaster where img_type='3'");
                                        while ($fetchdata = mysqli_fetch_array($selectquery)) {
                                            $portfolio_id = $fetchdata['portfolio_id'];
                                            $portfolio_img = $fetchdata['portfolio_img'];

                                            ?>
                                            <div class="col-md-4">

                                                <img src="portfolio/<?php echo $portfolio_img; ?>"
                                                    style="width:100%;height:250px;">
                                                <a href="portfolio.php?portfolio_id=<?php echo $portfolio_id; ?>"
                                                    class="btn btn-danger mt-3" onclick="return confirm('Do you want to delete this record?');">Delete Photo</a>

                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>


                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form class="row g-3" action="portfolio.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="profileImage"
                                                class="col-md-4 col-lg-3 col-form-label">Upload Image</label>
                                            <div class="col-md-8 col-lg-9">
                                               
                                                <div class="pt-2">
                                                    <input type="file" name="portfolio"><i class="bi bi-upload"></i>
                                                    <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                              class="bi bi-trash"></i></a> -->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">
                                                Image Type</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select class="form-select" id="floatingSelect" name="img_type">
                                                    <option selected disabled> --Select Image Type--</option>
                                                    <option value="1" >Mobile App</option>
                                                    <option value="2" >Logo</option>
                                                    <option value="3" >Website</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Img
                                                Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="portfolio_img_description" type="text" class="form-control"
                                                    id="fullName">
                                            </div>
                                        </div>



                                        <div class="text-center">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                                        </div>


                                    </form><!-- End Profile Edit Form -->

                                </div>




                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('footer.php') ?>

    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>