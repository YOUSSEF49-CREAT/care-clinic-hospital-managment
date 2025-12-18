<?php
include("../config/db.php");

$id = intval($_GET['id']);

mysqli_query($conn, "DELETE FROM medecins WHERE id=$id");

header("Location: index.php");
exit;

