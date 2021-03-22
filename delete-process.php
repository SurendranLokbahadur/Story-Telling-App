<?php
include_once 'database.php';
$sql = "DELETE FROM images WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
mysqli_close($db);
?>