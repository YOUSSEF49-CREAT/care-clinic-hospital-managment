<?php
include("config/db.php");

$patientsCount = mysqli_num_rows(mysqli_query($conn," SELECT * FROM patients"));
$medecinsCount = mysqli_num_rows(mysqli_query($conn," SELECT * FROM medecins"));
$departementsCount = mysqli_num_rows(mysqli_query($conn," SELECT * FROM departements"));


?>

<link rel="stylesheet" href="assets/style.css">
<?php include("includes/sidebar.php"); ?>

<div class="content">
  <h2>Dashboard</h2>

  <div class="dashboard">

    <div class="card patients">
      <h3>Patients</h3>
      <p><?= $patientsCount ?></p>
    </div>

    <div class="card medecins">
      <h3>Médecins</h3>
      <p><?= $medecinsCount ?></p>
    </div>

    <div class="card departements">
      <h3>Départements</h3>
      <p><?= $departementsCount ?></p>
    </div>


   

  </div>
</div>

