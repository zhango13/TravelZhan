<?php
include 'server.php';
if(count($_POST)>0){
if($_POST['type']==1){
  $image=$_POST['image'];
  $topic=$_POST['topic'];
  $content=$_POST['content'];
  $date=$_POST['date'];
  $author=$_POST['author'];
  $sql = "INSERT INTO `nportal`( `image`, `topic`,`content`,`date`,`author`)
  VALUES ('$image','$topic','$content','$date','$author')";
  if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
}
if(count($_POST)>0){
if($_POST['type']==2){
  $id=$_POST['id'];
  $image=$_POST['image'];
  $topic=$_POST['topic'];
  $content=$_POST['content'];
  $date=$_POST['date'];
  $author=$_POST['author'];
  $sql = "UPDATE `nportal` SET `image`='$image',`topic`='$topic',`content`='$content',`date`='$date', `author`='$author' WHERE id=$id";
  if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
}
if(count($_POST)>0){
if($_POST['type']==3){
  $id=$_POST['id'];
  $sql = "DELETE FROM `nportal` WHERE id=$id ";
  if (mysqli_query($conn, $sql)) {
    echo $id;
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
}
if(count($_POST)>0){
if($_POST['type']==4){
  $id=$_POST['id'];
  $sql = "DELETE FROM nportal WHERE id in ($id)";
  if (mysqli_query($conn, $sql)) {
    echo $id;
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
}

?>
