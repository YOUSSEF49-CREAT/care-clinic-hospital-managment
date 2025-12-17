<style>
   
    .formedite {
    background-color: #91a1b2ff; 
    padding: 25px;
    border-radius: 12px;
    width: 400px;
    max-width: 90%;
    margin: 20px auto;
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
    color: #ecf0f1; 
    font-family: Arial, sans-serif;
}

.formedite input,
.formedite select {
    width: 100%;
    padding: 10px;
    margin: 8px 0 15px 0;
    border: none;
    border-radius: 8px;
    background-color: #454748ff; 
    color: #ecf0f1;
    font-size: 16px;
}

.formedite input:focus,
.formedite select:focus {
    outline: 2px solid #1abc9c;
    background-color: #3d566e;
}

.formedite button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #1abc9c;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

.formedite button:hover {
    background: #16a085;
}

.formedite label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

</style>

<?php
include("../config/db.php");

if(!isset($_GET['id'])) die("ID manquant");
$id = $_GET['id'] ;

$res = mysqli_query($conn, "SELECT * FROM patients WHERE id = $id");
$row = mysqli_fetch_assoc($res);
if (!$row) die("Patient non trouvé");

$medecins = mysqli_query($conn, "SELECT id, name FROM medecins ORDER BY name ASC");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $age = intval($_POST['age']);
    $medecin_id = intval($_POST['medecin_id']);

       $sql = "UPDATE patients SET 
            name='$name', 
            phone='$phone', 
            address='$address', 
            age=$age, 
            medecin_id=$medecin_id WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Patient</h2>
<form method="POST" class="formedite">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br>
    Phone: <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required><br>
    Address: <input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>" required><br>
    Age: <input type="number" name="age" value="<?= $row['age'] ?>" required><br>

    Médecin:
    <select name="medecin_id" required>
        <option value="">-- Select Médecin --</option>
        <?php while($med = mysqli_fetch_assoc($medecins)): ?>
            <option value="<?= $med['id'] ?>" <?= ($med['id'] == $row['medecin_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($med['name']) ?>
            </option>
        <?php endwhile; ?>
    </select><br>

    <button type="submit" name="submit">Update</button>
</form>
