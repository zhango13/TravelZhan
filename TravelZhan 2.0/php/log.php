<?php
  include('server.php');
  if (isset($_POST['signin'])) {
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $pword = mysqli_real_escape_string($conn, $_POST['pword']);

  if (empty($uname)) {
    array_push($fail, "Username required!");
  }
  if (empty($pword)) {
    array_push($fail, "Password required!");
  }

  if (count($fail) == 0) {
    $pword = md5($pword);
    $query = "SELECT * FROM users1 WHERE username='$uname' AND password='$pword'";
    $results = mysqli_query($conn, $query);

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['uname'] = $uname;
      $_SESSION['success'] = "Successfully logged in!";
      header('location: index.php');
    }else {
      array_push($fail, "Wrong username or password!");
    }
  }
}

?>
