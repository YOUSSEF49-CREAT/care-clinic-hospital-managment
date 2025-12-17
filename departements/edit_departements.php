<?php
include("../config/db.php");

$id = $_GET['id'];


$res = mysqli_query($conn, "SELECT * FROM departements WHERE id = $id");
$row = mysqli_fetch_assoc($res);


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    mysqli_query($conn, "UPDATE departements SET name='$name' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>

<link rel="stylesheet" href="../assets/style.css">

<?php include("../includes/sidebar.php"); ?>

<div class="content">
  <h2>Edit Département</h2>

  <form method="post" class="form-edit">
    <label>Département Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>

    <button type="submit" name="update">Update</button>
    <a href="index.php" class="btn cancel">Cancel</a>
  </form>
</div>
