<?php
error_reporting(0);
include('config.php');



if (isset($_POST['submit'])) {

    $resume_description = $_POST['resume_description'];
    $resume_sub_description = $_POST['resume_sub_description'];
    $resume_address = $_POST['resume_address'];
    $resume_mobile = $_POST['resume_mobile'];
    $resume_email = $_POST['resume_email'];
    $resume_job_exprience = $_POST['resume_job_exprience'];
    $exp_joining_date = $_POST['exp_joining_date'];
    $resume_company_name = $_POST['resume_company_name'];
    $resume_job_description = $_POST['resume_job_description'];
    $resume_job_description1 = $_POST['resume_job_description1'];
    $master_degree = $_POST['master_degree'];
    $master_degree_date = $_POST['master_degree_date'];
    $master_degree_college = $_POST['master_degree_college'];
    $master_degree_description = $_POST['master_degree_description'];
    $bachelor_degree = $_POST['bachelor_degree'];
    $bachelor_degree_date = $_POST['bachelor_degree_date'];
    $bachelor_degree_college = $_POST['bachelor_degree_college'];
    $bachelor_degree_description = $_POST['bachelor_degree_description'];
    $hsc = $_POST['hsc'];
    $hsc_date = $_POST['hsc_date'];
    $hsc_college = $_POST['hsc_college'];
    $hsc_description = $_POST['hsc_description'];

    if ($resume_description != "" && $resume_mobile != "") {


        $update = "UPDATE `resumemaster`
      set
   
      `resume_description`='$resume_description',
      `resume_sub_description`='$resume_sub_description',
      `resume_address`='$resume_address',
      `resume_mobile`='$resume_mobile',
      `resume_email`='$resume_email',
      `resume_job_exprience`='$resume_job_exprience',
      `exp_joining_date`='$exp_joining_date',
      `resume_company_name`='$resume_company_name',
      `resume_job_description`='$resume_job_description',
      `resume_job_description1`='$resume_job_description1',
      `master_degree`='$master_degree',
      `master_degree_date`='$master_degree_date',
      `master_degree_college`='$master_degree_college',
      `master_degree_description`='$master_degree_description',
      `bachelor_degree`='$bachelor_degree',
      `bachelor_degree_date`='$bachelor_degree_date',
      `bachelor_degree_college`='$bachelor_degree_college',
      `bachelor_degree_description`='$bachelor_degree_description',
      `hsc`='$hsc',
      `hsc_date`='$hsc_date',
      `hsc_college`='$hsc_college',
      `hsc_description`='$hsc_description'
      
     
      WHERE `resume_id` ='1'";
        $data = mysqli_query($conn, $update);





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

}
?>
<?php
$selectquery = mysqli_query($conn, "SELECT * FROM `resumemaster`");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $resume_description = $fetchdata['resume_description'];
    $resume_sub_description = $fetchdata['resume_sub_description'];
    $resume_address = $fetchdata['resume_address'];
    $resume_mobile = $fetchdata['resume_mobile'];
    $resume_email = $fetchdata['resume_email'];
    $resume_job_exprience = $fetchdata['resume_job_exprience'];
    $exp_joining_date = $fetchdata['exp_joining_date'];
    $resume_company_name = $fetchdata['resume_company_name'];
    $resume_job_description = $fetchdata['resume_job_description'];
    $resume_job_description1 = $fetchdata['resume_job_description1'];
    $master_degree = $fetchdata['master_degree'];
    $master_degree_date = $fetchdata['master_degree_date'];
    $master_degree_college = $fetchdata['master_degree_college'];
    $master_degree_description = $fetchdata['master_degree_description'];
    $bachelor_degree = $fetchdata['bachelor_degree'];
    $bachelor_degree_date = $fetchdata['bachelor_degree_date'];
    $bachelor_degree_college = $fetchdata['bachelor_degree_college'];
    $bachelor_degree_description = $fetchdata['bachelor_degree_description'];
    $hsc = $fetchdata['hsc'];
    $hsc_date = $fetchdata['hsc_date'];
    $hsc_college = $fetchdata['hsc_college'];
    $hsc_description = $fetchdata['hsc_description'];
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
            <h1>Resume</h1>

        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">


                <div class="col-xl-12 m-auto">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <!-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                              </li> -->



                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Resume Description</h5>
                                    <p class="small fst-italic">
                                        <?php echo $resume_description; ?>
                                    </p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $name; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Sub Description</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_sub_description; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_address; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Mobile</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_mobile; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_email; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Job Exprience</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_job_exprience; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">EXP Joining Date</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $exp_joining_date; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Company Name</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_company_name; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Job Description</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_job_description; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Job Description 1</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $resume_job_description1; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Master Degree</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $master_degree; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Master Degree Date</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $master_degree_date; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Master Degree College</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $master_degree_college; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Master Degree Description</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $master_degree_description; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Bachelor Degree</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $bachelor_degree; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Bachelor Degree Date</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $bachelor_degree_date; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Bachelor Degree College</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $bachelor_degree_college; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Bachelor Degree Description</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $bachelor_degree_description; ?>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">HSC</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $hsc; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">HSC Date</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $hsc_date; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">HSC College</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $hsc_college; ?>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">HSC Description

                                        </div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $hsc_description; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form class="row g-3" action="resume_section.php" method="POST"
                                        enctype="multipart/form-data">


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Resume
                                                Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_description" type="text" class="form-control"
                                                    id="fullName" value="<?php echo $resume_description; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Sub
                                                Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" name="resume_sub_description" class="form-control"
                                                    id="about" value="<?php echo $resume_sub_description; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company"
                                                class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_address" type="text" class="form-control"
                                                    id="company" value="<?php echo $resume_address; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Mobile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_mobile" type="text" class="form-control" id="Job"
                                                    value="<?php echo $resume_mobile; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_email" type="text" class="form-control" id="Country"
                                                    value="<?php echo $resume_email; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Job
                                                Exprience</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_job_exprience" type="text" class="form-control"
                                                    id="Country" value="<?php echo $resume_job_exprience; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">EXP Joining
                                                Date</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="exp_joining_date" type="text" class="form-control"
                                                    id="Country" value="<?php echo $exp_joining_date; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Company
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_company_name" type="text" class="form-control"
                                                    id="Address" value="<?php echo $resume_company_name; ?>">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Job
                                                Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_job_description" type="text" class="form-control"
                                                    id="Phone" value="<?php echo $resume_job_description; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Job Description
                                                1</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="resume_job_description1" type="text" class="form-control"
                                                    id="Email" value="<?php echo $resume_job_description1; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Master
                                                Degree</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="master_degree" type="text" class="form-control"
                                                    id="Address" value="<?php echo $master_degree; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Master
                                                Date</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="master_degree_date" type="text" class="form-control"
                                                    id="Twitter" value="<?php echo $master_degree_date; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Master
                                                college
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">

                                                <input name="master_degree_college" type="text" class="form-control"
                                                    id="Instagram" value="<?php echo $master_degree_college; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Master
                                                Degree
                                                Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="master_degree_description" type="text" class="form-control"
                                                    id="Facebook" value="<?php echo $master_degree_description; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Bachelor
                                                Degree</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="bachelor_degree" type="text" class="form-control"
                                                    id="Instagram" value="<?php echo $bachelor_degree; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Bachelor
                                                Degree
                                                Date</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="bachelor_degree_date" type="text" class="form-control"
                                                    id="Instagram" value="<?php echo $bachelor_degree_date; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Bachelor
                                                College
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="bachelor_degree_college" type="text" class="form-control"
                                                    id="Instagram" value="<?php echo $bachelor_degree_college; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Bachelor
                                                Degree
                                                Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="bachelor_degree_description" type="text"
                                                    class="form-control" id="Instagram"
                                                    value="<?php echo $bachelor_degree_description; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">HSC</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="hsc" type="text" class="form-control" id="Instagram"
                                                    value="<?php echo $hsc; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">HSC
                                                Date</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="hsc_date" type="text" class="form-control" id="Instagram"
                                                    value="<?php echo $hsc_date; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">HSC
                                                College</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="hsc_college" type="text" class="form-control"
                                                    id="Instagram" value="<?php echo $hsc_college; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">HSC
                                                Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="hsc_description" type="text" class="form-control"
                                                    id="Instagram" value="<?php echo $hsc_description; ?>">
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                                        </div>

                                    </form>

                                </div>


                                <!-- End Profile Edit Form -->

                            </div>



                        </div><!-- End Bordered Tabs -->

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