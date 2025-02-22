<?php
  function writeAccount($connection, $username, $password, $fname, $lname) {
    $hashedPassword = htmlspecialchars(password_hash($password, PASSWORD_BCRYPT));

    $username = htmlspecialchars($username);
    $fname = htmlspecialchars($fname);
    $lname = htmlspecialchars($lname);

    $sqlQuery = "INSERT INTO `accounts` (`account_fname`, `account_lname`, `account_password`, `account_username`) VALUES ('$fname', '$lname', '$hashedPassword', '$username')";
    $connection->query($sqlQuery);
  }
?>