<?php include("../config/db.php"); ?>
<link rel="stylesheet" href="../assets/style.css">
<?php include("../includes/sidebar.php"); ?>

<div class="content">
<h2>Patients</h2>

<form method="post">
  <input type="text" name="name" placeholder="Name" required>
  <input type="text" name="phone" placeholder="Phone">
  <input type="text" name="address" placeholder="Address">
  <input type="number" name="age" placeholder="Age">

  <select name="medecin">
    <?php
    $med = mysqli_query($conn,"SELECT * FROM medecins");
    while($m = mysqli_fetch_assoc($med)){
      echo "<option value='{$m['id']}'>{$m['name']}</option>";
    }
    ?>
  </select>

  <button name="add">Add</button>
</form>

<?php
if(isset($_POST['add'])){
  mysqli_query($conn,"
    INSERT INTO patients(name,phone,address,age,medecin_id)
    VALUES(
      '$_POST[name]',
      '$_POST[phone]',
      '$_POST[address]',
      '$_POST[age]',
      '$_POST[medecin]'
    )
  ");
}

$res = mysqli_query($conn,"
SELECT p.*, m.name AS med
FROM patients p
JOIN medecins m ON p.medecin_id=m.id
");

while($row = mysqli_fetch_assoc($res)){
echo "
<div class='list-card patients'>
  <h3>{$row['name']}</h3>
  <p><strong>Phone:</strong> {$row['phone']}</p>
  <p><strong>Address:</strong> {$row['address']}</p>
  <p><strong>Age:</strong> {$row['age']}</p>
  <p><strong>Médecin:</strong> {$row['med']}</p>
  
  <div class='card-buttons'>
    <a href='edit_patient.php?id={$row['id']}' class='btn edit'>Edit</a>
    <a href='delete_patient.php?id={$row['id']}' class='btn delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
  </div>
</div>
";

}
?>
</div>
