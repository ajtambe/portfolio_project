<?php
error_reporting(0);
include('config.php');


$selectquery1 = mysqli_query($conn, "SELECT * FROM `usermaster`");
while ($fetchdata1 = mysqli_fetch_array($selectquery1)) {

    $password = $fetchdata1['password'];
}

if (isset($_POST['changePass'])) {

  $password = $_POST['password'];
  $newpassword = $_POST['newpassword'];
  $renewpassword = $_POST['renewpassword'];



  if ($newpassword == $renewpassword) {


    $update = "UPDATE `usermaster` SET 
    `password`='$newpassword' 
    WHERE `password`='$password';";
    $data = mysqli_query($conn, $update);
}
}

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $profile_photo = $_POST['profile_photo'];
  $about = $_POST['about'];
  $job = $_POST['job'];
  $job_description = $_POST['job_description'];
  $birth_date = $_POST['birth_date'];
  $age = $_POST['age'];
  $website_link = $_POST['website_link'];
  $degree = $_POST['degree'];
  $phone_no = $_POST['phone_no'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $twitter_link = $_POST['twitter_link'];
  $instagram_link = $_POST['instagram_link'];
  $facebook_link = $_POST['facebook_link'];
  $skype_link = $_POST['skype_link'];
  $linkedin_link = $_POST['linkedin_link'];
  $sub_description = $_POST['sub_description'];

  if ($name != "" && $job != "") {


      $update = "UPDATE `profilemaster`
      set
   
      `name`='$name',
      `about`='$about',
      `job`='$job',
      `job_description`='$job_description',
      `birth_date`='$birth_date',
      `age`='$age',
      `website_link`='$website_link',
      `degree`='$degree',
      `phone_no`='$phone_no',
      `email`='$email',
      `city`='$city',
      `twitter_link`='$twitter_link',
      `instagram_link`='$instagram_link',
      `facebook_link`='$facebook_link',
      `skype_link`='$skype_link',
      `linkedin_link`='$linkedin_link',
      `sub_description`='$sub_description'
     
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
    $about = $fetchdata['about'];
    $job = $fetchdata['job'];
    $job_description = $fetchdata['job_description'];
    $birth_date = $fetchdata['birth_date'];
    $age = $fetchdata['age'];
    $website_link = $fetchdata['website_link'];
    $degree = $fetchdata['degree'];
    $phone_no = $fetchdata['phone_no'];
    $email = $fetchdata['email'];
    $city = $fetchdata['city'];
    $profile_photo = $fetchdata['profile_photo'];
    $twitter_link = $fetchdata['twitter_link'];
    $instagram_link = $fetchdata['instagram_link'];
    $facebook_link = $fetchdata['facebook_link'];
    $skype_link = $fetchdata['skype_link'];
    $linkedin_link = $fetchdata['linkedin_link'];
    $sub_description = $fetchdata['sub_description'];
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="profile_photo/<?php echo $profile_photo; ?>" class="rounded-circle">
              <h2><?php echo $name;  ?></h2>
              <h3><?php echo $job; ?></h3>
              <div class="social-links mt-2">
                <a href="<?php echo $twitter_link ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $facebook_link ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $instagram_link ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $skype_link;?>" class="google-plus"><i class="bx bxl-skype"></i></a>

                <a href="<?php echo $linkedin_link ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
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
                    data-bs-target="#profile-overview">Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li> -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $about; ?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $name;  ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?php echo $job;  ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job Description</div>
                    <div class="col-lg-9 col-md-8"><?php echo $job_description; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Birth Date</div>
                    <div class="col-lg-9 col-md-8"><?php echo $birth_date; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Age</div>
                    <div class="col-lg-9 col-md-8"><?php echo $age; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Website</div>
                    <div class="col-lg-9 col-md-8"><?php echo $website_link; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Degree</div>
                    <div class="col-lg-9 col-md-8"><?php echo $degree; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $phone_no; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City</div>
                    <div class="col-lg-9 col-md-8"><?php echo $city; ?></div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form class="row g-3" action="users-profile.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
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
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="about" class="form-control" id="about" value="<?php echo $about; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="company" value="<?php echo $job; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job Description</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job_description" type="text" class="form-control" id="Job" value="<?php echo $job_description; ?>" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Birthday</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="birth_date" type="text" class="form-control" id="Country" value="<?php echo $birth_date; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Age</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="age" type="text" class="form-control" id="Country" value="<?php echo $age; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Website</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="website_link" type="text" class="form-control" id="Country" value="<?php echo $website_link; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Degree</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="degree" type="text" class="form-control" id="Address" value="<?php echo $degree; ?>">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone_no" type="text" class="form-control" id="Phone"
                        value="<?php echo $phone_no; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label >
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $email; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">City</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="city" type="text" class="form-control" id="Address" value="<?php echo $city; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter_link" type="text" class="form-control" id="Twitter"
                        value="<?php echo $twitter_link; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                       
                          <input name="facebook_link" type="text" class="form-control" id="Instagram" value="<?php echo $facebook_link; ?>"
                         >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                      <input name="instagram_link" type="text" class="form-control" id="Facebook" value="<?php echo $instagram_link; ?>"
                         >
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Skype Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="skype_link" type="text" class="form-control" id="Instagram"
                        value="<?php echo $skype_link; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin_link" type="text" class="form-control" id="Linkedin"
                        value="<?php echo $linkedin_link; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Sub Description</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="sub_description" class="form-control" id="about"
                          style="height: 100px" value="<?php echo $sub_description; ?>">
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
                  <form method="post" action="users-profile.php" >

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
                      <button type="submit" name="changePass" class="btn btn-primary">Change Password</button>
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