<?php
$msg = "";


if(isset($_POST['upload']))
{
    $target = "images/" .basename($_FILES['image']['name']);
    $db = mysqli_connect("localhost" , "root", "", "cmm007");

    $image = $_FILES['image']['name'];
    $text = $_POST['text'];
    $rating = $_POST['rating'];


    $sql = "INSERT INTO images (image, text, rating) VALUES ('$image', '$text','$rating')";
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
        echo "<p>". $row['rating']. "</p>";
        echo "</div>";
    } ?>





    <form method = "post" action = "upload.php" enctype="multipart/form-data">
        <input type = "hidden" name = "size" value = "1000000">
        <div> <input type = "file" name = "image"></div>
        <div>
            <textarea name = "text" cols = "40" rows = "4" placeholder = "Write your story here..."></textarea></div>
        <div><input type="submit" name ="upload" value="upload an image"></div><br>

    </form>



    <div class="center">
        <form action="" method="post">
            <div class="rating">
                <input type="radio" name="star" id="star-1" value="1">
                <input type="radio" name="star" id="star-2" value="2">
                <input type="radio" name="star" id="star-3" value="3">
                <input type="radio" name="star" id="star-4" value="4">
                <input type="radio" name="star" id="star-5" value="5">
                <label for="star-1">&#11088;</label>
                <label for="star-2">&#11088;</label>
                <label for="star-3">&#11088;</label>
                <label for="star-4">&#11088;</label>
                <label for="star-5">&#11088;</label></form>
            </div> </div>


</div>
</body>
</html>
