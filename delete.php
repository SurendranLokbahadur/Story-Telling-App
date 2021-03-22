<?php
include_once 'database.php';
$result = mysqli_query($db,"SELECT * FROM images");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Delete employee data</title>
</head>
<body>

<table class="table table-bordered table-striped" align="center" bgcolor= "#00ff7f">

    <td>ID</td>
    <td>IMAGE-NAME</td>
    <td>COMMENTS</td>
    <td>ACTION</td></tr>
        <?php
    $i=0;
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <tr class="<?php if(isset($classname)) echo $classname;?>">
            <td><?php echo $row["id"]; ?></td> <br>
            <td><?php echo $row["image"]; ?></td> <br>
            <td><?php echo $row["text"]; ?></td> <br>
            <td><a href="delete-process.php?id=<?php echo $row["id"]; ?>">REMOVE</a></td>
        </tr>
        <?php
        $i++;
    }
    ?>
</table>
</body>