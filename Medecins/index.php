<?php include("../config/db.php"); ?>
<link rel="stylesheet" href="../assets/style.css">
<?php include("../includes/sidebar.php"); ?>

<div class="content">
<h2>Medecins</h2>

<form method="post">
  <input type="text" name="name" placeholder="Name" required>
  <input type="text" name="phone" placeholder="Phone">
  <input type="email" name="email" placeholder="Email">
  <input type="text" name="address" placeholder="Address">
  <input type="number" name="age" placeholder="Age">

  <select name="departement">
    <?php
    $deps = mysqli_query($conn,"SELECT * FROM departements");
    while($d = mysqli_fetch_assoc($deps)){
      echo "<option value='{$d['id']}'>{$d['name']}</option>";
    }
    ?>
  </select>

  <button name="add">Add</button>
</form>

<?php
if(isset($_POST['add'])){
  mysqli_query($conn,"
    INSERT INTO medecins(name,phone,email,address,age,departement_id)
    VALUES(
      '$_POST[name]',
      '$_POST[phone]',
      '$_POST[email]',
      '$_POST[address]',
      '$_POST[age]',
      '$_POST[departement]'
    )
  ");
}

$res = mysqli_query($conn,"
SELECT m.*, d.name AS dep
FROM medecins m
JOIN departements d ON m.departement_id=d.id
");

while($row = mysqli_fetch_assoc($res)){
echo "
<div class='list-card'>
  <h3>{$row['name']}</h3>
  <p><strong>Phone:</strong> {$row['phone']}</p>
  <p><strong>Email:</strong> {$row['email']}</p>
  <p><strong>Age:</strong> {$row['age']}</p>
  <p><strong>Department:</strong> {$row['dep']}</p>
  <div class='card-buttons'>
    <a href='edit_medecins.php?id={$row['id']}' class='btn edit'>Edit</a>
    <a href='delete_medecins.php?id={$row['id']}' class='btn delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
  </div>
</div>

";
}
?>
</div>