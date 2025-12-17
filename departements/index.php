<?php
include("../config/db.php");
?>
<link rel="stylesheet" href="../assets/style.css">
<?php
include("../includes/sidebar.php");
?>


<div class="content">
<h2>Départements</h2>

<form method="post">
  <input type="text" name="name" placeholder="Département name" required>
  <button name="add">Add</button>
</form>

<?php
if(isset($_POST['add'])){
  mysqli_query($conn,"INSERT INTO departements(name) VALUES('$_POST[name]')");
}

$res = mysqli_query($conn,"SELECT * FROM departements");
while($row = mysqli_fetch_assoc($res)){
  echo "
<div class='list-card'>
  <h4> departement : {$row['name']}</h4>

 <div class='card-buttons'>
    <a href='edit_departements.php?id={$row['id']}' class='btn edit'>Edit</a>
    <a href='delete_departements.php?id={$row['id']}' class='btn delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
  </div>
  </div>
";
}
?>
</div>

