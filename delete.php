<?php

if(isset($_GET['delete.php?id']))
{
    $sql = "select * from images where id = ".$_GET['delete.php?id'];

    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result);

    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $createDeletePath = "uploads/".$image.$text;

    if(unlink($createDeletePath))
    {
        $sql = "delete from images where id = ".$row['id'];
        $result = mysqli_query($db, $sql);

        if($result)
        {
            header('location:delete.php?success=true');
            exit();
        }
    }
    else
    {
        $errorMsg = "Unable to delete Image";
    }

}
?>
