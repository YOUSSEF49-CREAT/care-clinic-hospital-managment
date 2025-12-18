<?php
include("../config/db.php");

$id = $_GET['id'];

// جلب معلومات الطبيب
$res = mysqli_query($conn, "SELECT * FROM medecins WHERE id=$id");
$row = mysqli_fetch_assoc($res);

// update
if (isset($_POST['update'])) {
    mysqli_query($conn, "
        UPDATE medecins SET
            name='$_POST[name]',
            phone='$_POST[phone]',
            email='$_POST[email]',
            address='$_POST[address]',
            age='$_POST[age]',
            departement_id='$_POST[departement]'
        WHERE id=$id
    ");

    header("Location: index.php");
}
?>

<link rel="stylesheet" href="../assets/style.css">

<h2>Edit Medecin</h2>

<form method="post">
  <input type="text" name="name" value="<?= $row['name'] ?>" required>
  <input type="text" name="phone" value="<?= $row['phone'] ?>">
  <input type="email" name="email" value="<?= $row['email'] ?>">
  <input type="text" name="address" value="<?= $row['address'] ?>">
  <input type="number" name="age" value="<?= $row['age'] ?>">

  <select name="departement">
    <?php
    $deps = mysqli_query($conn, "SELECT * FROM departements");
    while ($d = mysqli_fetch_assoc($deps)) {
        $selected = ($d['id'] == $row['departement_id']) ? "selected" : "";
        echo "<option value='{$d['id']}' $selected>{$d['name']}</option>";
    }
    ?>
  </select>

  <button name="update">Update</button>
</form>
