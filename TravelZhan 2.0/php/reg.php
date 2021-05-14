<?php
  include('server.php');
if (isset($_POST['signup'])) {
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pword1 = mysqli_real_escape_string($conn, $_POST['pword1']);
  $pword2 = mysqli_real_escape_string($conn, $_POST['pword2']);

  if (empty($uname)) { array_push($fail, "Username required!"); }
  if (empty($email)) { array_push($fail, "Email required!"); }
  if (empty($pword1)) { array_push($fail, "Password required!"); }

  if ($pword1 != $pword2) {
    array_push($fail, "Passwords do not match!");
  }


  if (count($fail) == 0) {
    $pword = md5($pword1);
    $query = "INSERT INTO users1 (username, email, password) VALUES('$uname', '$email', '$pword')";
    mysqli_query($conn, $query);

    $_SESSION['uname'] = $uname;
		  $_SESSION['email'] = $email;
    $_SESSION['success'] = "Successfully logged in!";
    header('location: index.php');
  }

}
