<?php
include("config/db.php");

$patientsCount = mysqli_num_rows(mysqli_query($conn," SELECT * FROM patients"));
$medecinsCount = mysqli_num_rows(mysqli_query($conn," SELECT * FROM medecins"));
$departementsCount = mysqli_num_rows(mysqli_query($conn," SELECT * FROM departements"));
?>

<link rel="stylesheet" href="assets/style.css">

<body>

    <?php include("includes/sidebar.php"); ?>

    <section >
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

            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Patients', 'Médecins', 'Départements'],
      datasets: [{
        label: 'Count',
        data: [<?= $patientsCount ?>, <?= $medecinsCount ?>, <?= $departementsCount ?>],
        borderWidth: 1,
        backgroundColor: ['#1abc9c', '#3498db', '#e67e22']
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
