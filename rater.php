<?php
$msg = "";


if(isset($_POST['upload']))
{
    $target = "images/" .basename($_FILES['image']['name']);
    $db = mysqli_connect("localhost" , "root", "", "cmm007");

    $image = $_FILES['image']['name'];
    $text = $_POST['text'];


    $sql = "INSERT INTO images (image, text, rating) VALUES ('$image', '$text')";
    mysqli_query($db, $sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
    {
        $msg = "Image uploaded successfully";
    }
    else{
        $msg = "There is a problem uploading image";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title> Image upload</title>
    <link rel="stylesheet" type = "text/css" href ="style.css">
</head>

<body>
<div id = "content">

    <?php
    $db = mysqli_connect("localhost" , "root", "", "cmm007");
    $sql = "SELECT * FROM images";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['id'];
        echo"<div id= 'img_div'>";
        echo"<img src = ' images/" .$row['image']. " ' >";
        echo "<p>". $row['text']. "</p>";
        echo "<td>"; ?> <a href = " rating.html?id =<?php echo $row["id"] ; ?> ">Click here for Rating </a> <?php echo"</td>";
        echo "</div>";
    } ?>





    <form method = "post" action = "upload.php" enctype="multipart/form-data">
        <input type = "hidden" name = "size" value = "1000000">
        <div> <input type = "file" name = "image"></div>
        <div>
            <textarea name = "text" cols = "40" rows = "4" placeholder = "Write your story here..."></textarea></div>
        <div><input type="submit" name ="upload" value="upload an image"></div><br>




</div>
</body>
</html>
