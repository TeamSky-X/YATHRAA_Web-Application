<?php
include('includes/config.php');

if (isset($_POST["id"])) {
    // Get the post ID
    $id = $_POST['id'];
    if ($_POST['likes'] == NULL) {
        $likes=0;
    }
    else{
        $likes = $_POST['likes'];
    }

}

$likes2=$likes+1;
$stmt = $dbh->prepare("UPDATE tblenquiry SET likes = :likes2 WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':likes2', $likes2);
$stmt->execute();
$_SESSION["like"] = "green";


header("Location: forum.php");


?>
