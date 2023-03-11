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
      <h1>Home Section</h1>
     
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="profile_photo/<?php echo $profile_photo; ?>" class="rounded">
              <h3>Background Image</h3>
             
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Home</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Home</button>
                </li>


                

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Home</h5>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $name;  ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"> First Description</div>
                    <div class="col-lg-9 col-md-8"><?php echo $description;  ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Second Description</div>
                    <div class="col-lg-9 col-md-8"><?php echo $description2; ?></div>
                  </div>

                  
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form class="row g-3" action="home.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label"><b>Background image</b> photo upload size 1920px * 1280px</label>
                      <div class="col-md-8 col-lg-9">
                      <img src="profile_photo/<?php echo $profile_photo; ?>" class=""
                            style="width:150px;height:150px;">
                        <div class="pt-2">
                          <input type="file" name="profile_photo"><i class="bi bi-upload"></i>
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                              class="bi bi-trash"></i></a> -->
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="<?php echo $name; ?>">
                      </div>
                    </div>

                   
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">First Description</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="description" class="form-control" id="about" value="<?php echo $description; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Second Description</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="description2" type="text" class="form-control" id="company" value="<?php echo $description2; ?>">
                      </div>
                    </div>

                    
                    <div class="text-center">
                      <input type="submit" name="submit" value="Submit" class="btn btn-primary" >
                     
                    </div>


                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

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