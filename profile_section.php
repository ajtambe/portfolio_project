<?php
error_reporting(0);
include('config.php');

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $profile_photo = $_POST['profile_photo'];
    $twitter_link = $_POST['twitter_link'];
    $instagram_link = $_POST['instagram_link'];
    $facebook_link = $_POST['facebook_link'];
    $skype_link = $_POST['skype_link'];
    $linkedin_link = $_POST['linkedin_link'];

    if ($name != "" && $twitter_link != "") {


        $update = "UPDATE `profilemaster`
        set
     
        `name`='$name',
        `twitter_link`='$twitter_link',
        `instagram_link`='$instagram_link',
        `facebook_link`='$facebook_link',
        `skype_link`='$skype_link',
        `linkedin_link`='$linkedin_link'
       
        WHERE `profile_id` ='1'";
        $data = mysqli_query($conn, $update);


        $target_dir = "profile_photo/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        $imagename = basename($_FILES["profile_photo"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {


            $updateprofilephotoquery = mysqli_query($conn, "update profilemaster set `profile_photo`='$imagename' where `profile_id`='1'");
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
$selectquery = mysqli_query($conn, "SELECT * FROM `profilemaster` where profile_id='1' ");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $name = $fetchdata['name'];
    $profile_photo = $fetchdata['profile_photo'];
    $twitter_link = $fetchdata['twitter_link'];
    $instagram_link = $fetchdata['instagram_link'];
    $facebook_link = $fetchdata['facebook_link'];
    $skype_link = $fetchdata['skype_link'];
    $linkedin_link = $fetchdata['linkedin_link'];
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Register - NiceAdmin Bootstrap Template</title>
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
                <h5 class="card-title">Profile </h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="profile_section.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12 text-end">

                        <img src="profile_photo/<?php echo $profile_photo; ?>" class=""
                            style="width:150px;height:150px;">

                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name"
                            value="<?php echo $name; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Photo <b>note-</b> Photo Size 600px * 600</label>
                        <input type="file" class="form-control" id="inputEmail4" name="profile_photo" accept="image/*"
                            value="<?php echo $profile_photo; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">twiter Link</label>
                        <input type="text" class="form-control" id="inputPassword4" name="twitter_link"
                            value="<?php echo $twitter_link; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Instagram link</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder=".com"
                            name="instagram_link" value="<?php echo $instagram_link; ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Facebook link</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder=".com"
                            name="facebook_link" value="<?php echo $facebook_link; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">skype link</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder=".com" name="skype_link"
                            value="<?php echo $skype_link; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">linked in link</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder=".com"
                            name="linkedin_link" value="<?php echo $linkedin_link; ?>">
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