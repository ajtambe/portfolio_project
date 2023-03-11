<?php
error_reporting(0);
include('config.php');


$contact_id = $_GET['contact_id'];


// $dec_emp_id = base64_decode($employee_id);
if ($contact_id != "") {
    $deleterecord = mysqli_query($conn, "delete from contactmaster where contact_id='$contact_id' ");
    $success_msg = "Record Deleted Successfully!";

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
  <!-- =====End Header==== -->
  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php') ?>
  <!-- =======End sidebar==== -->

  <main id="main" class="main">

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
    <div class="pagetitle">
      <h1>Dashboard</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <table class="table table-hover table-bordered ">

          <thead class="bg-secondary text-light">
            <tr>
              <th class="">Contact Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Contact Date</th>
              <th>Delete</th>

            </tr>
          </thead>

          <?php
          $selectquery = mysqli_query($conn, "SELECT * FROM `contactmaster`");
          while ($fetchdata = mysqli_fetch_array($selectquery)) {

            $contact_id  = $fetchdata['contact_id'];
            $name = $fetchdata['name'];
            $email = $fetchdata['email'];
            $subject = $fetchdata['subject'];
            $message = $fetchdata['message'];
            $contact_on = $fetchdata['contact_on'];
            ?>
            <tbody>
              <tr>
                <td class="">
                  <?php echo $contact_id; ?>
                </td>
                <td>
                  <?php echo $name; ?>
                </td>
                <td>
                  <?php echo $email; ?>
                </td>
                <td>
                  <?php echo $subject; ?>
                </td>
                <td>
                  <?php echo $message; ?>
                </td>
                <td>
                  <?php echo $contact_on; ?>
                </td>



                <td><a href="index1.php?contact_id=<?php echo $contact_id; ?>"
                    onclick="return confirm('Do you want to delete this record?');">Delete</a>
                </td>
              </tr>

            </tbody>
            <?php
          }
          ?>




        </table>
      </div>


      </div><!-- End Left side columns -->

      <!-- Right side columns -->

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