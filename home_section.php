<?php
error_reporting(0);
include('config.php');

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $profile_photo = $_POST['profile_photo'];
    $description = $_POST['description'];
    $description2 = $_POST['description2'];
    

    if ($name != "" && $description != "") {


        $update = "UPDATE `homemaster`
        set
     
        `name`='$name',
        `description`='$description',
        `description2`='$description2'
        
        WHERE `home_id` ='1'";
        $data = mysqli_query($conn, $update);


        $target_dir = "profile_photo/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        $imagename = basename($_FILES["profile_photo"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {


            $updateprofilephotoquery = mysqli_query($conn, "update homemaster set `profile_photo`='$imagename' where `home_id`='1'");
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

    <title>Admin Home</title>
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



<div class="container">

    <div class="col-md-6 m-auto pt-5">


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Home </h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="home_section.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12 text-end">

                        <img src="profile_photo/<?php echo $profile_photo; ?>" class=""
                            style="width:150px;height:150px;">

                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name"
                            value="<?php echo $name; ?>">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Photo <b>note-</b>background Photo Size 1920px * 1280px</label>
                        <input type="file" class="form-control" id="inputEmail4" name="profile_photo" accept="image/*"
                            value="<?php echo $profile_photo; ?>">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">First Description</label>
                        <input type="text" class="form-control" id="inputPassword4" name="description"
                            value="<?php echo $description; ?>">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Second Description </label>
                        <input type="text" class="form-control" id="inputPassword4" name="description2"
                            value="<?php echo $description2; ?>">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
</div>